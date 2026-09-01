<?php

include "../Controller/BookingValidation.php";

if (!isset($_SESSION["tenant_id"]))
{
    header("Location: TenantLogin.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en-US">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Book Property</title>

    <link rel="stylesheet" href="../Design/tenant_dashboard_style.php">

    <script>
        function validateBooking()
        {
            let moveIn = document.getElementById("move_in_date").value;
            let transactionId = document.getElementById("transaction_id").value.trim();
            let paymentNumber = document.getElementById("payment_number").value.trim();

            if (moveIn === "")
            {
                alert("Please select a Move-In Date.");
                return false;
            }

            if (transactionId.length < 5)
            {
                alert("Transaction ID must be at least 5 characters.");
                return false;
            }

            if (paymentNumber === "")
            {
                alert("Please enter your payment phone number.");
                return false;
            }

            return true;
        }
    </script>

</head>

<body>

    <div class="position">

        <div class="Header">

            <h1>Flat Rental Management System</h1>

        </div>

        <div class="topnav">

            <a href="tenant_dashboard.php">Dashboard</a>
            <a href="tenant_browse.php">Browse Listings</a>
            <a href="tenant_bookings.php">My Bookings</a>
            <a href="TenantProfile.php">My Profile</a>
            <a href="../Controller/Logout.php">Logout</a>

        </div>

    </div>


    <div class="container">

        <h1>Book Listing</h1>

        <fieldset>

            <legend>Booking & Payment Details</legend>

            <?php if (!empty($message)) { ?>
                <p style="color:#a33; font-weight:bold;">
                    <?php echo htmlspecialchars($message); ?>
                </p>
            <?php } ?>

            <form method="post" action="" enctype="multipart/form-data" onsubmit="return validateBooking()">

                <table>

                    <tr>

                        <td>
                            <label for="tenant_id">Tenant ID:</label>
                        </td>

                        <td>
                            <input
                                type="text"
                                id="tenant_id"
                                name="tenant_id"
                                value="<?php echo htmlspecialchars($tenantId); ?>"
                                readonly
                            >
                        </td>

                    </tr>

                    <tr>

                        <td>
                            <label for="listing_id">Listing ID:</label>
                        </td>

                        <td>
                            <input
                                type="text"
                                id="listing_id"
                                name="listing_id"
                                value="<?php echo htmlspecialchars($listingId); ?>"
                                readonly
                            >
                        </td>

                    </tr>

                    <tr>

                        <td>
                            <label for="booking_date">Booking Date:</label>
                        </td>

                        <td>
                            <input
                                type="date"
                                id="booking_date"
                                name="booking_date"
                                value="<?php echo htmlspecialchars($bookingDate); ?>"
                                readonly
                            >
                        </td>

                    </tr>

                    <tr>

                        <td>
                            <label for="move_in_date">Move In Date:</label>
                        </td>

                        <td>
                            <input
                                type="date"
                                id="move_in_date"
                                name="move_in_date"
                                value="<?php echo htmlspecialchars($moveInDate); ?>"
                            >
                        </td>

                    </tr>

                    <tr>

                        <td>
                            <label for="payment_number">Payment Number (Bkash/Nagad):</label>
                        </td>

                        <td>
                            <input
                                type="tel"
                                id="payment_number"
                                name="payment_number"
                                placeholder="e.g. 017XXXXXXXX"
                                value="<?php echo htmlspecialchars($paymentNumber); ?>"
                            >
                        </td>

                    </tr>

                    <tr>

                        <td>
                            <label for="transaction_id">Transaction ID:</label>
                        </td>

                        <td>
                            <input
                                type="text"
                                id="transaction_id"
                                name="transaction_id"
                                placeholder="Enter payment Transaction ID (e.g. TRX12345)"
                                value="<?php echo htmlspecialchars($transactionId); ?>"
                            >
                        </td>

                    </tr>

                    <tr>

                        <td>
                            <label for="student_card">Student Card (Optional):</label>
                        </td>

                        <td>
                            <input
                                type="file"
                                id="student_card"
                                name="student_card"
                                accept=".jpg,.jpeg,.png,.pdf"
                            >
                            <small style="color: #666;">Only required if you are booking with a student discount.</small>
                        </td>

                    </tr>

                    <tr>

                        <td></td>

                        <td>

                            <input
                                type="submit"
                                id="submit"
                                name="submit"
                                value="Confirm Booking"
                            >

                            <a href="tenant_browse.php">
                                <input type="button" value="Cancel">
                            </a>

                        </td>

                    </tr>

                </table>

            </form>

        </fieldset>

    </div>


    <div class="footer">

        <h2>Home Rental Management System &copy; 2026</h2>

    </div>

</body>

</html>