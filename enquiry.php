<?php

include "db.php";


/* Get bike ID */

$bike_id = (int) ($_GET["bike_id"] ?? 0);


/* Validate bike ID */

if ($bike_id <= 0) {
    header("Location: client_bikes.php");
    exit;
}


/* Get bike information */

$sql = "SELECT * FROM bikes
        WHERE id = ?
        AND status = 'Available'";

$stmt = $conn->prepare($sql);

$stmt->bind_param("i", $bike_id);

$stmt->execute();

$result = $stmt->get_result();


/* Check if bike exists */

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

    <title>Send Enquiry - Bike Management System</title>

    <script src="https://cdn.tailwindcss.com"></script>

</head>


<body class="bg-gray-100 min-h-screen">


<!-- Header -->

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


<!-- Main Content -->

<main class="max-w-4xl mx-auto px-6 py-12">


    <!-- Page Heading -->

    <div class="text-center mb-8">

        <h1 class="text-3xl md:text-4xl font-bold text-gray-800">
            Send an Enquiry
        </h1>

        <p class="text-gray-600 mt-3">
            Interested in this bike? Send us an enquiry
            and we will get back to you.
        </p>

    </div>


    <!-- Enquiry Container -->

    <div
        class="bg-white rounded-xl shadow-md
               overflow-hidden"
    >

        <div class="grid md:grid-cols-2">


            <!-- Bike Information -->

            <div class="bg-gray-50 p-6 md:p-8">

                <h2 class="text-xl font-bold text-gray-800 mb-5">
                    Bike Information
                </h2>


                <!-- Bike Image -->

                <div
                    class="w-full h-56 bg-gray-200
                           rounded-lg overflow-hidden mb-5"
                >

                    <?php if (!empty($bike["image"])): ?>

                        <img
                            src="uploads/<?php echo htmlspecialchars($bike["image"]); ?>"
                            alt="<?php echo htmlspecialchars($bike["bike_name"]); ?>"
                            class="w-full h-full object-cover"
                        >

                    <?php else: ?>

                        <div
                            class="w-full h-full
                                   flex items-center justify-center
                                   text-gray-400"
                        >
                            No Image Available
                        </div>

                    <?php endif; ?>

                </div>


                <!-- Bike Name -->

                <h3 class="text-2xl font-bold text-gray-800">
                    <?php echo htmlspecialchars($bike["bike_name"]); ?>
                </h3>


                <!-- Bike Details -->

                <div class="mt-4 space-y-3 text-gray-600">

                    <p>
                        <span class="font-semibold">
                            Brand:
                        </span>

                        <?php echo htmlspecialchars($bike["brand"]); ?>
                    </p>


                    <p>
                        <span class="font-semibold">
                            Model:
                        </span>

                        <?php echo htmlspecialchars($bike["model"]); ?>
                    </p>


                    <p>
                        <span class="font-semibold">
                            Year:
                        </span>

                        <?php echo htmlspecialchars($bike["year"]); ?>
                    </p>


                    <p>
                        <span class="font-semibold">
                            Color:
                        </span>

                        <?php echo htmlspecialchars($bike["color"]); ?>
                    </p>


                    <p>
                        <span class="font-semibold">
                            Price:
                        </span>

                        <span class="text-[#025CA3] font-bold">
                            NPR
                            <?php echo number_format($bike["price"]); ?>
                        </span>
                    </p>

                </div>

            </div>


            <!-- Enquiry Form -->

            <div class="p-6 md:p-8">

                <h2 class="text-xl font-bold text-gray-800 mb-6">
                    Your Information
                </h2>


                <form
                    action="enquiry_process.php"
                    method="POST"
                >


                    <!-- Hidden Bike ID -->

                    <input
                        type="hidden"
                        name="bike_id"
                        value="<?php echo $bike["id"]; ?>"
                    >


                    <!-- Name -->

                    <div class="mb-5">

                        <label
                            for="name"
                            class="block text-gray-700
                                   font-medium mb-2"
                        >
                            Name
                        </label>

                        <input
                            type="text"
                            id="name"
                            name="name"
                            required
                            maxlength="100"
                            placeholder="Enter your name"
                            class="w-full px-4 py-3
                                   border border-gray-300
                                   rounded-lg
                                   focus:outline-none
                                   focus:ring-2
                                   focus:ring-[#025CA3]"
                        >

                    </div>


                    <!-- Phone -->

                    <div class="mb-5">

                        <label
                            for="phone"
                            class="block text-gray-700
                                   font-medium mb-2"
                        >
                            Phone
                        </label>

                        <input
                            type="tel"
                            id="phone"
                            name="phone"
                            required
                            maxlength="20"
                            placeholder="Enter your phone number"
                            class="w-full px-4 py-3
                                   border border-gray-300
                                   rounded-lg
                                   focus:outline-none
                                   focus:ring-2
                                   focus:ring-[#025CA3]"
                        >

                    </div>


                    <!-- Email -->

                    <div class="mb-5">

                        <label
                            for="email"
                            class="block text-gray-700
                                   font-medium mb-2"
                        >
                            Email
                        </label>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            required
                            maxlength="150"
                            placeholder="Enter your email"
                            class="w-full px-4 py-3
                                   border border-gray-300
                                   rounded-lg
                                   focus:outline-none
                                   focus:ring-2
                                   focus:ring-[#025CA3]"
                        >

                    </div>


                    <!-- Message -->

                    <div class="mb-6">

                        <label
                            for="message"
                            class="block text-gray-700
                                   font-medium mb-2"
                        >
                            Message
                        </label>

                        <textarea
                            id="message"
                            name="message"
                            rows="5"
                            required
                            placeholder="I am interested in this bike."
                            class="w-full px-4 py-3
                                   border border-gray-300
                                   rounded-lg
                                   resize-none
                                   focus:outline-none
                                   focus:ring-2
                                   focus:ring-[#025CA3]"
                        ></textarea>

                    </div>


                    <!-- Submit -->

                    <button
                        type="submit"
                        class="w-full bg-[#025CA3]
                               text-white py-3 rounded-lg
                               font-semibold
                               hover:bg-blue-700
                               transition"
                    >
                        Send Enquiry
                    </button>


                    <!-- Back -->

                    <a
                        href="bike_details.php?id=<?php echo $bike["id"]; ?>"
                        class="block text-center
                               text-gray-600
                               mt-4 hover:text-[#025CA3]
                               transition"
                    >
                        ← Back to Bike Details
                    </a>

                </form>

            </div>

        </div>

    </div>

</main>


<!-- Footer -->

<footer class="bg-gray-900 text-white mt-12">

    <div
        class="max-w-7xl mx-auto px-6 py-6
               text-center"
    >

        <p class="text-gray-400">
            © <?php echo date("Y"); ?>
            Bike Management System.
            All rights reserved.
        </p>

    </div>

</footer>


<!-- Mobile Menu JavaScript -->

<script>

    const mobileMenuButton =
        document.getElementById("mobile-menu-button");

    const mobileMenu =
        document.getElementById("mobile-menu");


    mobileMenuButton.addEventListener(
        "click",
        function () {

            mobileMenu.classList.toggle("hidden");


            if (mobileMenu.classList.contains("hidden")) {

                mobileMenuButton.innerHTML = "☰";

                mobileMenuButton.setAttribute(
                    "aria-label",
                    "Open menu"
                );

            } else {

                mobileMenuButton.innerHTML = "✕";

                mobileMenuButton.setAttribute(
                    "aria-label",
                    "Close menu"
                );

            }

        }
    );

</script>


</body>

</html>