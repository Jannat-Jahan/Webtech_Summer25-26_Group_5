<?php

include "../Model/db.php";

session_start();

$home_name="";
$location="";
$rent="";
$description="";
$listing_date="";
$status="Available";
$property_image="";
$message="";
$valid=true;

if(!isset($_SESSION["owner_id"]))
    {
        echo "Please Login First";
    }
    else if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $home_name=trim($_POST["home_name"]?? "");
        $location=trim($_POST["location"]?? "");
        $rent=trim($_POST["rent"]?? "");
        $description=trim($_POST["description"]?? "");

        if(!$home_name || strlen($home_name)<3)
            {
                $message="Property Name must be at least 3 characters";
                $valid=false;
            }
        else if(!$location || strlen($location)<3)
            {
                $message="Location must be at least 3 characters";
                $valid=false;
            }
        else if(!$rent || !is_numeric($rent) || $rent<=0)
            {
                $message="Invalid Rent";
                $valid=false;
            }
        else if(strlen($description)<10)
            {
                $message="Description must be at least 10 characters";
                $valid=false;
            }


        if($valid)
            {
                if(isset($_FILES["property_image"]) &&
                   $_FILES["property_image"]["error"]==0)
                    {
                        $allowedTypes=[
                            "image/jpeg",
                            "image/jpg",
                            "image/png"
                        ];

                        if(!in_array(
                            $_FILES["property_image"]["type"],
                            $allowedTypes
                        ))
                            {
                                echo "Only JPG, JPEG and PNG images are allowed";
                                exit();
                            }

                        if($_FILES["property_image"]["size"]>5*1024*1024)
                            {
                                echo "Image size must be less than 5 MB";
                                exit();
                            }

                        $uploaddirectory="../Uploads/";

                        if(!is_dir($uploaddirectory))
                            {
                                mkdir(
                                    $uploaddirectory,
                                    0777,
                                    true
                                );
                            }

                        $filename=
                            time()."_".
                            basename(
                                $_FILES["property_image"]["name"]
                            );

                        $property_image=
                            $uploaddirectory.$filename;

                        move_uploaded_file(
                            $_FILES["property_image"]["tmp_name"],
                            $property_image
                        );
                    }


                $listing_date=date("Y-m-d");

                $owner_id=$_SESSION["owner_id"];


                $database=new db();

                $connection=$database->connection();


                $result=$database->addListing(
                    $connection,
                    "listing",
                    $owner_id,
                    $home_name,
                    $location,
                    $rent,
                    $description,
                    $listing_date,
                    $status,
                    $property_image
                );


                if($result)
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