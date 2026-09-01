<?php

include "../Model/db.php";

$name = "";
$username = "";
$dob = "";
$phone = "";
$email = "";
$address = "";
$nid = "";
$password = "";
$message = "";
$valid = true;

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $name = trim($_POST["owner_name"] ?? "");
    $username = trim($_POST["owner_username"] ?? "");
    $dob = trim($_POST["owner_dob"] ?? "");
    $phone = trim($_POST["owner_phone"] ?? "");
    $email = trim($_POST["owner_email"] ?? "");
    $address = trim($_POST["owner_address"] ?? "");
    $nid = trim($_POST["owner_nid"] ?? "");
    $password = trim($_POST["password"] ?? "");

    if (empty($name))
    {
        $message = "Owner Name Required";
        $valid = false;
    }
    else if (!preg_match("/^[A-Za-z ]+$/", $name))
    {
        $message = "Invalid Owner Name";
        $valid = false;
    }

    if (empty($username))
    {
        $message = "Username Required";
        $valid = false;
    }
    else if (strlen($username) < 5)
    {
        $message = "Username must be at least 5 characters";
        $valid = false;
    }

    if (empty($dob))
    {
        $message = "Date of Birth Required";
        $valid = false;
    }

    if (empty($phone))
    {
        $message = "Phone Number Required";
        $valid = false;
    }
    else if (!preg_match("/^01[3-9][0-9]{8}$/", $phone))
    {
        $message = "Invalid Phone Number (11 digits starting with 01)";
        $valid = false;
    }

    if (empty($email))
    {
        $message = "Email Required";
        $valid = false;
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $message = "Invalid Email";
        $valid = false;
    }

    if (empty($address))
    {
        $message = "Address Required";
        $valid = false;
    }

    // Handle NID: text or file upload
    if (isset($_FILES["owner_nid_file"]) && $_FILES["owner_nid_file"]["error"] == 0)
    {
        $allowedTypes = ["image/jpeg", "image/jpg", "image/png", "application/pdf"];
        if (!in_array($_FILES["owner_nid_file"]["type"], $allowedTypes))
        {
            $message = "Only JPG, PNG, and PDF files are allowed for NID";
            $valid = false;
        }
        else if ($_FILES["owner_nid_file"]["size"] > 5 * 1024 * 1024)
        {
            $message = "NID file size must be less than 5 MB";
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
            $nid = $uploaddirectory . $filename;
            if (!move_uploaded_file($_FILES["owner_nid_file"]["tmp_name"], $nid))
            {
                $message = "Failed to upload NID file";
                $valid = false;
            }
        }
    }
    else if (empty($nid))
    {
        $message = "NID Number or File Required";
        $valid = false;
    }

    if (empty($password) || strlen($password) < 5)
    {
        $message = "Password must be at least 5 characters";
        $valid = false;
    }

    if ($valid)
    {
        $database = new db();
        $connection = $database->connection();

        $emailCheck = $database->CheckOwner($connection, "Owner", $email);
        $userCheck = $database->CheckOwnerUsername($connection, "Owner", $username);

        if ($emailCheck && $emailCheck->num_rows > 0)
        {
            $message = "Email Already Taken";
        }
        else if ($userCheck && $userCheck->num_rows > 0)
        {
            $message = "Username Already Taken";
        }
        else
        {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $result = $database->signup(
                $connection,
                "Owner",
                $name,
                $username,
                $address,
                $nid,
                $dob,
                $email,
                $phone,
                $hashedPassword
            );

            if ($result)
            {
                header("Location: ../View/OwnerLogin.php");
                exit();
            }
            else
            {
                $message = "Registration failed. Please try again.";
            }
        }
    }
}

?>