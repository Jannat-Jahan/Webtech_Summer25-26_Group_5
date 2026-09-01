<?php

include "../Model/db.php";

if (session_status() == PHP_SESSION_NONE)
{
    session_start();
}

if (!isset($_SESSION["tenant_id"]))
{
    header("Location: TenantLogin.php");
    exit();
}

$database = new db();
$connection = $database->connection();
$tenant_id = $_SESSION["tenant_id"];

$message = "";
$valid = true;

// Fetch current tenant info
$res = $database->getTenant($connection, "Tenant", $tenant_id);
$tenant = ($res && $res->num_rows > 0) ? $res->fetch_assoc() : [];

$name = $tenant["tenant_name"] ?? "";
$username = $tenant["tenant_username"] ?? "";
$dob = $tenant["tenant_dob"] ?? "";
$phone = $tenant["tenant_phone"] ?? "";
$email = $tenant["tenant_email"] ?? "";
$address = $tenant["tenant_address"] ?? "";
$nid = $tenant["tenant_nid"] ?? "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $name = trim($_POST["tenant_name"] ?? "");
    $username = trim($_POST["tenant_username"] ?? "");
    $dob = trim($_POST["tenant_dob"] ?? "");
    $phone = trim($_POST["tenant_phone"] ?? "");
    $email = trim($_POST["tenant_email"] ?? "");
    $address = trim($_POST["tenant_address"] ?? "");

    if (empty($name))
    {
        $message = "Full Name is Required";
        $valid = false;
    }
    else if (!preg_match("/^[A-Za-z ]+$/", $name))
    {
        $message = "Invalid Full Name";
        $valid = false;
    }

    if (empty($username) || strlen($username) < 5)
    {
        $message = "Username must be at least 5 characters";
        $valid = false;
    }

    if (empty($dob))
    {
        $message = "Date of Birth is Required";
        $valid = false;
    }

    if (empty($phone) || !preg_match("/^01[3-9][0-9]{8}$/", $phone))
    {
        $message = "Invalid Phone Number";
        $valid = false;
    }

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $message = "Invalid Email";
        $valid = false;
    }

    if (empty($address))
    {
        $message = "Address is Required";
        $valid = false;
    }

    // Optional NID file update
    if (isset($_FILES["tenant_nid"]) && $_FILES["tenant_nid"]["error"] == 0)
    {
        $allowedTypes = [
            "image/jpeg",
            "image/jpg",
            "image/png",
            "application/pdf"
        ];

        $fileType = $_FILES["tenant_nid"]["type"];
        $fileSize = $_FILES["tenant_nid"]["size"];

        if (!in_array($fileType, $allowedTypes))
        {
            $message = "Only JPG, JPEG, PNG, and PDF files are allowed for NID.";
            $valid = false;
        }
        else if ($fileSize > 5 * 1024 * 1024)
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

            $filename = time() . "_" . basename($_FILES["tenant_nid"]["name"]);
            $newNid = $uploaddirectory . $filename;

            if (move_uploaded_file($_FILES["tenant_nid"]["tmp_name"], $newNid))
            {
                $nid = $newNid;
            }
            else
            {
                $message = "Failed to upload new NID file.";
                $valid = false;
            }
        }
    }

    if ($valid)
    {
        $result = $database->updateTenant(
            $connection,
            "Tenant",
            $tenant_id,
            $name,
            $username,
            $dob,
            $phone,
            $email,
            $address,
            $nid
        );

        if ($result)
        {
            $_SESSION["tenant_name"] = $name;
            $_SESSION["tenant_username"] = $username;
            $_SESSION["tenant_email"] = $email;

            $message = "Profile updated successfully!";
        }
        else
        {
            $message = "Failed to update profile.";
        }
    }
}

?>
