<?php

session_start();


// Check if user is logged in
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}


// Connect to database
include "db.php";


/* Get bike statistics */

$sql = "SELECT
            COUNT(*) AS total_bikes,
            SUM(status = 'Available') AS available_bikes,
            SUM(status = 'Sold') AS sold_bikes
        FROM bikes";

$result = $conn->query($sql);
$row = $result->fetch_assoc();

$total_bikes = $row["total_bikes"];
$available_bikes = $row["available_bikes"];
$sold_bikes = $row["sold_bikes"];

/* Get enquiry statistics */

$sql = "SELECT
            COUNT(*) AS total_enquiries,
            SUM(status = 'New') AS new_enquiries,
            SUM(status = 'Contacted') AS contacted_enquiries,
            SUM(status = 'Closed') AS closed_enquiries
        FROM enquiries";

$result = $conn->query($sql);
$row = $result->fetch_assoc();

$total_enquiries = $row["total_enquiries"];
$new_enquiries = $row["new_enquiries"];
$contacted_enquiries = $row["contacted_enquiries"];
$closed_enquiries = $row["closed_enquiries"];

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Dashboard - Bike Management System</title>

    <script src="https://cdn.tailwindcss.com"></script>

</head>


<body class="bg-gray-100 min-h-screen">


    <!-- Navigation -->

    <nav class="bg-[#025CA3] text-white px-8 py-4 flex justify-between items-center">

        <h1 class="text-xl font-bold">
            Bike Management System
        </h1>


        <a
            href="logout.php"
            class="bg-white text-[#025CA3] px-4 py-2 rounded-lg
                   font-semibold hover:bg-gray-100"
        >
            Logout
        </a>

    </nav>


    <!-- Main Content -->

    <div class="max-w-6xl mx-auto px-6 py-10">


        <!-- Welcome -->

        <div class="mb-8">

            <h2 class="text-3xl font-bold text-gray-800">
                Welcome, <?php echo htmlspecialchars($_SESSION["user_name"]); ?>!
            </h2>

            <p class="text-gray-500 mt-2">
                Manage your bikes from the dashboard.
            </p>

        </div>


<!-- Bike Statistics -->

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

    <!-- Total Bikes -->

    <div class="bg-white rounded-2xl shadow-lg p-6">

        <p class="text-gray-500 text-sm">
            Total Bikes
        </p>

        <h3 class="text-4xl font-bold text-[#025CA3] mt-2">
            <?php echo $total_bikes; ?>
        </h3>

    </div>


    <!-- Available Bikes -->

    <div class="bg-white rounded-2xl shadow-lg p-6">

        <p class="text-gray-500 text-sm font-medium">
            Available Bikes
        </p>

        <h3 class="text-4xl font-bold text-green-600 mt-2">
            <?php echo $available_bikes; ?>
        </h3>

    </div>


    <!-- Sold Bikes -->

    <div class="bg-white rounded-2xl shadow-lg p-6">

        <p class="text-gray-500 text-sm font-medium">
            Sold Bikes
        </p>

        <h3 class="text-4xl font-bold text-red-600 mt-2">
            <?php echo $sold_bikes; ?>
        </h3>

    </div>

</div>

<!-- Enquiry Statistics -->

<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">

    <!-- Total Enquiries -->

    <div class="bg-white rounded-2xl shadow-lg p-6">

        <p class="text-gray-500 text-sm font-medium">
            Total Enquiries
        </p>

        <h3 class="text-4xl font-bold text-[#025CA3] mt-2">
            <?php echo $total_enquiries; ?>
        </h3>

    </div>


    <!-- New Enquiries -->

    <div class="bg-white rounded-2xl shadow-lg p-6">

        <p class="text-gray-500 text-sm font-medium">
            New Enquiries
        </p>

        <h3 class="text-4xl font-bold text-yellow-600 mt-2">
            <?php echo $new_enquiries; ?>
        </h3>

    </div>


    <!-- Contacted Enquiries -->

    <div class="bg-white rounded-2xl shadow-lg p-6">

        <p class="text-gray-500 text-sm font-medium">
            Contacted Enquiries
        </p>

        <h3 class="text-4xl font-bold text-blue-600 mt-2">
            <?php echo $contacted_enquiries; ?>
        </h3>

    </div>


    <!-- Closed Enquiries -->

    <div class="bg-white rounded-2xl shadow-lg p-6">

        <p class="text-gray-500 text-sm font-medium">
            Closed Enquiries
        </p>

        <h3 class="text-4xl font-bold text-green-600 mt-2">
            <?php echo $closed_enquiries; ?>
        </h3>

    </div>

</div>


        <!-- Actions -->

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">


            <!-- Manage Bikes -->

            <a
                href="bikes/index.php"
                class="bg-white rounded-2xl shadow-lg p-8
                       hover:shadow-xl transition"
            >

                <h3 class="text-2xl font-bold text-gray-800 mb-3">
                    Manage Bikes
                </h3>

                <p class="text-gray-500 mb-6">
                    View, edit, and delete bikes from the system.
                </p>

                <span class="inline-block bg-[#025CA3] text-white px-5 py-3 rounded-lg font-semibold">
                    View Bikes
                </span>

            </a>


            <!-- Add Bike -->

            <a
                href="bikes/add.php"
                class="bg-white rounded-2xl shadow-lg p-8
                       hover:shadow-xl transition"
            >

                <h3 class="text-2xl font-bold text-gray-800 mb-3">
                    Add New Bike
                </h3>

                <p class="text-gray-500 mb-6">
                    Add a new bike to your bike management system.
                </p>

                <span class="inline-block bg-green-600 text-white px-5 py-3 rounded-lg font-semibold">
                    Add Bike
                </span>

            </a>


            <!-- Customer Enquiries Card -->

<a
    href="enquiries/index.php"
    class="bg-white rounded-xl shadow-md
           p-6 hover:shadow-lg
           transition group"
>

    <div
        class="w-14 h-14
               bg-blue-100
               rounded-lg
               flex items-center justify-center
               mb-5"
    >

        <span class="text-2xl">
            📩
        </span>

    </div>


    <h2
        class="text-xl font-bold
               text-gray-800
               group-hover:text-[#025CA3]
               transition"
    >
        Customer Enquiries
    </h2>


    <p
        class="text-gray-500
               mt-2 mb-6"
    >
        View customer enquiries
        and messages.
    </p>

     <span class="inline-block bg-[#025CA3] text-white px-5 py-3 rounded-lg font-semibold">
                    View Enquiries
                </span>

</a>


        </div>


    </div>


</body>

</html>

<?php

$conn->close();

?>