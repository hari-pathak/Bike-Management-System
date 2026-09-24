<?php

session_start();


/* Protect admin page */

if (!isset($_SESSION["user_id"])) {
    header("Location: ../login.php");
    exit;
}


include "../db.php";


/* Get all enquiries */

$sql = "SELECT
            enquiries.id,
            enquiries.name,
            enquiries.phone,
            enquiries.email,
            enquiries.message,
            enquiries.status,
            enquiries.created_at,
            bikes.bike_name,
            bikes.brand,
            bikes.model,
            bikes.registration_number
        FROM enquiries
        INNER JOIN bikes
            ON enquiries.bike_id = bikes.id
        ORDER BY enquiries.id DESC";


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

    <title>Customer Enquiries - Admin</title>

    <script src="https://cdn.tailwindcss.com"></script>

</head>


<body class="bg-gray-100 min-h-screen">


<!-- Header -->

<nav class="bg-[#025CA3] text-white">

    <div class="max-w-7xl mx-auto px-6 py-4">

        <div class="flex flex-col sm:flex-row
                    justify-between items-center gap-4">


            <!-- Logo -->

            <a
                href="../dashboard.php"
                class="text-xl font-bold"
            >
                Bike Management System
            </a>


            <!-- Navigation -->

            <div class="flex items-center gap-3">

                <a
                    href="../dashboard.php"
                    class="bg-white text-[#025CA3]
                           px-4 py-2 rounded-lg
                           font-semibold
                           hover:bg-gray-100 transition"
                >
                    Dashboard
                </a>


                <a
                    href="../logout.php"
                    class="bg-red-500 text-white
                           px-4 py-2 rounded-lg
                           font-semibold
                           hover:bg-red-600 transition"
                >
                    Logout
                </a>

            </div>

        </div>

    </div>

</nav>


<!-- Main Content -->

<main class="max-w-7xl mx-auto px-6 py-10">


    <!-- Page Heading -->

    <div class="mb-8">

        <h1
            class="text-3xl md:text-4xl
                   font-bold text-gray-800"
        >
            Customer Enquiries
        </h1>

        <p class="text-gray-600 mt-2">
            View enquiries submitted by customers.
        </p>

    </div>


    <!-- Enquiries -->

    <?php if ($result && $result->num_rows > 0): ?>


        <!-- Desktop Table -->

        <div
            class="hidden md:block bg-white
                   rounded-xl shadow-md
                   overflow-hidden"
        >

            <div class="overflow-x-auto">

                <table class="w-full text-left">


                    <!-- Table Header -->

                    <thead class="bg-gray-100">

                        <tr>

                            <th
                                class="px-6 py-4
                                       text-gray-700
                                       font-semibold"
                            >
                                #
                            </th>

                            <th
                                class="px-6 py-4
                                       text-gray-700
                                       font-semibold"
                            >
                                Customer
                            </th>

                            <th
                                class="px-6 py-4
                                       text-gray-700
                                       font-semibold"
                            >
                                Contact
                            </th>

                            <th
                                class="px-6 py-4
                                       text-gray-700
                                       font-semibold"
                            >
                                Bike
                            </th>

                            <th
                                class="px-6 py-4
                                       text-gray-700
                                       font-semibold"
                            >
                                Message
                            </th>
                            <th
                                class="px-6 py-4
                                       text-gray-700
                                       font-semibold"
                            >
                                Status
                            </th>

                            <th
                                class="px-6 py-4
                                       text-gray-700
                                       font-semibold"
                            >
                                Date
                            </th>

                        </tr>

                    </thead>


                    <!-- Table Body -->

                    <tbody class="divide-y divide-gray-200">


                        <?php while ($enquiry = $result->fetch_assoc()): ?>

                            <tr
                                class="hover:bg-gray-50
                                       transition"
                            >


                                <!-- ID -->

                                <td class="px-6 py-5">

                                    <?php echo $enquiry["id"]; ?>

                                </td>


                                <!-- Customer -->

                                <td class="px-6 py-5">

                                    <p
                                        class="font-semibold
                                               text-gray-800"
                                    >
                                        <?php
                                        echo htmlspecialchars(
                                            $enquiry["name"]
                                        );
                                        ?>
                                    </p>

                                </td>


                                <!-- Contact -->

                                <td class="px-6 py-5">

                                    <p class="text-gray-700">

                                        <?php
                                        echo htmlspecialchars(
                                            $enquiry["phone"]
                                        );
                                        ?>

                                    </p>

                                    <p
                                        class="text-sm
                                               text-gray-500 mt-1"
                                    >

                                        <?php
                                        echo htmlspecialchars(
                                            $enquiry["email"]
                                        );
                                        ?>

                                    </p>

                                </td>


                                <!-- Bike -->

                                <td class="px-6 py-5">

                                    <p
                                        class="font-semibold
                                               text-gray-800"
                                    >

                                        <?php
                                        echo htmlspecialchars(
                                            $enquiry["bike_name"]
                                        );
                                        ?>

                                    </p>

                                    <p
                                        class="text-sm
                                               text-gray-500"
                                    >

                                        <?php
                                        echo htmlspecialchars(
                                            $enquiry["brand"]
                                        );
                                        ?>

                                        -

                                        <?php
                                        echo htmlspecialchars(
                                            $enquiry["model"]
                                        );
                                        ?>

                                    </p>

                                    <p
                                        class="text-sm
                                               text-gray-500"
                                    >

                                        Reg:

                                        <?php
                                        echo htmlspecialchars(
                                            $enquiry[
                                                "registration_number"
                                            ]
                                        );
                                        ?>

                                    </p>

                                </td>


                                <!-- Message -->

                                <td
                                    class="px-6 py-5
                                           max-w-xs"
                                >

                                    <p
                                        class="text-gray-700
                                               break-words"
                                    >

                                        <?php
                                        echo nl2br(
                                            htmlspecialchars(
                                                $enquiry["message"]
                                            )
                                        );
                                        ?>

                                    </p>

                                </td>

                                <!-- Status -->

