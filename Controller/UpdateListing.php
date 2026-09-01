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
$owner_id = $_SESSION["owner_id"];

// Handle GET request to fetch listing details for editing
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"]))
{
    $listing_id = intval($_GET["id"]);
    $result = $database->getListing($connection, "Listings", $listing_id, $owner_id);

    if ($result && $result->num_rows > 0)
    {
        $row = $result->fetch_assoc();
        header("Content-Type: application/json");
        echo json_encode($row);
        exit();
    }
    else
    {
        echo json_encode(["error" => "Listing not found"]);
        exit();
    }
}

// Handle POST request to update listing
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $listing_id = trim($_POST["listing_id"] ?? "");
    $home_name = trim($_POST["home_name"] ?? $_POST["property_name"] ?? "");
    $location = trim($_POST["location"] ?? "");
    $rent = trim($_POST["rent"] ?? "");
    $description = trim($_POST["description"] ?? "");
    $status = trim($_POST["status"] ?? "");

    $message = "";
    $valid = true;

    if (empty($listing_id))
    {
        $message = "Listing ID Required";
        $valid = false;
    }
    else if (empty($home_name))
    {
        $message = "Home Name Required";
        $valid = false;
    }
    else if (empty($location))
    {
        $message = "Location Required";
        $valid = false;
    }
    else if (empty($rent) || !is_numeric($rent) || $rent <= 0)
    {
        $message = "Invalid Rent";
        $valid = false;
    }
    else if (empty($description))
    {
        $message = "Description Required";
        $valid = false;
    }
    else if (empty($status))
    {
        $message = "Status Required";
        $valid = false;
    }

    if ($valid)
    {
        $result = $database->updateListing(
            $connection,
            "Listings",
            $listing_id,
            $owner_id,
            $home_name,
            $location,
            $rent,
            $description,
            $status
        );

        if ($result)
        {
            echo "Listing Updated Successfully";
        }
        else
        {
            echo "Update Failed";
        }
    }
    else
    {
        echo $message;
    }
}

?>