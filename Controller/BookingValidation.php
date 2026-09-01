<?php

include "../Model/db.php";

if (session_status() == PHP_SESSION_NONE)
{
    session_start();
}

$tenantId = $_SESSION["tenant_id"] ?? "";
$listingId = trim($_GET["listing_id"] ?? $_POST["listing_id"] ?? "");
$bookingDate = date("Y-m-d");
$moveInDate = "";
$transactionId = "";
$paymentNumber = "";
$studentCard = "";
$message = "";
$valid = true;

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $tenantId = $_SESSION["tenant_id"] ?? trim($_POST["tenant_id"] ?? "");
    $listingId = trim($_POST["listing_id"] ?? "");
    $bookingDate = trim($_POST["booking_date"] ?? date("Y-m-d"));
    $moveInDate = trim($_POST["move_in_date"] ?? "");
    $transactionId = trim($_POST["transaction_id"] ?? "");
    $paymentNumber = trim($_POST["payment_number"] ?? "");

    if (empty($tenantId))
    {
        $message = "Tenant ID is required. Please login first.";
        $valid = false;
    }
    else if (empty($listingId))
    {
        $message = "Listing ID is required.";
        $valid = false;
    }
    else if (empty($bookingDate))
    {
        $message = "Booking Date is required.";
        $valid = false;
    }
    else if (empty($moveInDate))
    {
        $message = "Move In Date is required.";
        $valid = false;
    }
    else if (empty($transactionId) || strlen($transactionId) < 5)
    {
        $message = "Transaction ID must be at least 5 characters.";
        $valid = false;
    }
    else if (empty($paymentNumber) || !preg_match("/^01[3-9][0-9]{8}$/", $paymentNumber))
    {
        $message = "Valid 11-digit Payment Number is required (e.g. 017XXXXXXXX).";
        $valid = false;
    }
    // Student Card is optional (only required if tenant is a student)
    if (isset($_FILES["student_card"]) && $_FILES["student_card"]["error"] == 0)
    {
        $allowedTypes = [
            "image/jpeg",
            "image/jpg",
            "image/png",
            "application/pdf"
        ];

        $fileType = $_FILES["student_card"]["type"];
        $fileSize = $_FILES["student_card"]["size"];

        if (!in_array($fileType, $allowedTypes))
        {
            $message = "Only JPG, JPEG, PNG, and PDF files are allowed for Student Card.";
            $valid = false;
        }
        else if ($fileSize > 5 * 1024 * 1024)
        {
            $message = "Student Card file size must be less than 5 MB.";
            $valid = false;
        }
        else
        {
            $uploaddirectory = "../Uploads/";

            if (!is_dir($uploaddirectory))
            {
                mkdir($uploaddirectory, 0777, true);
            }

            $filename = time() . "_" . basename($_FILES["student_card"]["name"]);
            $studentCard = $uploaddirectory . $filename;

            if (!move_uploaded_file($_FILES["student_card"]["tmp_name"], $studentCard))
            {
                $message = "Failed to upload Student Card.";
                $valid = false;
            }
        }
    }

    if ($valid)
    {
        $database = new db();
        $connection = $database->connection();

        $result = $database->addBooking(
            $connection,
            "Books",
            $tenantId,
            $listingId,
            $bookingDate,
            $moveInDate,
            $paymentNumber,
            $transactionId,
            $studentCard
        );

        if ($result)
        {
            header("Location: tenant_bookings.php");
            exit();
        }
        else
        {
            $message = "Booking failed. Please check your inputs and try again.";
        }
    }
}

?>