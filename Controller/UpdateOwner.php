<?php

include "../Model/db.php";

if (session_status() == PHP_SESSION_NONE)
{
    session_start();
}

$owner_name = "";
$owner_username = "";
$owner_dob = "";
$owner_phone = "";
$owner_email = "";
$owner_address = "";
$owner_nid = "";
$message = "";
$valid = true;

if (!isset($_SESSION["owner_id"]))
{
    echo "Please Login First";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $owner_name = trim($_POST["owner_name"] ?? $_POST["full_name"] ?? "");
    $owner_username = trim($_POST["owner_username"] ?? "");
    $owner_dob = trim($_POST["owner_dob"] ?? "");
    $owner_phone = trim($_POST["owner_phone"] ?? $_POST["phone"] ?? "");
    $owner_email = trim($_POST["owner_email"] ?? $_POST["email"] ?? "");
    $owner_address = trim($_POST["owner_address"] ?? $_POST["address"] ?? "");
    $owner_nid = trim($_POST["owner_nid"] ?? "");

    if (empty($owner_name))
    {
        $message = "Owner Name Required";
        $valid = false;
    }
    else if (!preg_match("/^[A-Za-z ]+$/", $owner_name))
    {
        $message = "Invalid Owner Name";
        $valid = false;
    }
    else if (empty($owner_username))
    {
        $message = "Username Required";
        $valid = false;
    }
    else if (strlen($owner_username) < 5)
    {
        $message = "Username must be at least 5 characters";
        $valid = false;
    }
    else if (empty($owner_dob))
    {
        $message = "Date of Birth Required";
        $valid = false;
    }
    else if (empty($owner_phone))
    {
        $message = "Phone Required";
        $valid = false;
    }
    else if (!preg_match("/^01[3-9][0-9]{8}$/", $owner_phone))
    {
        $message = "Invalid Phone Number";
        $valid = false;
    }
    else if (empty($owner_email))
    {
        $message = "Email Required";
        $valid = false;
    }
    else if (!filter_var($owner_email, FILTER_VALIDATE_EMAIL))
    {
        $message = "Invalid Email";
        $valid = false;
    }
    else if (empty($owner_address))
    {
        $message = "Address Required";
        $valid = false;
    }

    // Optional NID file update
    if (isset($_FILES["owner_nid_file"]) && $_FILES["owner_nid_file"]["error"] == 0)
    {
        $allowedTypes = ["image/jpeg", "image/jpg", "image/png", "application/pdf"];
        if (!in_array($_FILES["owner_nid_file"]["type"], $allowedTypes))
        {
            $message = "Only JPG, PNG, and PDF files are allowed for NID.";
            $valid = false;
        }
        else if ($_FILES["owner_nid_file"]["size"] > 5 * 1024 * 1024)
        {
            $message = "NID file size must be less than 5 MB.";
            $valid = false;
        }
        else
        {
            $uploaddirectory = "../Uploads/";
            if (!is_dir($uploaddirectory))
            {
                mkdir($uploaddirectory, 0777, true);
            }
            $filename = time() . "_" . basename($_FILES["owner_nid_file"]["name"]);
            $newNid = $uploaddirectory . $filename;
            if (move_uploaded_file($_FILES["owner_nid_file"]["tmp_name"], $newNid))
            {
                $owner_nid = $newNid;
            }
            else
            {
                $message = "Failed to upload new NID file.";
                $valid = false;
            }
        }
    }
    else if (empty($owner_nid))
    {
        $message = "NID Required";
        $valid = false;
    }

    if ($valid)
    {
        $owner_id = $_SESSION["owner_id"];
        $database = new db();
        $connection = $database->connection();

        $result = $database->updateOwner(
            $connection,
            "Owner",
            $owner_id,
            $owner_name,
            $owner_username,
            $owner_address,
            $owner_nid,
            $owner_dob,
            $owner_email,
            $owner_phone
        );

        if ($result)
        {
            $_SESSION["owner_name"] = $owner_name;
            $_SESSION["owner_username"] = $owner_username;
            $_SESSION["owner_email"] = $owner_email;

            echo "Profile Updated Successfully";
        }
        else
        {
            echo "Profile Update Failed";
        }
    }
    else
    {
        echo $message;
    }
}

?>