<?php

include "../Model/db.php";

session_start();

$name="";
$password="";
$message="";
$remember=false;

if(isset($_COOKIE["remember_owner"]))
    {
        $name=$_COOKIE["remember_owner"];
        $remember=true;
    }

$valid=true;

if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $name=trim($_POST["username"]?? "");
        $password=trim($_POST["password"]?? "");

        $remember=isset($_POST["rememberuser"]) && $_POST["rememberuser"]==="1";


        if(empty($name))
            {
                $message="Email Required";
                $valid=false;
            }
        else if(!filter_var($name,FILTER_VALIDATE_EMAIL))
            {
                $message="Invalid Email";
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

                $result=$database->LoginOwner(
                    $connection,
                    "Owner",
                    $name
                );

                if($result->num_rows>0)
                    {
                        $row=$result->fetch_assoc();

                        if(password_verify($password,$row["password"]))
                            {
                                $_SESSION["logged_In"]=true;
                                $_SESSION["owner_id"]=$row["owner_id"];
                                $_SESSION["owner_name"]=$row["owner_name"];
                                $_SESSION["owner_email"]=$row["owner_email"];

                                $message="Log In Successful! Session Created";


                                if($remember)
                                    {
                                        setcookie(
                                            "remember_owner",
                                            $name,
                                            time()+86400*30,
                                            "/"
                                        );
                                    }
                                else
                                    {
                                        setcookie(
                                            "remember_owner",
                                            "",
                                            time()-3600,
                                            "/"
                                        );
                                    }


                                Header(
                                    "Location:../View/Owner.php"
                                );
                            }
                        else
                            {
                                $message="Invalid Password";
                            }
                    }
                else
                    {
                        $message="Email Not Found";
                    }
            }
    }

?>