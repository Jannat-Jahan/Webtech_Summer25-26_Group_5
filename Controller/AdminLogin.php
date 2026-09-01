<?php

include "../Model/db.php";

if (session_status() == PHP_SESSION_NONE)
{
    session_start();
}

$username = "";
$password = "";
$message = "";
$remember = false;

if (isset($_COOKIE["remember_admin"]))
{
    $username = $_COOKIE["remember_admin"];
    $remember = true;
}

$valid = true;

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $username = trim($_POST["admin_username"] ?? $_POST["username"] ?? "");
    $password = trim($_POST["password"] ?? "");
    $remember = isset($_POST["rememberuser"]) && $_POST["rememberuser"] === "1";

    if (empty($username))
    {
        $message = "Username is Required";
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

        $result = $database->LoginAdmin(
            $connection,
            "Admin",
            $username
        );

        if ($result && $result->num_rows > 0)
        {
            $row = $result->fetch_assoc();
            $dbPassword = $row["password"] ?? "";

            if (password_verify($password, $dbPassword) || $password === $dbPassword)
            {
                $_SESSION["logged_In"] = true;
                $_SESSION["admin_id"] = $row["admin_id"];
                $_SESSION["admin_name"] = $row["admin_name"];
                $_SESSION["admin_username"] = $row["username"];

                $message = "Log In Successful!";

                if ($remember)
                {
                    setcookie(
                        "remember_admin",
                        $username,
                        time() + (86400 * 30),
                        "/"
                    );
                }
                else
                {
                    setcookie(
                        "remember_admin",
                        "",
                        time() - 3600,
                        "/"
                    );
                }

                header("Location: ../View/AdminDashboard.php");
                exit();
            }
            else
            {
                $message = "Invalid Password";
            }
        }
        else
        {
            $message = "Admin Not Found";
        }
    }
}

?>
