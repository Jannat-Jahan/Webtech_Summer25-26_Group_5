<?php

include "../Model/db.php";

session_start();

if(!isset($_SESSION["owner_id"]))
    {
        echo "
        <tr>
            <td colspan='8'>
                Please Login First
            </td>
        </tr>
        ";
    }
    else
    {
        $database=new db();

        $connection=$database->connection();

        $result=$database->getRecentListings(
            $connection,
            "listing",
            $_SESSION["owner_id"]
        );


        if($result->num_rows==0)
            {
                echo "
                <tr>
                    <td colspan='8'>
                        No recent listings available.
                    </td>
                </tr>
                ";
            }
        else
            {
                while($row=$result->fetch_assoc())
                    {
                        echo "
                        <tr>

                            <td>
                                <label>
                                    Property:
                                </label>
                            </td>

                            <td>
                                <input
                                    type='text'
                                    value='".$row["home_name"]."'
                                    readonly>
                            </td>

                            <td>
                                <label>
                                    Location:
                                </label>
                            </td>

                            <td>
                                <input
                                    type='text'
                                    value='".$row["location"]."'
                                    readonly>
                            </td>

                            <td>
                                <label>
                                    Rent:
                                </label>
                            </td>

                            <td>
                                <input
                                    type='text'
                                    value='".$row["rent"]." BDT'
                                    readonly>
                            </td>

                            <td>
                                <label>
                                    Status:
                                </label>
                            </td>

                            <td>
                                <input
                                    type='text'
                                    value='".$row["status"]."'
                                    readonly>
                            </td>

                        </tr>
                        ";
                    }
            }
    }

?>