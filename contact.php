<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Contact Us - Bike Management System</title>

    <script src="https://cdn.tailwindcss.com"></script>

</head>


<body class="bg-gray-50 text-gray-800">


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
                    href="about.php"
                    class="font-semibold hover:text-gray-200 transition"
                >
                    About Us
                </a>

                <a
                    href="contact.php"
                    class="font-semibold text-gray-200"
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
                    class="font-semibold text-gray-200"
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


<!-- Page Header -->

<section class="bg-[#025CA3] text-white py-16">

    <div class="max-w-7xl mx-auto px-6 text-center">

        <h1 class="text-4xl md:text-5xl font-bold">
            Contact Us
        </h1>

        <p class="mt-4 text-blue-100 max-w-2xl mx-auto">
            Have a question or interested in a bike?
            Get in touch with us.
        </p>

    </div>

</section>


<!-- Contact Section -->

<section class="py-16">

    <div class="max-w-6xl mx-auto px-6">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">


            <!-- Contact Information -->

            <div>

                <p class="text-[#025CA3] font-semibold mb-2">
                    GET IN TOUCH
                </p>

                <h2 class="text-3xl md:text-4xl font-bold">
                    We'd Love to Hear From You
                </h2>

                <p class="text-gray-600 leading-7 mt-5">
                    If you have any questions about our available
                    bikes or would like more information about a
                    particular bike, feel free to contact us.
                </p>


                <!-- Location -->

                <div class="flex gap-4 mt-8">

                    <div
                        class="w-12 h-12 shrink-0
                               bg-blue-100 rounded-lg
                               flex items-center justify-center
                               text-xl"
                    >
                        📍
                    </div>

                    <div>

                        <h3 class="font-bold text-lg">
                            Our Location
                        </h3>

                        <p class="text-gray-500 mt-1">
                            Bharatpur, Chitwan, Nepal
                        </p>

                    </div>

                </div>


                <!-- Phone -->

                <div class="flex gap-4 mt-6">

                    <div
                        class="w-12 h-12 shrink-0
                               bg-blue-100 rounded-lg
                               flex items-center justify-center
                               text-xl"
                    >
                        📞
                    </div>

                    <div>

                        <h3 class="font-bold text-lg">
                            Phone
                        </h3>

                        <p class="text-gray-500 mt-1">
                            +977 98XXXXXXXX
                        </p>

                    </div>

                </div>


                <!-- Email -->

                <div class="flex gap-4 mt-6">

                    <div
                        class="w-12 h-12 shrink-0
                               bg-blue-100 rounded-lg
                               flex items-center justify-center
                               text-xl"
                    >
                        ✉️
                    </div>

                    <div>

                        <h3 class="font-bold text-lg">
                            Email
                        </h3>

                        <p class="text-gray-500 mt-1">
                            info@example.com
                        </p>

                    </div>

                </div>


                <!-- Opening Hours -->

                <div class="flex gap-4 mt-6">

                    <div
                        class="w-12 h-12 shrink-0
                               bg-blue-100 rounded-lg
                               flex items-center justify-center
                               text-xl"
                    >
                        🕒
                    </div>

                    <div>

                        <h3 class="font-bold text-lg">
                            Opening Hours
                        </h3>

                        <p class="text-gray-500 mt-1">
                            Sunday - Friday: 10:00 AM - 6:00 PM
                        </p>

                    </div>

                </div>

            </div>


            <!-- Contact Card -->

            <div
                class="bg-white rounded-2xl shadow-lg
                       p-8 md:p-10"
            >

                <h3 class="text-2xl font-bold">
                    Looking for a Bike?
                </h3>

                <p class="text-gray-600 mt-3 leading-7">
                    Browse our available bikes and send us an
                    enquiry directly from the bike details page.
                </p>


                <a
                    href="client_bikes.php"
                    class="block text-center
                           bg-[#025CA3] text-white
                           py-3 px-6 rounded-lg
                           font-semibold
                           mt-8
                           hover:bg-blue-700 transition"
                >
                    View Available Bikes
                </a>


                <div
                    class="border-t border-gray-200
                           mt-8 pt-8"
                >

                    <h4 class="font-bold text-lg">
                        Need More Information?
                    </h4>

                    <p class="text-gray-500 mt-2">
                        Contact us using the phone number or email
                        provided on this page. We will be happy to
                        assist you with your enquiry.
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- CTA -->

<section class="bg-[#025CA3] text-white py-14">

    <div class="max-w-4xl mx-auto px-6 text-center">

        <h2 class="text-3xl md:text-4xl font-bold">
            Find Your Next Bike
        </h2>

        <p class="text-blue-100 mt-4">
            Explore our available bikes and send an enquiry
            about the one you like.
        </p>

        <a
            href="client_bikes.php"
            class="inline-block mt-7
                   bg-white text-[#025CA3]
                   px-6 py-3 rounded-lg
                   font-bold
                   hover:bg-gray-100 transition"
        >
            Browse Bikes
        </a>

    </div>

</section>


<!-- Footer -->

<footer class="bg-gray-900 text-gray-300 py-10">

    <div class="max-w-7xl mx-auto px-6">

        <div class="grid md:grid-cols-3 gap-8">

            <!-- About -->

            <div>

                <h3 class="text-white text-lg font-bold">
                    Bike Management System
                </h3>

                <p class="mt-3 text-gray-400">
                    A simple platform to explore available bikes
                    and send enquiries.
                </p>

            </div>


            <!-- Quick Links -->

            <div>

                <h3 class="text-white font-bold mb-4">
                    Quick Links
                </h3>

                <div class="space-y-2">

                    <a
                        href="index.php"
                        class="block hover:text-white"
                    >
                        Home
                    </a>

                    <a
                        href="client_bikes.php"
                        class="block hover:text-white"
                    >
                        Available Bikes
                    </a>

                    <a
                        href="about.php"
                        class="block hover:text-white"
                    >
                        About Us
                    </a>

                    <a
                        href="contact.php"
                        class="block hover:text-white"
                    >
                        Contact Us
                    </a>

                </div>

            </div>


            <!-- Contact -->

            <div>

                <h3 class="text-white font-bold mb-4">
                    Contact
                </h3>

                <p class="text-gray-400">
                    Email: info@example.com
                </p>

                <p class="text-gray-400 mt-2">
                    Phone: +977 98XXXXXXXX
                </p>

                <p class="text-gray-400 mt-2">
                    Bharatpur, Chitwan, Nepal
                </p>

            </div>

        </div>


        <!-- Copyright -->

        <div
            class="border-t border-gray-700
                   mt-8 pt-6 text-center
                   text-gray-500"
        >

            © <?php echo date("Y"); ?>
            Bike Management System.
            All rights reserved.

        </div>

    </div>

</footer>


<!-- Mobile Menu JavaScript -->

<script>

    const mobileMenuButton =
        document.getElementById("mobile-menu-button");

    const mobileMenu =
        document.getElementById("mobile-menu");


    mobileMenuButton.addEventListener("click", function () {

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

    });

</script>


</body>

</html>