
<?php

// Connect to database
include "db.php";


// Only allow POST requests
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php");
    exit;
}


// Get form data
$name = trim($_POST["name"] ?? "");
$email = trim($_POST["email"] ?? "");
$address = trim($_POST["address"] ?? "");
$phone = trim($_POST["phone"] ?? "");
$password = $_POST["password"] ?? "";
$confirm_password = $_POST["confirm_password"] ?? "";


// -------------------------
// Validation
// -------------------------

if (
    empty($name) ||
    empty($email) ||
    empty($address) ||
    empty($phone) ||
    empty($password) ||
    empty($confirm_password)
) {
    die("All fields are required.");
}


// Check email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Please enter a valid email address.");
}


// Check password length
if (strlen($password) < 8) {
    die("Password must be at least 8 characters long.");
}


// Check password confirmation
if ($password !== $confirm_password) {
    die("Passwords do not match.");
}


// -------------------------
// Check if email already exists
// -------------------------

$sql = "SELECT id FROM users WHERE email = ?";

$stmt = $conn->prepare($sql);

$stmt->bind_param("s", $email);

$stmt->execute();

$result = $stmt->get_result();


if ($result->num_rows > 0) {

    $stmt->close();

    die("This email is already registered.");
}

$stmt->close();


// -------------------------
// Hash password
// -------------------------

$hashed_password = password_hash(
    $password,
    PASSWORD_DEFAULT
);


// -------------------------
// Insert user
// -------------------------

$sql = "INSERT INTO users
        (name, email, address, phone, password)
        VALUES (?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

$stmt->bind_param(
    "sssss",
    $name,
    $email,
    $address,
    $phone,
    $hashed_password
);


// -------------------------
// Execute
// -------------------------

if ($stmt->execute()) {

    echo "
        <!DOCTYPE html>
        <html lang='en'>

        <head>

            <meta charset='UTF-8'>

            <meta name='viewport' content='width=device-width, initial-scale=1.0'>

            <title>Registration Successful</title>

            <script src='https://cdn.tailwindcss.com'></script>

        </head>


        <body class='bg-gray-100 flex items-center justify-center min-h-screen'>

            <div class='bg-white p-8 rounded-2xl shadow-lg text-center max-w-md w-full mx-4'>

                <h1 class='text-2xl font-bold text-green-600 mb-4'>
                    Registration Successful!
                </h1>


                <p class='text-gray-700 mb-6'>
                    Welcome, " . htmlspecialchars($name) . "!
                </p>


                <!-- Go to Login -->

                <a
                    href='login.php'
                    class='inline-block w-full bg-[#025CA3] text-white px-6 py-3 rounded-md hover:bg-blue-700 transition mb-4'
                >
                    Go to Login
                </a>


                <!-- Back to Registration -->

                <a
                    href='index.php'
                    class='block text-[#025CA3] hover:underline'
                >
                    Back to Registration
                </a>


            </div>

        </body>

        </html>
    ";

} else {

    echo "Something went wrong. Please try again.";

}


// -------------------------
// Close connection
// -------------------------

$stmt->close();

$conn->close();

?>

