<?php

session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: ../login.php");
    exit;
}

include "../db.php";

if (!isset($_GET["id"]) || !is_numeric($_GET["id"])) {
    header("Location: index.php");
    exit;
}

$id = (int) $_GET["id"];


/* Get bike image before deleting the bike */

$sql = "SELECT image FROM bikes WHERE id = ?";

$stmt = $conn->prepare($sql);

$stmt->bind_param("i", $id);

$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows === 0) {
    $stmt->close();
    $conn->close();

    header("Location: index.php");
    exit;
}

$bike = $result->fetch_assoc();

$image = $bike["image"];

$stmt->close();


/* Delete bike from database */

$sql = "DELETE FROM bikes WHERE id = ?";

$stmt = $conn->prepare($sql);

$stmt->bind_param("i", $id);


if ($stmt->execute()) {

    /*
     * Delete the associated image
     */

    if (!empty($image)) {

        $image_path = "../uploads/" . $image;

        if (file_exists($image_path)) {
            unlink($image_path);
        }
    }

    $stmt->close();
    $conn->close();

    header("Location: index.php");
    exit;

} else {

    $stmt->close();
    $conn->close();

    die("Failed to delete bike.");
}

?>