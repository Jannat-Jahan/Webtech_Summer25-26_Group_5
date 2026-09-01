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
    $name = trim($_POST["tenant_name"] ?? "");
    $username = trim($_POST["tenant_username"] ?? "");
    $dob = trim($_POST["tenant_dob"] ?? "");
    $phone = trim($_POST["tenant_phone"] ?? "");
    $email = trim($_POST["tenant_email"] ?? "");
    $address = trim($_POST["tenant_address"] ?? "");
    $password = trim($_POST["password"] ?? "");


    if (empty($name))
    {
        $message = "Tenant Name Required";
        $valid = false;
    }
    else if (!preg_match("/^[A-Za-z ]+$/", $name))
    {
        $message = "Invalid Tenant Name";
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
        $message = "Invalid Phone Number";
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


    if (!isset($_FILES["tenant_nid"]) || $_FILES["tenant_nid"]["error"] != 0)
    {
        $message = "NID File is Required";
        $valid = false;
    }
    else
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
            $message = "Only JPG, JPEG, PNG, and PDF files are allowed for NID";
            $valid = false;
        }
        else if ($fileSize > 5 * 1024 * 1024)
        {
            $message = "NID file size must be less than 5 MB";
            $valid = false;
        }
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

        $emailCheck = $database->CheckTenant(
            $connection,
            "Tenant",
            $email
        );

        $userCheck = $database->CheckTenantUsername(
            $connection,
            "Tenant",
            $username
        );

        if ($emailCheck->num_rows > 0)
        {
            $message = "Email Already Taken";
        }
        else if ($userCheck->num_rows > 0)
        {
            $message = "Username Already Taken";
        }
        else
        {
            $uploaddirectory = "../Uploads/";

            if (!is_dir($uploaddirectory))
            {
                mkdir($uploaddirectory, 0777, true);
            }

            $filename = time() . "_" . basename($_FILES["tenant_nid"]["name"]);
            $nid = $uploaddirectory . $filename;

            if (move_uploaded_file($_FILES["tenant_nid"]["tmp_name"], $nid))
            {
                $hashed_password = password_hash(
                    $password,
                    PASSWORD_DEFAULT
                );

                $result = $database->signupTenant(
                    $connection,
                    "Tenant",
                    $name,
                    $username,
                    $dob,
                    $phone,
                    $email,
                    $address,
                    $nid,
                    $hashed_password
                );

                if ($result)
                {
                    header("Location: ../View/TenantLogin.php");
                    exit();
                }
                else
                {
                    $message = "Registration failed. Please try again.";
                }
            }
            else
            {
                $message = "Failed to upload NID file.";
            }
        }
    }
}

?>