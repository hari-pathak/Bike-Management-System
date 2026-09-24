<?php

include "db.php";

$sql = "SELECT * FROM bikes
        WHERE status = 'Available'
        ORDER BY id DESC
        LIMIT 3";

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

    <title>Bike Management System</title>

    <script src="https://cdn.tailwindcss.com"></script>

</head>


<body class="bg-gray-100 min-h-screen">


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


    <!-- Hero Section -->

    <!-- Hero Carousel -->

<section class="relative w-full h-[550px] overflow-hidden">


    <!-- Slide 1 -->

    <div
        class="hero-slide absolute inset-0 transition-opacity duration-1000 opacity-100"
    >

        <img
            src="images/Hero_Bike1.jpg"
            alt="Bike"
            class="w-full h-full object-cover"
        >

    </div>


    <!-- Slide 2 -->

    <div
        class="hero-slide absolute inset-0 transition-opacity duration-1000 opacity-0"
    >

        <img
            src="images/Hero_Bike2.jpg"
            alt="Bike"
            class="w-full h-full object-cover"
        >

    </div>


    <!-- Slide 3 -->

    <div
        class="hero-slide absolute inset-0 transition-opacity duration-1000 opacity-0"
    >

        <img
            src="images/Hero_Bike3.jpg"
            alt="Bike"
            class="w-full h-full object-cover"
        >

    </div>


    <!-- Dark Overlay -->

    <div class="absolute inset-0 bg-black/50"></div>


    <!-- Hero Content -->

    <div
        class="relative z-10 h-full max-w-7xl mx-auto px-6
               flex items-center"
    >

        <div class="max-w-2xl text-white">

            <p class="text-lg md:text-xl font-semibold mb-3">
                Find Your Next Ride
            </p>


            <h1
                class="text-4xl md:text-6xl font-bold leading-tight"
            >
                Find Your
                <span class="text-blue-300">
                    Perfect Bike
                </span>
            </h1>


            <p
                class="text-gray-200 text-base md:text-lg
                       mt-6 leading-relaxed"
            >
                Explore our collection of quality bikes
                and find the perfect one for your needs.
            </p>


            <div class="mt-8">

                <a
                    href="client_bikes.php"
                    class="inline-block bg-[#025CA3] text-white
                           px-6 py-3 rounded-lg font-semibold
                           hover:bg-blue-700 transition"
                >
                    View Available Bikes
                </a>

            </div>

        </div>

    </div>


    <!-- Previous Button -->

    <button
        id="hero-prev"
        type="button"
        class="absolute left-4 md:left-8 top-1/2 -translate-y-1/2
               z-20 bg-black/40 hover:bg-black/60
               text-white w-11 h-11 rounded-full
               flex items-center justify-center
               text-2xl transition"
        aria-label="Previous slide"
    >
        &#10094;
    </button>


    <!-- Next Button -->

    <button
        id="hero-next"
        type="button"
        class="absolute right-4 md:right-8 top-1/2 -translate-y-1/2
               z-20 bg-black/40 hover:bg-black/60
               text-white w-11 h-11 rounded-full
               flex items-center justify-center
               text-2xl transition"
        aria-label="Next slide"
    >
        &#10095;
    </button>


    <!-- Slide Indicators -->

    <div
        class="absolute bottom-6 left-1/2
               -translate-x-1/2 z-20
               flex gap-3"
    >

        <button
            class="hero-dot w-3 h-3 rounded-full bg-white transition"
            data-slide="0"
            aria-label="Go to slide 1"
        ></button>

        <button
            class="hero-dot w-3 h-3 rounded-full bg-white/50 transition"
            data-slide="1"
            aria-label="Go to slide 2"
        ></button>

        <button
            class="hero-dot w-3 h-3 rounded-full bg-white/50 transition"
            data-slide="2"
            aria-label="Go to slide 3"
        ></button>

    </div>

</section>


<!-- Hero Carousel JavaScript -->

<script>

    const heroSlides =
        document.querySelectorAll(".hero-slide");

    const heroDots =
        document.querySelectorAll(".hero-dot");

    const previousButton =
        document.getElementById("hero-prev");

    const nextButton =
        document.getElementById("hero-next");


    let currentSlide = 0;


    function showSlide(index) {

        if (index >= heroSlides.length) {
            currentSlide = 0;
        } else if (index < 0) {
            currentSlide = heroSlides.length - 1;
        } else {
            currentSlide = index;
        }


        heroSlides.forEach((slide, index) => {

            if (index === currentSlide) {

                slide.classList.remove("opacity-0");
                slide.classList.add("opacity-100");

            } else {

                slide.classList.remove("opacity-100");
                slide.classList.add("opacity-0");

            }

        });


        heroDots.forEach((dot, index) => {

            if (index === currentSlide) {

                dot.classList.remove("bg-white/50");
                dot.classList.add("bg-white");

            } else {

                dot.classList.remove("bg-white");
                dot.classList.add("bg-white/50");

            }

        });

    }


    previousButton.addEventListener("click", function () {

        showSlide(currentSlide - 1);

    });


    nextButton.addEventListener("click", function () {

        showSlide(currentSlide + 1);

    });


    heroDots.forEach((dot) => {

        dot.addEventListener("click", function () {

            const slideNumber =
                parseInt(this.dataset.slide);

            showSlide(slideNumber);

        });

    });


    /* Automatically change slide every 5 seconds */

    setInterval(function () {

        showSlide(currentSlide + 1);

    }, 5000);

