<?php

session_start();


// Check if user is logged in
if (!isset($_SESSION["user_id"])) {
    header("Location: ../login.php");
    exit;
}


// Connect to database
include "../db.php";


// Get all bikes
$sql = "SELECT * FROM bikes ORDER BY id DESC";

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>View Bikes - Bike Management System</title>

    <script src="https://cdn.tailwindcss.com"></script>

</head>


<body class="bg-gray-100 min-h-screen">


    <!-- Navigation -->

    <nav class="bg-[#025CA3] text-white px-8 py-4 flex justify-between items-center">

        <h1 class="text-xl font-bold">
            Bike Management System
        </h1>


        <!-- <div class="flex items-center gap-4">

            <span>
                Welcome, <?php echo htmlspecialchars($_SESSION["user_name"]); ?>
            </span>

            <a
                href="../logout.php"
                class="bg-white text-[#025CA3] px-4 py-2 rounded-lg font-semibold hover:bg-gray-100"
            >
                Logout
            </a>

        </div> -->

        <div class="flex items-center gap-3">

         <span>
                Welcome, <?php echo htmlspecialchars($_SESSION["user_name"]); ?>
            </span>

    <a
        href="../dashboard.php"
        class="bg-white text-[#025CA3] px-4 py-2 rounded-lg
               font-semibold hover:bg-gray-100"
    >
        Dashboard
    </a>

    <a
        href="../logout.php"
        class="bg-white text-[#025CA3] px-4 py-2 rounded-lg
               font-semibold hover:bg-gray-100"
    >
        Logout
    </a>

</div>

    </nav>


    <!-- Main Content -->

    <div class="max-w-7xl mx-auto px-6 py-10">


        <!-- Header -->

        <div class="flex justify-between items-center mb-8">

            <div>

                <h2 class="text-3xl font-bold text-gray-800">
                    Bikes
                </h2>

                <p class="text-gray-500 mt-2">
                    View and manage all bikes.
                </p>

            </div>


            <a
                href="add.php"
                class="bg-[#025CA3] text-white px-5 py-3 rounded-lg
                       font-semibold hover:bg-blue-700 transition"
            >
                + Add Bike
            </a>

        </div>


        <!-- Bikes Table -->

        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">


            <div class="overflow-x-auto">

                <table class="w-full text-left">


                    <!-- Table Header -->

                    <thead class="bg-gray-100 border-b">

                        <tr>

                            <th class="px-6 py-4 text-gray-700 font-semibold">
                                #
                            </th>

                            <th class="px-6 py-4 text-gray-700 font-semibold">
                                Bike Name
                            </th>

                            <th class="px-6 py-4 text-gray-700 font-semibold">
                                Brand
                            </th>

                            <th class="px-6 py-4 text-gray-700 font-semibold">
                                Model
                            </th>

                            <th class="px-6 py-4 text-gray-700 font-semibold">
                                Registration No.
                            </th>

                            <th class="px-6 py-4 text-gray-700 font-semibold">
                                Price
                            </th>

                            <th class="px-6 py-4 text-gray-700 font-semibold">
                                Year
                            </th>

                            <th class="px-6 py-4 text-gray-700 font-semibold">
                                Color
                            </th>

                            <th class="px-6 py-4 text-gray-700 font-semibold">
                                Status
                            </th>

                            <th class="px-6 py-4 text-gray-700 font-semibold">
                                Actions
                            </th>

                        </tr>

                    </thead>


                    <!-- Table Body -->

                    <tbody class="divide-y">


                        <?php if ($result->num_rows > 0): ?>

                            <?php while ($bike = $result->fetch_assoc()): ?>

                                <tr class="hover:bg-gray-50">


                                    <!-- ID -->

                                    <td class="px-6 py-4">
                                        <?php echo $bike["id"]; ?>
                                    </td>


                                    <!-- Bike Name -->

                                    <td class="px-6 py-4 font-medium text-gray-800">
                                        <?php echo htmlspecialchars($bike["bike_name"]); ?>
                                    </td>


                                    <!-- Brand -->

                                    <td class="px-6 py-4">
                                        <?php echo htmlspecialchars($bike["brand"]); ?>
                                    </td>


                                    <!-- Model -->

                                    <td class="px-6 py-4">
                                        <?php echo htmlspecialchars($bike["model"]); ?>
                                    </td>


                                    <!-- Registration Number -->

                                    <td class="px-6 py-4">
                                        <?php echo htmlspecialchars($bike["registration_number"]); ?>
                                    </td>


                                    <!-- Price -->

                                    <td class="px-6 py-4">
                                        Rs. <?php echo number_format($bike["price"], 2); ?>
                                    </td>


                                    <!-- Year -->

                                    <td class="px-6 py-4">
                                        <?php echo $bike["year"]; ?>
                                    </td>


                                    <!-- Color -->

                                    <td class="px-6 py-4">
                                        <?php echo htmlspecialchars($bike["color"]); ?>
                                    </td>


                                    <!-- Status -->

                                    <td class="px-6 py-4">

                                        <?php if ($bike["status"] === "Available"): ?>

                                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-medium">
                                                Available
                                            </span>

                                        <?php else: ?>

                                            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm font-medium">
                                                Sold
                                            </span>

                                        <?php endif; ?>

                                    </td>


                                    <!-- Actions -->

                                    <td class="px-6 py-4">

                                        <div class="flex gap-2">

                                            <a
                                                href="edit.php?id=<?php echo $bike["id"]; ?>"
                                                class="bg-blue-100 text-blue-700 px-3 py-2 rounded-lg
                                                       hover:bg-blue-200"
                                            >
                                                Edit
                                            </a>


                                            <a
                                                href="delete.php?id=<?php echo $bike["id"]; ?>"
                                                onclick="return confirm('Are you sure you want to delete this bike?');"
                                                class="bg-red-100 text-red-700 px-3 py-2 rounded-lg
                                                       hover:bg-red-200"
                                            >
                                                Delete
                                            </a>

                                        </div>

                                    </td>


                                </tr>

                            <?php endwhile; ?>


                        <?php else: ?>


                            <!-- No Bikes -->

                            <tr>

                                <td
                                    colspan="10"
                                    class="px-6 py-10 text-center text-gray-500"
                                >

                                    No bikes have been added yet.

                                </td>

                            </tr>


                        <?php endif; ?>


                    </tbody>

                </table>

            </div>

        </div>


    </div>


</body>

</html>

<?php

$conn->close();

?>