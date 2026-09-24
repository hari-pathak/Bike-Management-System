<?php

session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: ../login.php");
    exit;
}

include "../db.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php");
    exit;
}


/* Get form data */

$id = (int) ($_POST["id"] ?? 0);

$bike_name = trim($_POST["bike_name"] ?? "");
$brand = trim($_POST["brand"] ?? "");
$model = trim($_POST["model"] ?? "");
$registration_number = trim($_POST["registration_number"] ?? "");
$price = $_POST["price"] ?? "";
$year = $_POST["year"] ?? "";
$color = trim($_POST["color"] ?? "");
$status = $_POST["status"] ?? "";


/* Basic validation */

if (
    $id <= 0 ||
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


/* Validate price */

if (!is_numeric($price) || $price < 0) {
    die("Invalid price.");
}

$price = (float) $price;


/* Validate year */

if (!is_numeric($year)) {
    die("Invalid year.");
}

$year = (int) $year;


/* Validate status */

if ($status !== "Available" && $status !== "Sold") {
    die("Invalid status.");
}


/* Check if bike exists */

$sql = "SELECT image FROM bikes WHERE id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows === 0) {
    $stmt->close();
    $conn->close();

    die("Bike not found.");
}

$bike = $result->fetch_assoc();

$current_image = $bike["image"];

$stmt->close();


/* Check duplicate registration number */

$sql = "SELECT id FROM bikes
        WHERE registration_number = ?
        AND id != ?";

$stmt = $conn->prepare($sql);

$stmt->bind_param(
    "si",
    $registration_number,
    $id
);

$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $stmt->close();
    $conn->close();

    die("Registration number already exists.");
}

$stmt->close();


/* Keep current image by default */

$new_image = $current_image;


/* Check if a new image was uploaded */

if (
    isset($_FILES["image"]) &&
    $_FILES["image"]["error"] !== UPLOAD_ERR_NO_FILE
) {

    /* Check upload error */

    if ($_FILES["image"]["error"] !== UPLOAD_ERR_OK) {
        die("There was an error uploading the image.");
    }


    /* Check file size */

    if ($_FILES["image"]["size"] > 5 * 1024 * 1024) {
        die("Image size must not exceed 5MB.");
    }


    /* Allowed extensions */

    $allowed_extensions = [
        "jpg",
        "jpeg",
        "png",
        "webp"
    ];

    $file_name = $_FILES["image"]["name"];

    $file_extension = strtolower(
        pathinfo($file_name, PATHINFO_EXTENSION)
    );


    if (!in_array($file_extension, $allowed_extensions)) {
        die("Only JPG, JPEG, PNG, and WEBP images are allowed.");
    }


    /* Check actual image */

    if (getimagesize($_FILES["image"]["tmp_name"]) === false) {
        die("Uploaded file is not a valid image.");
    }


    /* Create unique file name */

    $new_file_name = uniqid("bike_", true) . "." . $file_extension;

    $upload_directory = "../uploads/";

    $upload_path = $upload_directory . $new_file_name;


    /* Move image */

    if (!move_uploaded_file(
        $_FILES["image"]["tmp_name"],
        $upload_path
    )) {
        die("Failed to upload the image.");
    }


    $new_image = $new_file_name;
}


/* Update bike */

$sql = "UPDATE bikes SET
        bike_name = ?,
        brand = ?,
        model = ?,
        registration_number = ?,
        price = ?,
        year = ?,
        color = ?,
        image = ?,
        status = ?
        WHERE id = ?";

$stmt = $conn->prepare($sql);

$stmt->bind_param(
    "ssssdisssi",
    $bike_name,
    $brand,
    $model,
    $registration_number,
    $price,
    $year,
    $color,
    $new_image,
    $status,
    $id
);


if ($stmt->execute()) {

    /*
     * If a new image was uploaded,
     * delete the old image.
     */

    if (
        $new_image !== $current_image &&
        !empty($current_image)
    ) {

        $old_image_path = "../uploads/" . $current_image;

        if (file_exists($old_image_path)) {
            unlink($old_image_path);
        }
    }

    $stmt->close();
    $conn->close();

    header("Location: index.php");
    exit;

} else {

    /*
     * If database update fails after
     * uploading a new image, delete
     * the newly uploaded image.
     */

    if (
        $new_image !== $current_image &&
        !empty($new_image)
    ) {

        $new_image_path = "../uploads/" . $new_image;

        if (file_exists($new_image_path)) {
            unlink($new_image_path);
        }
    }

    $stmt->close();
    $conn->close();

    die("Failed to update bike.");
}

?>