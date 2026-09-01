<?php

include "../Model/db.php";

if (session_status() == PHP_SESSION_NONE)
{
    session_start();
}

$email = "";
$password = "";
$message = "";
$remember = false;

if (isset($_COOKIE["remember_tenant"]))
{
    $email = $_COOKIE["remember_tenant"];
    $remember = true;
}

$valid = true;

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $email = trim($_POST["tenant_email"] ?? $_POST["email"] ?? "");
    $password = trim($_POST["password"] ?? "");
    $remember = isset($_POST["rememberuser"]) && $_POST["rememberuser"] === "1";

    if (empty($email))
    {
        $message = "Email or Username is Required";
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

        $result = $database->LoginTenant(
            $connection,
            "Tenant",
            $email
        );

        if ($result && $result->num_rows > 0)
        {
            $row = $result->fetch_assoc();
            $dbPassword = $row["tenant_password"] ?? "";

            if (password_verify($password, $dbPassword) || $password === $dbPassword)
            {
                $_SESSION["logged_In"] = true;
                $_SESSION["tenant_id"] = $row["tenant_id"];
                $_SESSION["tenant_name"] = $row["tenant_name"];
                $_SESSION["tenant_username"] = $row["tenant_username"];
                $_SESSION["tenant_email"] = $row["tenant_email"];

                $message = "Log In Successful!";

                if ($remember)
                {
                    setcookie(
                        "remember_tenant",
                        $email,
                        time() + (86400 * 30),
                        "/"
                    );
                }
                else
                {
                    setcookie(
                        "remember_tenant",
                        "",
                        time() - 3600,
                        "/"
                    );
                }

                header("Location: ../View/tenant_dashboard.php");
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
