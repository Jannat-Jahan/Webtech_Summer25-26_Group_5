<?php

include "../Model/db.php";

session_start();

$listing_id="";
$home_name="";
$location="";
$rent="";
$description="";
$status="";
$message="";
$valid=true;

if(!isset($_SESSION["owner_id"]))
    {
        echo "Please Login First";
    }
    else if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $listing_id=trim($_POST["listing_id"]?? "");
        $home_name=trim($_POST["home_name"]?? "");
        $location=trim($_POST["location"]?? "");
        $rent=trim($_POST["rent"]?? "");
        $description=trim($_POST["description"]?? "");
        $status=trim($_POST["status"]?? "");

        if(!$listing_id)
            {
                $message="Listing ID Required";
                $valid=false;
            }
        else if(!$home_name)
            {
                $message="Home Name Required";
                $valid=false;
            }
        else if(!$location)
            {
                $message="Location Required";
                $valid=false;
            }
        else if(!$rent)
            {
                $message="Rent Required";
                $valid=false;
            }
        else if(!is_numeric($rent) || $rent<=0)
            {
                $message="Invalid Rent";
                $valid=false;
            }
        else if(!$description)
            {
                $message="Description Required";
                $valid=false;
            }
        else if(!$status)
            {
                $message="Status Required";
                $valid=false;
            }

        if($valid)
            {
                $owner_id=$_SESSION["owner_id"];

                $database=new db();
                $connection=$database->connection();

                $result=$database->updateListing(
                    $connection,
                    "listing",
                    $listing_id,
                    $owner_id,
                    $home_name,
                    $location,
                    $rent,
                    $description,
                    $status
                );

                if($result)
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