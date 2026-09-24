<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>About Us - Bike Management System</title>

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
                    class="font-semibold text-gray-200"
                >
                    About Us
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
            About Us
        </h1>

        <p class="mt-4 text-blue-100 max-w-2xl mx-auto">
            Learn more about our bike platform and how we make
            finding the right bike easier.
        </p>

    </div>

</section>


<!-- About Content -->

<section class="py-16">

    <div class="max-w-6xl mx-auto px-6">

        <div class="grid md:grid-cols-2 gap-12 items-center">


            <!-- Text -->

            <div>

                <p class="text-[#025CA3] font-semibold mb-2">
                    ABOUT OUR PLATFORM
                </p>

                <h2 class="text-3xl md:text-4xl font-bold text-gray-800">
                    Making Bike Selection Simple
                </h2>

                <p class="text-gray-600 leading-7 mt-6">
                    Our Bike Management System provides a simple and
                    convenient way for customers to explore available
                    bikes and find the information they need before
                    making an enquiry.
                </p>

                <p class="text-gray-600 leading-7 mt-4">
                    Customers can browse available bikes, view detailed
                    information such as model, year, color, registration
                    number and price, and easily send an enquiry about
                    a bike they are interested in.
                </p>

                <p class="text-gray-600 leading-7 mt-4">
                    Our goal is to make the bike browsing and enquiry
                    process straightforward, organized and convenient
                    for both customers and administrators.
                </p>

            </div>


            <!-- Feature Box -->

            <div class="bg-white rounded-2xl shadow-lg p-8">

                <h3 class="text-2xl font-bold mb-6">
                    What We Provide
                </h3>


                <div class="space-y-5">

                    <div class="flex gap-4">

                        <div
                            class="w-12 h-12 shrink-0
                                   bg-blue-100 rounded-lg
                                   flex items-center justify-center"
                        >
                            🔍
                        </div>

                        <div>

                            <h4 class="font-bold text-lg">
                                Easy Bike Search
                            </h4>

                            <p class="text-gray-500 mt-1">
                                Browse available bikes and explore
                                their details easily.
                            </p>

                        </div>

                    </div>


                    <div class="flex gap-4">

                        <div
                            class="w-12 h-12 shrink-0
                                   bg-blue-100 rounded-lg
                                   flex items-center justify-center"
                        >
                            🏍️
                        </div>

                        <div>

                            <h4 class="font-bold text-lg">
                                Detailed Information
                            </h4>

                            <p class="text-gray-500 mt-1">
                                View important bike information
                                before making an enquiry.
                            </p>

                        </div>

                    </div>


                    <div class="flex gap-4">

                        <div
                            class="w-12 h-12 shrink-0
                                   bg-blue-100 rounded-lg
                                   flex items-center justify-center"
                        >
                            📩
                        </div>

                        <div>

                            <h4 class="font-bold text-lg">
                                Simple Enquiries
                            </h4>

                            <p class="text-gray-500 mt-1">
                                Send an enquiry directly about
                                the bike you are interested in.
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- Mission -->

<section class="bg-white py-16">

    <div class="max-w-5xl mx-auto px-6 text-center">

        <p class="text-[#025CA3] font-semibold mb-2">
            OUR GOAL
        </p>

        <h2 class="text-3xl md:text-4xl font-bold">
            A Simple and Convenient Bike Experience
        </h2>

        <p class="text-gray-600 leading-7 mt-6 max-w-3xl mx-auto">
            We aim to provide customers with an easy way to discover
            available bikes, understand their details and communicate
            their interest through a simple enquiry process.
        </p>

    </div>

</section>


<!-- CTA -->

<section class="bg-[#025CA3] text-white py-16">

    <div class="max-w-4xl mx-auto px-6 text-center">

        <h2 class="text-3xl md:text-4xl font-bold">
            Looking for Your Next Bike?
        </h2>

        <p class="text-blue-100 mt-4">
            Explore our available bikes and find one that interests you.
        </p>

        <a
            href="client_bikes.php"
            class="inline-block mt-8
                   bg-white text-[#025CA3]
                   px-6 py-3 rounded-lg
                   font-bold
                   hover:bg-gray-100 transition"
        >
            View Available Bikes
        </a>

    </div>

</section>


<!-- Footer -->

<footer class="bg-gray-900 text-gray-300 py-10">

    <div class="max-w-7xl mx-auto px-6">

        <div class="grid md:grid-cols-3 gap-8">

            <div>

                <h3 class="text-white text-lg font-bold">
                    Bike Management System
                </h3>

                <p class="mt-3 text-gray-400">
                    A simple platform to explore available bikes
                    and send enquiries.
                </p>

            </div>


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

                </div>

            </div>


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

            </div>

        </div>


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