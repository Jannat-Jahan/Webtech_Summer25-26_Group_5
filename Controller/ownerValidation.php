<?php

include "../Model/db.php";

if (session_status() == PHP_SESSION_NONE)
{
    session_start();
}

$name = "";
$password = "";
$message = "";
$remember = false;

if (isset($_COOKIE["remember_owner"]))
{
    $name = $_COOKIE["remember_owner"];
    $remember = true;
}

$valid = true;

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $name = trim($_POST["username"] ?? $_POST["owner_email"] ?? "");
    $password = trim($_POST["password"] ?? "");
    $remember = isset($_POST["rememberuser"]) && $_POST["rememberuser"] === "1";

    if (empty($name))
    {
        $message = "Email or Username Required";
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

        $result = $database->LoginOwner(
            $connection,
            "Owner",
            $name
        );

        if ($result && $result->num_rows > 0)
        {
            $row = $result->fetch_assoc();
            $dbPassword = $row["owner_password"] ?? "";

            if (password_verify($password, $dbPassword) || $password === $dbPassword)
            {
                $_SESSION["logged_In"] = true;
                $_SESSION["owner_id"] = $row["owner_id"];
                $_SESSION["owner_name"] = $row["owner_name"];
                $_SESSION["owner_username"] = $row["owner_username"];
                $_SESSION["owner_email"] = $row["owner_email"] ?? "";

                $message = "Log In Successful!";

                if ($remember)
                {
                    setcookie(
                        "remember_owner",
                        $name,
                        time() + (86400 * 30),
                        "/"
                    );
                }
                else
                {
                    setcookie(
                        "remember_owner",
                        "",
                        time() - 3600,
                        "/"
                    );
                }

                header("Location: ../View/Owner.php");
                exit();
            }
            else
            {
                $message = "Invalid Password";
            }
        }
        else
        {
            $message = "Account Not Found";
        }
    }
}

?>