<td class="px-6 py-5">

    <form
        action="update_status.php"
        method="POST"
    >

        <input
            type="hidden"
            name="id"
            value="<?php echo $enquiry["id"]; ?>"
        >

        <select
            name="status"
            onchange="this.form.submit()"
            class="border border-gray-300
                   rounded-lg px-3 py-2
                   text-sm font-semibold
                   focus:outline-none
                   focus:ring-2
                   focus:ring-[#025CA3]"
        >

            <option
                value="New"
                <?php
                echo $enquiry["status"] === "New"
                    ? "selected"
                    : "";
                ?>
            >
                New
            </option>

            <option
                value="Contacted"
                <?php
                echo $enquiry["status"] === "Contacted"
                    ? "selected"
                    : "";
                ?>
            >
                Contacted
            </option>

            <option
                value="Closed"
                <?php
                echo $enquiry["status"] === "Closed"
                    ? "selected"
                    : "";
                ?>
            >
                Closed
            </option>

        </select>

    </form>

</td>




                                <!-- Date -->

                                <td
                                    class="px-6 py-5
                                           text-gray-600
                                           whitespace-nowrap"
                                >

                                    <?php
                                    echo date(
                                        "d M Y",
                                        strtotime(
                                            $enquiry["created_at"]
                                        )
                                    );
                                    ?>

                                    <br>

                                    <span
                                        class="text-sm
                                               text-gray-400"
                                    >

                                        <?php
                                        echo date(
                                            "h:i A",
                                            strtotime(
                                                $enquiry["created_at"]
                                            )
                                        );
                                        ?>

                                    </span>

                                </td>

                            </tr>

                        <?php endwhile; ?>


                    </tbody>

                </table>

            </div>

        </div>


        <!-- Mobile Cards -->

        <div class="md:hidden space-y-5">


            <?php

            /*
             * Run the query again for mobile cards
             */

            $mobile_sql = "SELECT
                                enquiries.id,
                                enquiries.name,
                                enquiries.phone,
                                enquiries.email,
                                enquiries.message,
                                enquiries.status,
                                enquiries.created_at,
                                bikes.bike_name,
                                bikes.brand,
                                bikes.model,
                                bikes.registration_number
                            FROM enquiries
                            INNER JOIN bikes
                                ON enquiries.bike_id = bikes.id
                            ORDER BY enquiries.id DESC";

            $mobile_result = $conn->query($mobile_sql);

            ?>


            <?php while ($enquiry = $mobile_result->fetch_assoc()): ?>


                <div
                    class="bg-white rounded-xl
                           shadow-md p-5"
                >


                    <!-- Customer -->

                    <div class="mb-4">

                        <p
                            class="text-sm text-gray-500"
                        >
                            Customer
                        </p>

                        <p
                            class="text-lg font-bold
                                   text-gray-800"
                        >

                            <?php
                            echo htmlspecialchars(
                                $enquiry["name"]
                            );
                            ?>

                        </p>

                    </div>


                    <!-- Contact -->

                    <div class="mb-4">

                        <p
                            class="text-sm text-gray-500"
                        >
                            Contact
                        </p>

                        <p class="text-gray-700">

                            <?php
                            echo htmlspecialchars(
                                $enquiry["phone"]
                            );
                            ?>

                        </p>

                        <p class="text-gray-600">

                            <?php
                            echo htmlspecialchars(
                                $enquiry["email"]
                            );
                            ?>

                        </p>

                    </div>


                    <!-- Bike -->

                    <div class="mb-4">

                        <p
                            class="text-sm text-gray-500"
                        >
                            Interested Bike
                        </p>

                        <p
                            class="font-semibold
                                   text-gray-800"
                        >

                            <?php
                            echo htmlspecialchars(
                                $enquiry["bike_name"]
                            );
                            ?>

                        </p>

                        <p class="text-gray-600">

                            <?php
                            echo htmlspecialchars(
                                $enquiry["brand"]
                            );
                            ?>

                            -

                            <?php
                            echo htmlspecialchars(
                                $enquiry["model"]
                            );
                            ?>

                        </p>

                    </div>


                    <!-- Message -->

                    <div class="mb-4">

                        <p
                            class="text-sm text-gray-500"
                        >
                            Message
                        </p>

                        <p class="text-gray-700">

                            <?php
                            echo nl2br(
                                htmlspecialchars(
                                    $enquiry["message"]
                                )
                            );
                            ?>

                        </p>

                    </div>

                    <!-- Status -->

<div class="mb-4">

    <p class="text-sm text-gray-500 mb-2">
        Status
    </p>

    <form
        action="update_status.php"
        method="POST"
    >

        <input
            type="hidden"
            name="id"
            value="<?php echo $enquiry["id"]; ?>"
        >

        <select
            name="status"
            onchange="this.form.submit()"
            class="w-full border border-gray-300
                   rounded-lg px-3 py-2
                   text-sm font-semibold
                   focus:outline-none
                   focus:ring-2
                   focus:ring-[#025CA3]"
        >

            <option
                value="New"
                <?php
                echo $enquiry["status"] === "New"
                    ? "selected"
                    : "";
                ?>
            >
                New
            </option>

            <option
                value="Contacted"
                <?php
                echo $enquiry["status"] === "Contacted"
                    ? "selected"
                    : "";
                ?>
            >
                Contacted
            </option>

            <option
                value="Closed"
                <?php
                echo $enquiry["status"] === "Closed"
                    ? "selected"
                    : "";
                ?>
            >
                Closed
            </option>

        </select>

    </form>

</div>


                    <!-- Date -->

                    <div
                        class="text-sm text-gray-500
                               border-t pt-4"
                    >

                        Submitted:

                        <?php
                        echo date(
                            "d M Y, h:i A",
                            strtotime(
                                $enquiry["created_at"]
                            )
                        );
                        ?>

                    </div>

                </div>


            <?php endwhile; ?>


        </div>


    <?php else: ?>


        <!-- No Enquiries -->

        <div
            class="bg-white rounded-xl
                   shadow-md p-10 text-center"
        >

            <div
                class="text-5xl mb-5"
            >
                📩
            </div>

            <h2
                class="text-2xl font-bold
                       text-gray-800 mb-2"
            >
                No Enquiries Yet
            </h2>

            <p class="text-gray-500">
                Customer enquiries will appear here
                when someone submits an enquiry.
            </p>

        </div>


    <?php endif; ?>


</main>


</body>

</html>

<?php

$conn->close();

?>