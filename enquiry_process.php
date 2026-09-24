<?php

include "db.php";


/* Make sure the form was submitted */

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: client_bikes.php");
    exit;
}


/* Get form data */

$bike_id = (int) ($_POST["bike_id"] ?? 0);

$name = trim($_POST["name"] ?? "");

$phone = trim($_POST["phone"] ?? "");

$email = trim($_POST["email"] ?? "");

$message = trim($_POST["message"] ?? "");


/* Basic validation */

if (
    $bike_id <= 0 ||
    empty($name) ||
    empty($phone) ||
    empty($email) ||
    empty($message)
) {
    die("All fields are required.");
}


/* Validate email */

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Please enter a valid email address.");
}


/* Check if the bike exists and is available */

$sql = "SELECT id FROM bikes
        WHERE id = ?
        AND status = 'Available'";

$stmt = $conn->prepare($sql);

$stmt->bind_param("i", $bike_id);

$stmt->execute();

$result = $stmt->get_result();


if ($result->num_rows === 0) {

    $stmt->close();
    $conn->close();

    die("The selected bike is not available.");
}

$stmt->close();


/* Insert enquiry */

$sql = "INSERT INTO enquiries
        (bike_id, name, phone, email, message)
        VALUES (?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

$stmt->bind_param(
    "issss",
    $bike_id,
    $name,
    $phone,
    $email,
    $message
);


/* Check if enquiry was saved */

if ($stmt->execute()) {

    $stmt->close();
    $conn->close();

    header("Location: enquiry_success.php");
    exit;

} else {

    $stmt->close();
    $conn->close();

    die("Failed to submit enquiry. Please try again.");
}

?>