
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Bike Management System - Register</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

</head>


<body class="bg-white min-h-screen">


    <!-- Registration Section -->

    <div class="flex justify-center items-center min-h-screen px-4">

        <form
            action="register.php"
            method="POST"
            id="registrationForm"
            class="bg-gray-200 p-8 rounded-2xl shadow-lg w-full max-w-xl"
        >


            <!-- Title -->

            <h2 class="text-2xl font-bold text-center text-[#025CA3] mb-8">
                REGISTER
            </h2>


            <!-- Full Name -->

            <div class="mb-5">

                <label
                    for="name"
                    class="block text-black mb-2"
                >
                    Full Name
                </label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    placeholder="Enter your name"
                    class="w-full px-4 py-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-[#025CA3]"
                    required
                >

            </div>


            <!-- Email -->

            <div class="mb-5">

                <label
                    for="email"
                    class="block text-black mb-2"
                >
                    Email
                </label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="Enter your email"
                    class="w-full px-4 py-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-[#025CA3]"
                    required
                >

            </div>


            <!-- Address -->

            <div class="mb-5">

                <label
                    for="address"
                    class="block text-black mb-2"
                >
                    Address
                </label>

                <input
                    type="text"
                    id="address"
                    name="address"
                    placeholder="Enter your address"
                    class="w-full px-4 py-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-[#025CA3]"
                    required
                >

            </div>


            <!-- Phone -->

            <div class="mb-5">

                <label
                    for="phone"
                    class="block text-black mb-2"
                >
                    Phone
                </label>

                <input
                    type="tel"
                    id="phone"
                    name="phone"
                    placeholder="Enter your phone number"
                    class="w-full px-4 py-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-[#025CA3]"
                    required
                >

            </div>


            <!-- Password -->

            <div class="mb-5">

                <label
                    for="password"
                    class="block text-black mb-2"
                >
                    Password
                </label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Enter your password"
                    class="w-full px-4 py-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-[#025CA3]"
                    required
                >

            </div>


            <!-- Confirm Password -->

            <div class="mb-8">

                <label
                    for="confirm_password"
                    class="block text-black mb-2"
                >
                    Confirm Password
                </label>

                <input
                    type="password"
                    id="confirm_password"
                    name="confirm_password"
                    placeholder="Re-enter your password"
                    class="w-full px-4 py-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-[#025CA3]"
                    required
                >

            </div>


            <!-- Error Message -->

            <p
                id="errorMessage"
                class="text-red-500 text-sm mb-4 hidden"
            ></p>


            <!-- Register Button -->

            <button
                type="submit"
                class="w-full bg-[#025CA3] text-white py-3 rounded-md text-lg hover:bg-blue-700 transition"
            >
                Register
            </button>


            <!-- Login Link -->

            <p class="text-center text-gray-600 mt-6">

                Already have an account?

                <a
                    href="login.php"
                    class="text-[#025CA3] font-semibold hover:underline"
                >
                    Login
                </a>

            </p>


        </form>

    </div>


    <!-- JavaScript -->

    <script src="js/script.js"></script>

</body>

</html>
