<?php

// Connect to database
include "db.php";


// Get only available bikes
$sql = "SELECT * FROM bikes
        WHERE status = 'Available'
        ORDER BY id DESC";

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Available Bikes - Bike Management System</title>

    <script src="https://cdn.tailwindcss.com"></script>

</head>


<body class="bg-gray-100 min-h-screen">


    <!-- Navigation -->

    <!-- Navigation -->

<nav class="bg-[#025CA3] text-white">

    <div class="max-w-7xl mx-auto px-6 py-4">

        <div class="flex justify-between items-center">

            <!-- Logo -->

            <a
                href="index.php"
                class="text-xl font-bold"
            >
                Bike Management System
            </a>


            <!-- Desktop Menu -->

            <div class="hidden md:flex items-center gap-6">

                <a
                    href="index.php"
                    class="font-semibold hover:text-gray-200 transition"
                >
                    Home
                </a>

                <a
                    href="client_bikes.php"
                    class="font-semibold hover:text-gray-200 transition"
                >
                    Available Bikes
                </a>

                <a
                    href="about.php"
                    class="font-semibold hover:text-gray-200 transition"
                >
                    About Us
                </a>

                <a
                    href="contact.php"
                    class="font-semibold hover:text-gray-200 transition"
                >
                    Contact Us
                </a>

                <a
                    href="login.php"
                    class="bg-white text-[#025CA3]
                           px-4 py-2 rounded-lg
                           font-semibold
                           hover:bg-gray-100 transition"
                >
                    Admin Login
                </a>

            </div>


            <!-- Mobile Menu Button -->

            <button
                id="mobile-menu-button"
                type="button"
                class="md:hidden text-white text-3xl
                       focus:outline-none"
                aria-label="Open menu"
            >
                ☰
            </button>

        </div>


        <!-- Mobile Menu -->

        <div
            id="mobile-menu"
            class="hidden md:hidden mt-4
                   border-t border-blue-400 pt-4"
        >

            <div class="flex flex-col gap-4">

                <a
                    href="index.php"
                    class="font-semibold hover:text-gray-200 transition"
                >
                    Home
                </a>

                <a
                    href="client_bikes.php"
                    class="font-semibold hover:text-gray-200 transition"
                >
                    Available Bikes
                </a>

                <a
                    href="about.php"
                    class="font-semibold hover:text-gray-200 transition"
                >
                    About Us
                </a>

                <a
                    href="contact.php"
                    class="font-semibold hover:text-gray-200 transition"
                >
                    Contact Us
                </a>

                <a
                    href="login.php"
                    class="bg-white text-[#025CA3]
                           px-4 py-2 rounded-lg
                           font-semibold text-center
                           hover:bg-gray-100 transition"
                >
                    Admin Login
                </a>

            </div>

        </div>

    </div>

</nav>


<!-- Mobile Menu JavaScript -->

<script>

    const mobileMenuButton = document.getElementById("mobile-menu-button");

    const mobileMenu = document.getElementById("mobile-menu");


    mobileMenuButton.addEventListener("click", function () {

        mobileMenu.classList.toggle("hidden");


        if (mobileMenu.classList.contains("hidden")) {

            mobileMenuButton.innerHTML = "☰";
            mobileMenuButton.setAttribute("aria-label", "Open menu");

        } else {

            mobileMenuButton.innerHTML = "✕";
            mobileMenuButton.setAttribute("aria-label", "Close menu");

        }

    });

</script>


    <!-- Page Content -->

    <main class="max-w-7xl mx-auto px-6 py-12">


        <!-- Heading -->

        <div class="text-center mb-10">

            <h1 class="text-4xl font-bold text-gray-800">
                Available Bikes
            </h1>

            <p class="text-gray-500 mt-3">
                Browse the bikes currently available.
            </p>

        </div>


        <?php if ($result->num_rows > 0): ?>


            <!-- Bike Grid -->

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">


                <?php while ($bike = $result->fetch_assoc()): ?>


                    <!-- Bike Card -->

                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">


                        <!-- Bike Image -->

