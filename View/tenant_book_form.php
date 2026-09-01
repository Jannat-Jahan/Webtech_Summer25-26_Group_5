<?php
include "../Controller/BookingValidation.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Book Listing</title>
</head>

<body>

    <h2>Book Listing</h2>

    <form method="post" action="" enctype="multipart/form-data">

        <table>

            <tr>
                <td>
                    <label for="tenant_id">Tenant ID:</label>
                </td>
                <td>
                    <input type="text"
                           id="tenant_id"
                           name="tenant_id"
                           placeholder="Enter Tenant ID">
                    <?php echo $tenantId; ?>
                </td>
            </tr>

            <tr>
                <td>
                    <label for="listing_id">Listing ID:</label>
                </td>
                <td>
                    <input type="text"
                           id="listing_id"
                           name="listing_id"
                           placeholder="Enter Listing ID">
                    <?php echo $listingId; ?>
                </td>
            </tr>

            <tr>
                <td>
                    <label for="booking_date">Booking Date:</label>
                </td>
                <td>
                    <input type="date"
                           id="booking_date"
                           name="booking_date">
                    <?php echo $bookingDate; ?>
                </td>
            </tr>

            <tr>
                <td>
                    <label for="move_in_date">Move In Date:</label>
                </td>
                <td>
                    <input type="date"
                           id="move_in_date"
                           name="move_in_date">
                    <?php echo $moveInDate; ?>
                </td>
            </tr>

            <tr>
                <td>
                    <label for="transaction_id">Transaction ID:</label>
                </td>
                <td>
                    <input type="text"
                           id="transaction_id"
                           name="transaction_id"
                           placeholder="Enter Transaction ID">
                    <?php echo $transactionId; ?>
                </td>
            </tr>

            <tr>
                <td>
                    <label for="payment_number">Payment Number:</label>
                </td>
                <td>
                    <input type="text"
                           id="payment_number"
                           name="payment_number"
                           placeholder="Enter Payment Number">
                    <?php echo $paymentNumber; ?>
                </td>
            </tr>

            <tr>
                <td>
                    <label for="student_card">Student Card:</label>
                </td>
                <td>
                    <input type="file"
                           id="student_card"
                           name="student_card">
                </td>
            </tr>

        </table>

        <br>

        <input type="submit"
               id="submit"
               name="submit"
               value="Book Listing">

        <input type="reset"
               id="reset"
               name="reset">

    </form>

</body>
</html>