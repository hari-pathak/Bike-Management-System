<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Enquiry Submitted - Bike Management System</title>

    <script src="https://cdn.tailwindcss.com"></script>

</head>


<body class="bg-gray-100 min-h-screen">


<!-- Header -->

<nav class="bg-[#025CA3] text-white">

    <div class="max-w-7xl mx-auto px-6 py-4">

        <div class="flex justify-between items-center">

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
                    href="login.php"
                    class="bg-white text-[#025CA3]
                           px-4 py-2 rounded-lg
                           font-semibold hover:bg-gray-100
                           transition"
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


<!-- Success Content -->

<main
    class="min-h-[70vh] flex items-center
           justify-center px-6 py-12"
>

    <div
        class="bg-white max-w-lg w-full
               rounded-xl shadow-md
               p-8 md:p-10 text-center"
    >


        <!-- Success Icon -->

        <div
            class="w-20 h-20 mx-auto mb-6
                   bg-green-100 rounded-full
                   flex items-center justify-center"
        >

            <span
                class="text-green-600 text-4xl"
            >
                ✓
            </span>

        </div>


        <!-- Heading -->

        <h1
            class="text-3xl font-bold
                   text-gray-800 mb-4"
        >
            Enquiry Submitted!
        </h1>


        <!-- Message -->

        <p
            class="text-gray-600
                   leading-relaxed mb-8"
        >
            Thank you for your enquiry.
            We have received your message and
            will get back to you soon.
        </p>


        <!-- Buttons -->

        <div
            class="flex flex-col sm:flex-row
                   gap-4 justify-center"
        >

            <a
                href="client_bikes.php"
                class="bg-[#025CA3] text-white
                       px-6 py-3 rounded-lg
                       font-semibold
                       hover:bg-blue-700
                       transition"
            >
                View More Bikes
            </a>


            <a
                href="index.php"
                class="border border-gray-300
                       text-gray-700
                       px-6 py-3 rounded-lg
                       font-semibold
                       hover:bg-gray-100
                       transition"
            >
                Back to Home
            </a>

        </div>

    </div>

</main>


<!-- Footer -->

<footer class="bg-gray-900 text-white">

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