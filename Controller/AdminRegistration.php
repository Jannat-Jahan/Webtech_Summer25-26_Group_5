<?php

include "../Model/db.php";

$name = "";
$username = "";
$password = "";
$message = "";
$valid = true;

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $name = trim($_POST["admin_name"] ?? $_POST["name"] ?? "");
    $username = trim($_POST["admin_username"] ?? $_POST["username"] ?? "");
    $password = trim($_POST["password"] ?? "");

    if (empty($name))
    {
        $message = "Admin Name is Required";
        $valid = false;
    }
    else if (!preg_match("/^[A-Za-z ]+$/", $name))
    {
        $message = "Invalid Admin Name";
        $valid = false;
    }

    if (empty($username))
    {
        $message = "Username is Required";
        $valid = false;
    }
    else if (strlen($username) < 5)
    {
        $message = "Username must be at least 5 characters";
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

        $userCheck = $database->CheckAdmin(
            $connection,
            "Admin",
            $username
        );

        if ($userCheck && $userCheck->num_rows > 0)
        {
            $message = "Username Already Taken";
        }
        else
        {
            $hashed_password = password_hash(
                $password,
                PASSWORD_DEFAULT
            );

            $result = $database->signupAdmin(
                $connection,
                "Admin",
                $name,
                $username,
                $hashed_password
            );

            if ($result)
            {
                // Save registered admin data to user.json as backup/log
                $json_file = "../Model/user.json";
                $existing_data = [];

                if (file_exists($json_file))
                {
                    $json_content = file_get_contents($json_file);
                    if (!empty($json_content))
                    {
                        $decoded = json_decode($json_content, true);
                        if (is_array($decoded))
                        {
                            $existing_data = $decoded;
                        }
                    }
                }

                $existing_data[] = [
                    "role" => "Admin",
                    "admin_name" => $name,
                    "username" => $username,
                    "registered_at" => date("Y-m-d H:i:s")
                ];

                file_put_contents(
                    $json_file,
                    json_encode($existing_data, JSON_PRETTY_PRINT)
                );

                header("Location: ../View/AdminLogin.php");
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
