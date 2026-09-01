<?php

include "../Model/db.php";

session_start();

if(!isset($_SESSION["owner_id"]))
    {
        echo "Please Login First";
    }
    else
    {
        $database=new db();
        $connection=$database->connection();

        $result=$database->getOwner(
            $connection,
            "Owner",
            $_SESSION["owner_id"]
        );

        if($result->num_rows>0)
            {
                $row=$result->fetch_assoc();

                echo
                    $row["owner_name"]."|".
                    $row["owner_dob"]."|".
                    $row["owner_email"]."|".
                    $row["owner_phone"]."|".
                    $row["owner_address"]."|".
                    $row["owner_nid"];
            }
        else
            {
                echo "Owner Not Found";
            }
    }

?>