<?php

include "../Model/db.php";

if (session_status() == PHP_SESSION_NONE)
{
    session_start();
}

if (!isset($_SESSION["owner_id"]))
{
    echo "Please Login First";
    exit();
}

$database = new db();
$connection = $database->connection();

$result = $database->getOwner(
    $connection,
    "Owner",
    $_SESSION["owner_id"]
);

if ($result && $result->num_rows > 0)
{
    $row = $result->fetch_assoc();

    if (isset($_GET["format"]) && $_GET["format"] === "json")
    {
        header("Content-Type: application/json");
        echo json_encode($row);
    }
    else
    {
        echo
            $row["owner_name"] . "|" .
            $row["owner_dob"] . "|" .
            $row["owner_email"] . "|" .
            $row["owner_phone"] . "|" .
            $row["owner_address"] . "|" .
            $row["owner_nid"] . "|" .
            $row["owner_username"];
    }
}
else
{
    echo "Owner Not Found";
}

?>