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

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $listing_id = trim($_POST["listing_id"] ?? "");

    if (empty($listing_id))
    {
        echo "Listing ID Required";
    }
    else
    {
        $owner_id = $_SESSION["owner_id"];

        $database = new db();
        $connection = $database->connection();

        $result = $database->deleteListing(
            $connection,
            "Listings",
            $listing_id,
            $owner_id
        );

        if ($result)
        {
            echo "Listing Deleted Successfully";
        }
        else
        {
            echo "Delete Failed";
        }
    }
}

?>