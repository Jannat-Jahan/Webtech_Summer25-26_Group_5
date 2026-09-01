<?php

include "../Model/db.php";

session_start();

$owner_name="";
$owner_dob="";
$owner_phone="";
$owner_email="";
$owner_address="";
$owner_nid="";
$message="";
$valid=true;

if(!isset($_SESSION["owner_id"]))
    {
        echo "Please Login First";
    }
    else if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $owner_name=trim($_POST["owner_name"]?? "");
        $owner_dob=trim($_POST["owner_dob"]?? "");
        $owner_phone=trim($_POST["owner_phone"]?? "");
        $owner_email=trim($_POST["owner_email"]?? "");
        $owner_address=trim($_POST["owner_address"]?? "");
        $owner_nid=trim($_POST["owner_nid"]?? "");

        if(!$owner_name)
            {
                $message="Owner Name Required";
                $valid=false;
            }
        else if(!preg_match("/^[A-Za-z ]+$/",$owner_name))
            {
                $message="Invalid Owner Name";
                $valid=false;
            }
        else if(!$owner_dob)
            {
                $message="Date of Birth Required";
                $valid=false;
            }
        else if(!$owner_phone)
            {
                $message="Phone Required";
                $valid=false;
            }
        else if(!preg_match("/^01[3-9][0-9]{8}$/",$owner_phone))
            {
                $message="Invalid Phone Number";
                $valid=false;
            }
        else if(!$owner_email)
            {
                $message="Email Required";
                $valid=false;
            }
        else if(!filter_var($owner_email,FILTER_VALIDATE_EMAIL))
            {
                $message="Invalid Email";
                $valid=false;
            }
        else if(!$owner_address)
            {
                $message="Address Required";
                $valid=false;
            }
        else if(!$owner_nid)
            {
                $message="NID Required";
                $valid=false;
            }

        if($valid)
            {
                $owner_id=$_SESSION["owner_id"];

                $database=new db();
                $connection=$database->connection();

                $result=$database->updateOwner(
                    $connection,
                    "Owner",
                    $owner_id,
                    $owner_name,
                    $owner_dob,
                    $owner_phone,
                    $owner_email,
                    $owner_address,
                    $owner_nid
                );

                if($result)
                    {
                        $_SESSION["owner_name"]=$owner_name;
                        $_SESSION["owner_email"]=$owner_email;

                        echo "Profile Updated Successfully";
                    }
                else
                    {
                        echo "Profile Update Failed";
                    }
            }
        else
            {
                echo $message;
            }
    }

?>