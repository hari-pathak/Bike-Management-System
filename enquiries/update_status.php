<?php

session_start();


/* Protect admin page */

if (!isset($_SESSION["user_id"])) {
    header("Location: ../login.php");
    exit;
}


include "../db.php";


/* Make sure the request is POST */

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php");
    exit;
}


/* Get form data */

$id = (int) ($_POST["id"] ?? 0);

$status = $_POST["status"] ?? "";


/* Basic validation */

if ($id <= 0) {
    die("Invalid enquiry ID.");
}


/* Validate status */

$allowed_statuses = [
    "New",
    "Contacted",
    "Closed"
];

if (!in_array($status, $allowed_statuses)) {
    die("Invalid status.");
}


/* Update status */

$sql = "UPDATE enquiries
        SET status = ?
        WHERE id = ?";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Failed to prepare query.");
}


$stmt->bind_param(
    "si",
    $status,
    $id
);


/* Execute update */

if ($stmt->execute()) {

    $stmt->close();

    $conn->close();

    header("Location: index.php");

    exit;

} else {

    $stmt->close();

    $conn->close();

    die("Failed to update enquiry status.");
}

?>