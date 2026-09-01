<?php

include "../Model/db.php";

$name="";
$dob="";
$phone="";
$email="";
$address="";
$nid="";
$password="";
$message="";
$valid=true;

if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $name=trim($_POST["owner_name"]?? "");
        $dob=trim($_POST["owner_dob"]?? "");
        $phone=trim($_POST["owner_phone"]?? "");
        $email=trim($_POST["owner_email"]?? "");
        $address=trim($_POST["owner_address"]?? "");
        $nid=trim($_POST["owner_nid"]?? "");
        $password=trim($_POST["password"]?? "");


        if(empty($name))
            {
                $message="Owner Name Required";
                $valid=false;
            }
        else if(!preg_match("/^[A-Za-z ]+$/",$name))
            {
                $message="Invalid Owner Name";
                $valid=false;
            }


        if(empty($dob))
            {
                $message="Date of Birth Required";
                $valid=false;
            }


        if(empty($phone))
            {
                $message="Phone Number Required";
                $valid=false;
            }
        else if(!preg_match("/^01[3-9][0-9]{8}$/",$phone))
            {
                $message="Invalid Phone Number";
                $valid=false;
            }


        if(empty($email))
            {
                $message="Email Required";
                $valid=false;
            }
        else if(!filter_var($email,FILTER_VALIDATE_EMAIL))
            {
                $message="Invalid Email";
                $valid=false;
            }


        if(empty($address))
            {
                $message="Address Required";
                $valid=false;
            }


        if(empty($nid))
            {
                $message="NID Required";
                $valid=false;
            }


        if(empty($password) || strlen($password)<5)
            {
                $message="Password must be 5 char";
                $valid=false;
            }


        if($valid)
            {
                $database=new db();
                $connection=$database->connection();

                $result=$database->CheckOwner(
                    $connection,
                    "Owner",
                    $email
                );

                if($result->num_rows>0)
                    {
                        $message="Email Already Taken";
                    }
                else
                    {
                        $password=password_hash(
                            $password,
                            PASSWORD_DEFAULT
                        );

                        $result=$database->signup(
                            $connection,
                            "Owner",
                            $name,
                            $dob,
                            $phone,
                            $email,
                            $address,
                            $nid,
                            $password
                        );

                        if($result)
                            {
                                Header(
                                    "Location:../View/loginpage.php"
                                );
                            }
                        else
                            {
                                echo "Please try again";
                            }
                    }
            }
        else
            {
                echo $message;
            }
    }

?>