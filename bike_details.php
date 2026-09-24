<?php

// Connect to database
include "db.php";


// Check if bike ID exists
if (!isset($_GET["id"]) || !is_numeric($_GET["id"])) {
    header("Location: client_bikes.php");
    exit;
}


$id = (int) $_GET["id"];


// Get bike information
$sql = "SELECT * FROM bikes
        WHERE id = ?
        AND status = 'Available'";

$stmt = $conn->prepare($sql);

$stmt->bind_param("i", $id);

$stmt->execute();

$result = $stmt->get_result();


// Check if bike exists
if ($result->num_rows === 0) {

    $stmt->close();
    $conn->close();

    header("Location: client_bikes.php");
    exit;
}


$bike = $result->fetch_assoc();

$stmt->close();

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        <?php echo htmlspecialchars($bike["bike_name"]); ?>
        - Bike Management System
    </title>

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


    <!-- Bike Details -->

    <main class="max-w-4xl mx-auto px-6 py-12">


      <div class="bg-white rounded-xl shadow-lg overflow-hidden">

    <!-- Bike Image -->

    <div class="w-full h-80 bg-gray-100 overflow-hidden">

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


    <!-- Bike Information -->

    <div class="p-8">

        <div class="flex justify-between items-start mb-6">

            <div>

                <p class="text-[#025CA3] font-semibold mb-1">
                    <?php echo htmlspecialchars($bike["brand"]); ?>
                </p>

                <h1 class="text-3xl font-bold text-gray-800">
                    <?php echo htmlspecialchars($bike["bike_name"]); ?>
                </h1>

            </div>

            <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full font-semibold">
                Available
            </span>

        </div>

        <!-- Details -->

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <div>
                <p class="text-gray-500 text-sm">Model</p>
                <p class="font-semibold text-gray-800">
                    <?php echo htmlspecialchars($bike["model"]); ?>
                </p>
            </div>

            <div>
                <p class="text-gray-500 text-sm">Year</p>
                <p class="font-semibold text-gray-800">
                    <?php echo htmlspecialchars($bike["year"]); ?>
                </p>
            </div>

            <div>
                <p class="text-gray-500 text-sm">Color</p>
                <p class="font-semibold text-gray-800">
                    <?php echo htmlspecialchars($bike["color"]); ?>
                </p>
            </div>

            <div>
                <p class="text-gray-500 text-sm">Registration Number</p>
                <p class="font-semibold text-gray-800">
                    <?php echo htmlspecialchars($bike["registration_number"]); ?>
                </p>
            </div>

        </div>

        <!-- Price -->

        <div class="mt-8 pt-6 border-t border-gray-200">

            <p class="text-gray-500 text-sm">
                Price
            </p>

            <p class="text-3xl font-bold text-[#025CA3] mt-1">
                NPR <?php echo number_format($bike["price"], 2); ?>
            </p>

        </div>

    </div>

    <a
    href="enquiry.php?bike_id=<?php echo $bike["id"]; ?>"
    class="block w-full text-center bg-[#025CA3] text-white
           py-3 rounded-lg font-semibold
           hover:bg-blue-700 transition"
>
    Send Enquiry
</a>

</div>


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