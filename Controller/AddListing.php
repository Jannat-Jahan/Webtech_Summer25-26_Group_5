<?php

include "../Model/db.php";

if (session_status() == PHP_SESSION_NONE)
{
    session_start();
}

$home_name = "";
$location = "";
$rent = "";
$description = "";
$listing_date = "";
$status = "Available";
$listing_image = "";
$message = "";
$valid = true;

if (!isset($_SESSION["owner_id"]))
{
    echo "Please Login First";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $home_name = trim($_POST["home_name"] ?? $_POST["property_name"] ?? "");
    $location = trim($_POST["location"] ?? "");
    $rent = trim($_POST["rent"] ?? "");
    $description = trim($_POST["description"] ?? "");
    $status = trim($_POST["status"] ?? "Available");

    if (empty($home_name) || strlen($home_name) < 3)
    {
        $message = "Property Name must be at least 3 characters";
        $valid = false;
    }
    else if (empty($location) || strlen($location) < 3)
    {
        $message = "Location must be at least 3 characters";
        $valid = false;
    }
    else if (empty($rent) || !is_numeric($rent) || $rent <= 0)
    {
        $message = "Invalid Rent";
        $valid = false;
    }
    else if (strlen($description) < 10)
    {
        $message = "Description must be at least 10 characters";
        $valid = false;
    }

    if ($valid)
    {
        $fileKey = isset($_FILES["listing_image"]) ? "listing_image" : (isset($_FILES["property_image"]) ? "property_image" : "");

        if (!empty($fileKey) && isset($_FILES[$fileKey]) && $_FILES[$fileKey]["error"] == 0)
        {
            $allowedTypes = [
                "image/jpeg",
                "image/jpg",
                "image/png"
            ];

            if (!in_array($_FILES[$fileKey]["type"], $allowedTypes))
            {
                echo "Only JPG, JPEG and PNG images are allowed";
                exit();
            }

            if ($_FILES[$fileKey]["size"] > 5 * 1024 * 1024)
            {
                echo "Image size must be less than 5 MB";
                exit();
            }

            $uploaddirectory = "../Uploads/";

            if (!is_dir($uploaddirectory))
            {
                mkdir($uploaddirectory, 0777, true);
            }

            $filename = time() . "_" . basename($_FILES[$fileKey]["name"]);
            $listing_image = $uploaddirectory . $filename;

            if (!move_uploaded_file($_FILES[$fileKey]["tmp_name"], $listing_image))
            {
                echo "Failed to upload image";
                exit();
            }
        }

        $listing_date = date("Y-m-d");
        $owner_id = $_SESSION["owner_id"];

        $database = new db();
        $connection = $database->connection();

        $result = $database->addListing(
            $connection,
            "Listings",
            $owner_id,
            $home_name,
            $location,
            $rent,
            $description,
            $listing_date,
            $status,
            $listing_image
        );

        if ($result)
        {
            echo "Listing Added Successfully";
        }
        else
        {
            echo "Listing Failed";
        }
    }
    else
    {
        echo $message;
    }
}

?>