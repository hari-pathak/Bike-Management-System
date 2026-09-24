<?php

session_start();

// Check if user is logged in
if (!isset($_SESSION["user_id"])) {
    header("Location: ../login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Bike - Bike Management System</title>

    <script src="https://cdn.tailwindcss.com"></script>

</head>


<body class="bg-gray-100 min-h-screen">


    <!-- Navigation -->

    <nav class="bg-[#025CA3] text-white px-8 py-4 flex justify-between items-center">

        <h1 class="text-xl font-bold">
            Bike Management System
        </h1>

        <a
            href="../logout.php"
            class="bg-white text-[#025CA3] px-4 py-2 rounded-lg font-semibold hover:bg-gray-100"
        >
            Logout
        </a>

    </nav>


    <!-- Main Content -->

    <div class="max-w-3xl mx-auto px-6 py-10">


        <div class="bg-white rounded-2xl shadow-lg p-8">


            <!-- Heading -->

            <div class="mb-8">

                <h2 class="text-3xl font-bold text-gray-800">
                    Add New Bike
                </h2>

                <p class="text-gray-500 mt-2">
                    Enter the details of the bike below.
                </p>

            </div>


            <!-- Add Bike Form -->

            <form
                action="add_process.php"
                method="POST"
                enctype="multipart/form-data"
            >


                <!-- Bike Name -->

                <div class="mb-5">

                    <label
                        for="bike_name"
                        class="block text-gray-700 font-medium mb-2"
                    >
                        Bike Name
                    </label>

                    <input
                        type="text"
                        id="bike_name"
                        name="bike_name"
                        placeholder="e.g. MT-15"
                        required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg
                               focus:outline-none focus:ring-2 focus:ring-[#025CA3]"
                    >

                </div>


                <!-- Brand -->

                <div class="mb-5">

                    <label
                        for="brand"
                        class="block text-gray-700 font-medium mb-2"
                    >
                        Brand
                    </label>

                    <input
                        type="text"
                        id="brand"
                        name="brand"
                        placeholder="e.g. Yamaha"
                        required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg
                               focus:outline-none focus:ring-2 focus:ring-[#025CA3]"
                    >

                </div>


                <!-- Model -->

                <div class="mb-5">

                    <label
                        for="model"
                        class="block text-gray-700 font-medium mb-2"
                    >
                        Model
                    </label>

                    <input
                        type="text"
                        id="model"
                        name="model"
                        placeholder="e.g. MT-15 V2"
                        required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg
                               focus:outline-none focus:ring-2 focus:ring-[#025CA3]"
                    >

                </div>


                <!-- Registration Number -->

                <div class="mb-5">

                    <label
                        for="registration_number"
                        class="block text-gray-700 font-medium mb-2"
                    >
                        Registration Number
                    </label>

                    <input
                        type="text"
                        id="registration_number"
                        name="registration_number"
                        placeholder="e.g. BA 12 PA 1234"
                        required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg
                               focus:outline-none focus:ring-2 focus:ring-[#025CA3]"
                    >

                </div>


                <!-- Price -->

                <div class="mb-5">

                    <label
                        for="price"
                        class="block text-gray-700 font-medium mb-2"
                    >
                        Price
                    </label>

                    <input
                        type="number"
                        id="price"
                        name="price"
                        placeholder="e.g. 450000"
                        min="0"
                        step="0.01"
                        required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg
                               focus:outline-none focus:ring-2 focus:ring-[#025CA3]"
                    >

                </div>


                <!-- Year -->

                <div class="mb-5">

                    <label
                        for="year"
                        class="block text-gray-700 font-medium mb-2"
                    >
                        Year
                    </label>

                    <input
                        type="number"
                        id="year"
                        name="year"
                        placeholder="e.g. 2025"
                        min="1900"
                        max="2100"
                        required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg
                               focus:outline-none focus:ring-2 focus:ring-[#025CA3]"
                    >

                </div>


                <!-- Color -->

                <div class="mb-5">

                    <label
                        for="color"
                        class="block text-gray-700 font-medium mb-2"
                    >
                        Color
                    </label>

                    <input
                        type="text"
                        id="color"
                        name="color"
                        placeholder="e.g. Black"
                        required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg
                               focus:outline-none focus:ring-2 focus:ring-[#025CA3]"
                    >

                </div>

                <!-- Bike Image -->

<div class="mb-5">

    <label
        for="image"
        class="block text-gray-700 font-medium mb-2"
    >
        Bike Image
    </label>

    <input
        type="file"
        id="image"
        name="image"
        accept="image/jpeg,image/png,image/webp"
        required
        class="w-full px-4 py-3 border border-gray-300 rounded-lg
               bg-white
               focus:outline-none focus:ring-2 focus:ring-[#025CA3]"
    >

    <p class="text-sm text-gray-500 mt-2">
        JPG, PNG, or WEBP only. Maximum size: 5MB.
    </p>

</div>


                <!-- Status -->

                <div class="mb-8">

                    <label
                        for="status"
                        class="block text-gray-700 font-medium mb-2"
                    >
                        Status
                    </label>

                    <select
                        id="status"
                        name="status"
                        required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg
                               focus:outline-none focus:ring-2 focus:ring-[#025CA3]"
                    >

                        <option value="Available">
                            Available
                        </option>

                        <option value="Sold">
                            Sold
                        </option>

                    </select>

                </div>


                <!-- Buttons -->

                <div class="flex gap-4">


                    <button
                        type="submit"
                        class="flex-1 bg-[#025CA3] text-white py-3 rounded-lg
                               font-semibold hover:bg-blue-700 transition"
                    >
                        Add Bike
                    </button>


                    <a
                        href="index.php"
                        class="flex-1 text-center bg-gray-200 text-gray-700 py-3 rounded-lg
                               font-semibold hover:bg-gray-300 transition"
                    >
                        Cancel
                    </a>


                </div>


            </form>

        </div>

    </div>

</body>

</html>