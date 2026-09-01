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
    $nid = trim($_POST["tenant_nid"] ?? "");
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


    if (empty($nid))
    {
        $message = "NID Required";
        $valid = false;
    }


    if (empty($password) || strlen($password) < 5)
    {
        $message = "Password must be 5 char";
        $valid = false;
    }


    if ($valid)
    {
        $database = new db();
        $connection = $database->connection();

        $result = $database->CheckTenant(
            $connection,
            "Tenant",
            $email
        );

        if ($result->num_rows > 0)
        {
            $message = "Email Already Taken";
        }
        else
        {
            $password = password_hash(
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
                $password
            );

            if ($result)
            {
                Header(
                    "Location:../View/TenantLogin.php"
                );
            }
            else
            {
                $message = "Please try again";
            }
        }
    }
}

?>