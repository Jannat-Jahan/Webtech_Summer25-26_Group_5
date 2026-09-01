<?php

include "../Model/db.php";

session_start();

if(!isset($_SESSION["owner_id"]))
    {
        echo "Please Login First";
    }
    else if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $listing_id=$_POST["listing_id"] ?? "";

        if(!$listing_id)
            {
                echo "Listing ID Required";
            }
        else
            {
                $owner_id=$_SESSION["owner_id"];

                $database=new db();
                $connection=$database->connection();

                $result=$database->deleteListing(
                    $connection,
                    "listing",
                    $listing_id,
                    $owner_id
                );

                if($result)
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