</script>


    <!-- Features Section -->

    <section class="max-w-7xl mx-auto px-6 py-16">

        <div class="text-center mb-12">

            <h2 class="text-3xl font-bold text-gray-800">
                Why Choose Us?
            </h2>

            <p class="text-gray-500 mt-3">
                Quality bikes and a simple browsing experience.
            </p>

        </div>


        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">


            <!-- Feature 1 -->

            <div class="bg-white rounded-2xl shadow p-8 text-center">

                <div class="text-4xl mb-4">
                    🏍️
                </div>

                <h3 class="text-xl font-bold text-gray-800 mb-3">
                    Quality Bikes
                </h3>

                <p class="text-gray-500">
                    Browse our collection of available bikes.
                </p>

            </div>


            <!-- Feature 2 -->

            <div class="bg-white rounded-2xl shadow p-8 text-center">

                <div class="text-4xl mb-4">
                    🔍
                </div>

                <h3 class="text-xl font-bold text-gray-800 mb-3">
                    Easy to Browse
                </h3>

                <p class="text-gray-500">
                    Find bike information quickly and easily.
                </p>

            </div>


            <!-- Feature 3 -->

            <div class="bg-white rounded-2xl shadow p-8 text-center">

                <div class="text-4xl mb-4">
                    ⭐
                </div>

                <h3 class="text-xl font-bold text-gray-800 mb-3">
                    Reliable Service
                </h3>

                <p class="text-gray-500">
                    Get clear information about every available bike.
                </p>

            </div>


        </div>

    </section>


    <!-- Featured Bikes -->

    <section class="bg-gray-50 py-16">

        <div class="max-w-7xl mx-auto px-6">

            <div class="text-center mb-10">

                <h2 class="text-3xl font-bold text-gray-800">
                    Featured Bikes
                </h2>

                <p class="text-gray-600 mt-2">
                    Check out some of our available bikes.
                </p>

            </div>


            <?php if ($result->num_rows > 0): ?>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">


                    <?php while ($bike = $result->fetch_assoc()): ?>


                        <div class="bg-white rounded-xl shadow-md overflow-hidden">


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

                                        No Image Available

                                    </div>

                                <?php endif; ?>

                            </div>


                            <!-- Bike Information -->

                            <div class="p-6">


                                <div class="flex justify-between items-start gap-4">


                                    <div>

                                        <h3 class="text-xl font-bold text-gray-800">

                                            <?php
                                            echo htmlspecialchars(
                                                $bike["bike_name"]
                                            );
                                            ?>

                                        </h3>


                                        <p class="text-gray-500 mt-1">

                                            <?php
                                            echo htmlspecialchars(
                                                $bike["brand"]
                                            );
                                            ?>

                                        </p>

                                    </div>


                                    <span
                                        class="bg-green-100 text-green-700
                                               px-3 py-1 rounded-full text-sm
                                               font-semibold"
                                    >
                                        Available
                                    </span>


                                </div>


                                <!-- Bike Details -->

                                <div class="grid grid-cols-2 gap-3 mt-5 text-sm">


                                    <div>

                                        <span class="text-gray-500">
                                            Model
                                        </span>

                                        <p class="font-semibold text-gray-800">

                                            <?php
                                            echo htmlspecialchars(
                                                $bike["model"]
                                            );
                                            ?>

                                        </p>

                                    </div>


                                    <div>

                                        <span class="text-gray-500">
                                            Year
                                        </span>

                                        <p class="font-semibold text-gray-800">

                                            <?php
                                            echo htmlspecialchars(
                                                $bike["year"]
                                            );
                                            ?>

                                        </p>

                                    </div>


                                </div>


                                <!-- Price -->

                                <div class="mt-5">

                                    <p class="text-2xl font-bold text-[#025CA3]">

                                        NPR
                                        <?php
                                        echo number_format(
                                            $bike["price"],
                                            2
                                        );
                                        ?>

                                    </p>

                                </div>


                                <!-- View Details -->

                                <a
                                    href="bike_details.php?id=<?php echo $bike["id"]; ?>"
                                    class="block text-center bg-[#025CA3] text-white
                                           py-3 rounded-lg font-semibold
                                           hover:bg-blue-700 transition mt-5"
                                >
                                    View Details
                                </a>


                            </div>

                        </div>


                    <?php endwhile; ?>


                </div>


            <?php else: ?>


                <div class="text-center py-10">

                    <p class="text-gray-500">
                        No bikes are currently available.
                    </p>

                </div>


            <?php endif; ?>


            <!-- View All Bikes -->

            <div class="text-center mt-10">

                <a
                    href="client_bikes.php"
                    class="inline-block bg-[#025CA3] text-white
                           px-6 py-3 rounded-lg font-semibold
                           hover:bg-blue-700 transition"
                >
                    View All Bikes
                </a>

            </div>


        </div>

    </section>


    <!-- Footer -->

    <footer class="bg-gray-800 text-white py-6">

        <div class="max-w-7xl mx-auto px-6 text-center">

            <p>

                © <?php echo date("Y"); ?>
                Bike Management System.
                All rights reserved.

            </p>

        </div>

    </footer>


</body>

</html>