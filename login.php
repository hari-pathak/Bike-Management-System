<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - Bike Management System</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="bg-white w-full max-w-md p-8 rounded-2xl shadow-lg">

        <h1 class="text-3xl font-bold text-center text-[#025CA3] mb-2">
            Bike Management System
        </h1>

        <p class="text-center text-gray-500 mb-8">
            Login to your account
        </p>

        <form action="login_process.php" method="POST">

            <!-- Email -->
            <div class="mb-5">

                <label
                    for="email"
                    class="block text-sm font-medium text-gray-700 mb-2">
                    Email Address
                </label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    required
                    placeholder="Enter your email"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg
                           focus:outline-none focus:ring-2 focus:ring-blue-500">

            </div>


            <!-- Password -->
            <div class="mb-6">

                <label
                    for="password"
                    class="block text-sm font-medium text-gray-700 mb-2">
                    Password
                </label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    required
                    placeholder="Enter your password"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg
                           focus:outline-none focus:ring-2 focus:ring-blue-500">

            </div>


            <!-- Login Button -->
            <button
                type="submit"
                class="w-full bg-[#025CA3] text-white py-3 rounded-lg
                       font-semibold hover:bg-blue-700 transition">

                Login

            </button>

        </form>


        <!-- Register Link -->
        <p class="text-center text-gray-600 mt-6">

            Don't have an account?

            <a
                href="index.php"
                class="text-[#025CA3] font-semibold hover:underline">

                Register

            </a>

        </p>

    </div>

</body>

</html>