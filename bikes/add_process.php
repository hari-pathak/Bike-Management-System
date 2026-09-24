<?php

session_start();


// Check if user is logged in
if (!isset($_SESSION["user_id"])) {
    header("Location: ../login.php");
    exit;
}


// Connect to database
include "../db.php";


// Only allow POST request
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: add.php");
    exit;
}


// Get form data
$bike_name = trim($_POST["bike_name"] ?? "");
$brand = trim($_POST["brand"] ?? "");
$model = trim($_POST["model"] ?? "");
$registration_number = trim($_POST["registration_number"] ?? "");
$price = $_POST["price"] ?? "";
$year = $_POST["year"] ?? "";
$color = trim($_POST["color"] ?? "");
$status = $_POST["status"] ?? "";


// Check required fields
if (
    empty($bike_name) ||
    empty($brand) ||
    empty($model) ||
    empty($registration_number) ||
    $price === "" ||
    $year === "" ||
    empty($color) ||
    empty($status)
) {
    die("All fields are required.");
}


// Validate price
if (!is_numeric($price) || $price < 0) {
    die("Invalid price.");
}

$price = (float) $price;


// Validate year
if (!filter_var($year, FILTER_VALIDATE_INT)) {
    die("Invalid year.");
}

$year = (int) $year;


// Validate status
if ($status !== "Available" && $status !== "Sold") {
    die("Invalid status.");
}


// Check registration number
$sql = "SELECT id FROM bikes WHERE registration_number = ?";

$stmt = $conn->prepare($sql);

$stmt->bind_param(
    "s",
    $registration_number
);

$stmt->execute();

$result = $stmt->get_result();


if ($result->num_rows > 0) {

    $stmt->close();
    $conn->close();

    die("A bike with this registration number already exists.");

}

$stmt->close();


// Check if image was uploaded
if (!isset($_FILES["image"]) || $_FILES["image"]["error"] !== UPLOAD_ERR_OK) {
    $conn->close();

    die("Please upload a bike image.");

}


$image = $_FILES["image"];


// Maximum file size: 5MB
$max_file_size = 5 * 1024 * 1024;

if ($image["size"] > $max_file_size) {

    $conn->close();

    die("Image size must be less than 5MB.");

}


// Get file extension
$file_extension = strtolower(
    pathinfo($image["name"], PATHINFO_EXTENSION)
);


// Allowed extensions
$allowed_extensions = ["jpg", "jpeg", "png", "webp"];


if (!in_array($file_extension, $allowed_extensions)) {

    $conn->close();

    die("Only JPG, JPEG, PNG, and WEBP images are allowed.");

}


// Check actual image type
$image_info = getimagesize($image["tmp_name"]);

if ($image_info === false) {

    $conn->close();

    die("The uploaded file is not a valid image.");

}


// Create unique file name
$new_file_name = uniqid("bike_", true) . "." . $file_extension;


// Upload path
$upload_directory = "../uploads/";

$upload_path = $upload_directory . $new_file_name;


// Move image to uploads folder
if (!move_uploaded_file($image["tmp_name"], $upload_path)) {

    $conn->close();

    die("Failed to upload image.");

}


// Save bike information
$sql = "INSERT INTO bikes
        (bike_name, brand, model, registration_number, price, year, color, image, status)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

$stmt->bind_param(
    "ssssdisss",
    $bike_name,
    $brand,
    $model,
    $registration_number,
    $price,
    $year,
    $color,
    $new_file_name,
    $status
);


// Execute insert
if ($stmt->execute()) {

    $stmt->close();
    $conn->close();

    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="UTF-8">

        <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0"
        >

        <title>Bike Added - Bike Management System</title>

        <script src="https://cdn.tailwindcss.com"></script>

    </head>


    <body class="bg-gray-100 min-h-screen">


        <div class="max-w-xl mx-auto px-6 py-20">


            <div class="bg-white rounded-2xl shadow-lg p-8 text-center">


                <h1 class="text-3xl font-bold text-green-600 mb-4">
                    Bike Added Successfully!
                </h1>


                <p class="text-gray-600 mb-8">
                    The bike and its image have been added successfully.
                </p>


                <div class="flex gap-4">


                    <a
                        href="index.php"
                        class="flex-1 bg-[#025CA3] text-white py-3 rounded-lg
                               font-semibold hover:bg-blue-700"
                    >
                        View Bikes
                    </a>


                    <a
                        href="add.php"
                        class="flex-1 bg-gray-200 text-gray-700 py-3 rounded-lg
                               font-semibold hover:bg-gray-300"
                    >
                        Add Another Bike
                    </a>


                </div>


            </div>

        </div>


    </body>

    </html>

    <?php

} else {

    // If database insertion fails, remove uploaded image
    if (file_exists($upload_path)) {
        unlink($upload_path);
    }


    $stmt->close();
    $conn->close();

    die("Failed to add bike.");

}

?>