<div class="w-full h-64 bg-gray-100 overflow-hidden">

    <?php if (!empty($bike["image"])): ?>

        <img
            src="uploads/<?php echo htmlspecialchars($bike["image"]); ?>"
            alt="<?php echo htmlspecialchars($bike["bike_name"]); ?>"
            class="w-full h-full object-cover"
        >

    <?php else: ?>

        <div class="w-full h-full flex items-center justify-center text-gray-400">

            <span>
                No Image Available
            </span>

        </div>

    <?php endif; ?>

</div>


<!-- Bike Header -->

<div class="bg-[#025CA3] text-white p-6">

    <h2 class="text-2xl font-bold">
        <?php echo htmlspecialchars($bike["bike_name"]); ?>
    </h2>

    <p class="text-blue-100 mt-1">
        <?php echo htmlspecialchars($bike["brand"]); ?>
    </p>

</div>


                        <!-- Bike Information -->

                        <div class="p-6">


                            <div class="space-y-3">


                                <div class="flex justify-between">

                                    <span class="text-gray-500">
                                        Model
                                    </span>

                                    <span class="font-semibold text-gray-800">
                                        <?php echo htmlspecialchars($bike["model"]); ?>
                                    </span>

                                </div>


                                <div class="flex justify-between">

                                    <span class="text-gray-500">
                                        Year
                                    </span>

                                    <span class="font-semibold text-gray-800">
                                        <?php echo htmlspecialchars($bike["year"]); ?>
                                    </span>

                                </div>


                                <div class="flex justify-between">

                                    <span class="text-gray-500">
                                        Color
                                    </span>

                                    <span class="font-semibold text-gray-800">
                                        <?php echo htmlspecialchars($bike["color"]); ?>
                                    </span>

                                </div>


                                <div class="flex justify-between">

                                    <span class="text-gray-500">
                                        Registration
                                    </span>

                                    <span class="font-semibold text-gray-800">
                                        <?php echo htmlspecialchars($bike["registration_number"]); ?>
                                    </span>

                                </div>


                            </div>


                            <!-- Price -->

                            <div class="border-t border-gray-200 mt-6 pt-5">

                                <p class="text-sm text-gray-500">
                                    Price
                                </p>

                                <p class="text-2xl font-bold text-[#025CA3] mt-1">

                                    Rs.
                                    <?php echo number_format($bike["price"], 2); ?>

                                </p>

                            </div>


                            <!-- Status -->

                            <!-- <div class="mt-5">

                                <span class="inline-block bg-green-100 text-green-700
                                             px-4 py-2 rounded-full text-sm font-semibold">

                                    Available

                                </span>

                            </div> -->

                            <!-- Status -->

<div class="mt-5">

    <span class="inline-block bg-green-100 text-green-700
                 px-4 py-2 rounded-full text-sm font-semibold">

        Available

    </span>

</div>


<!-- View Details Button -->

<div class="mt-5">

    <a
        href="bike_details.php?id=<?php echo $bike["id"]; ?>"
        class="block text-center bg-[#025CA3] text-white
               py-3 rounded-lg font-semibold
               hover:bg-blue-700 transition"
    >
        View Details
    </a>

</div>

                        </div>


                    </div>


                <?php endwhile; ?>


            </div>


        <?php else: ?>


            <!-- No Bikes -->

            <div class="bg-white rounded-2xl shadow p-10 text-center">

                <h2 class="text-2xl font-bold text-gray-800">
                    No Bikes Available
                </h2>

                <p class="text-gray-500 mt-3">
                    There are currently no bikes available.
                    Please check again later.
                </p>

            </div>


        <?php endif; ?>


    </main>


    <!-- Footer -->

    <footer class="bg-gray-800 text-white py-6 mt-12">

        <div class="max-w-7xl mx-auto px-6 text-center">

            <p>
                © <?php echo date("Y"); ?> Bike Management System.
                All rights reserved.
            </p>

        </div>

    </footer>


</body>

</html>

<?php

$conn->close();

?>