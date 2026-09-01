<?php

include "../Model/db.php";

session_start();

if(!isset($_SESSION["owner_id"]))
    {
        echo "
        <tr>
            <td>
                Please Login First
            </td>
        </tr>
        ";
    }
    else
    {
        $database=new db();

        $connection=$database->connection();

        $result=$database->getOwnerListings(
            $connection,
            "listing",
            $_SESSION["owner_id"]
        );


        if($result->num_rows==0)
            {
                echo "
                <tr>
                    <td>
                        No Listings Available
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
                                    Property :
                                </label>
                            </td>

                            <td>
                                <input
                                    type='text'
                                    value='".$row["home_name"]."'
                                    readonly>
                            </td>

                        </tr>


                        <tr>

                            <td>
                                <label>
                                    Location :
                                </label>
                            </td>

                            <td>
                                <input
                                    type='text'
                                    value='".$row["location"]."'
                                    readonly>
                            </td>

                        </tr>


                        <tr>

                            <td>
                                <label>
                                    Rent :
                                </label>
                            </td>

                            <td>
                                <input
                                    type='text'
                                    value='".$row["rent"]." BDT'
                                    readonly>
                            </td>

                        </tr>


                        <tr>

                            <td>
                                <label>
                                    Description :
                                </label>
                            </td>

                            <td>
                                <input
                                    type='text'
                                    value='".$row["description"]."'
                                    readonly>
                            </td>

                        </tr>


                        <tr>

                            <td>
                                <label>
                                    Status :
                                </label>
                            </td>

                            <td>
                                <input
                                    type='text'
                                    value='".$row["status"]."'
                                    readonly>
                            </td>

                        </tr>


                        <tr>

                            <td colspan='2'>

                                <a href='EditListing.php?id=".$row["listing_id"]."'>
                                    <button type='button'>
                                        Edit
                                    </button>
                                </a>

                                <button
                                    type='button'
                                    onclick='DeleteListing(".$row["listing_id"].")'>

                                    Delete

                                </button>

                            </td>

                        </tr>
                        ";
                    }
            }
    }

?>