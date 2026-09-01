<?php
$tenantId="";
$listingId="";
$bookingDate="";
$moveInDate="";
$transactionId="";
$paymentNumber="";
$studentCard="";

if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $tenantId=trim($_POST["tenant_id"] ?? "");
        $listingId=trim($_POST["listing_id"] ?? "");
        $bookingDate=trim($_POST["booking_date"] ?? "");
        $moveInDate=trim($_POST["move_in_date"] ?? "");
        $transactionId=trim($_POST["transaction_id"] ?? "");
        $paymentNumber=trim($_POST["payment_number"] ?? "");
        $studentCard=trim($_POST["student_card"] ?? "");

        if(!empty($tenantId))
            {
                echo "Tenant ID: ".$tenantId;
                echo "<br>";
            }
        else{
            echo "Tenant ID is required";
        }

        if(!empty($listingId))
            {
                echo "Listing ID: ".$listingId;
                echo "<br>";
            }
        else{
            echo "Listing ID is required";
        }

        if(!empty($bookingDate))
            {
                echo "Booking Date: ".$bookingDate;
                echo "<br>";
            }
        else{
            echo "Booking Date is required";
        }

        if(!empty($moveInDate))
            {
                echo "Move In Date: ".$moveInDate;
                echo "<br>";
            }
        else{
            echo "Move In Date is required";
        }

        if(!empty($transactionId) && strlen($transactionId)>=5)
            {
                echo "Transaction ID: ".$transactionId;
                echo "<br>";
            }
        else{
            echo "Transaction ID Must be at least 5 Char";
        }

        if(!empty($paymentNumber) && strlen($paymentNumber)>=5)
            {
                echo "Payment Number: ".$paymentNumber;
                echo "<br>";
            }
        else{
            echo "Payment Number Must be at least 5 Char";
        }

        if(!empty($studentCard) && strlen($studentCard)>=3)
            {
                echo "Student Card: ".$studentCard;
                echo "<br>";
            }
        else{
            echo "Student Card Must be at least 3 Char";
        }
    }
?>