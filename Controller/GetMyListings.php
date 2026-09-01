<?php

include "../Model/db.php";

if (session_status() == PHP_SESSION_NONE)
{
    session_start();
}

if (!isset($_SESSION["owner_id"]))
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
    $database = new db();
    $connection = $database->connection();

    $result = $database->getOwnerListings(
        $connection,
        "Listings",
        $_SESSION["owner_id"]
    );

    if (!$result || $result->num_rows == 0)
    {
        echo "
        <tr>
            <td colspan='2'>
                No Listings Available
            </td>
        </tr>
        ";
    }
    else
    {
        while ($row = $result->fetch_assoc())
        {
            $imgPath = $row["listing_image"] ?? "";
            $imgTag = "";
            if (!empty($imgPath))
            {
                if (strpos($imgPath, "../Uploads/") === false && strpos($imgPath, "Uploads/") !== false)
                {
                    $imgPath = "../" . $imgPath;
                }
                else if (strpos($imgPath, "Uploads/") === false)
                {
                    $imgPath = "../Uploads/" . $imgPath;
                }
                $imgTag = "<div style='margin-bottom:10px;'><img src='" . htmlspecialchars($imgPath) . "' alt='Property' style='width:120px; height:80px; object-fit:cover; border-radius:8px;'></div>";
            }

            echo "
            <tr>
                <td colspan='2'>
                    " . $imgTag . "
                </td>
            </tr>

            <tr>
                <td>
                    <label>
                        Property :
                    </label>
                </td>
                <td>
                    <input
                        type='text'
                        value='" . htmlspecialchars($row["home_name"]) . "'
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
                        value='" . htmlspecialchars($row["location"]) . "'
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
                        value='" . htmlspecialchars($row["rent"]) . " BDT'
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
                        value='" . htmlspecialchars($row["description"]) . "'
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
                        value='" . htmlspecialchars($row["status"]) . "'
                        readonly>
                </td>
            </tr>

            <tr>
                <td colspan='2'>
                    <a href='EditListing.php?id=" . urlencode($row["listing_id"]) . "'>
                        <button type='button'>
                            Edit
                        </button>
                    </a>

                    <button
                        type='button'
                        onclick='DeleteListing(" . urlencode($row["listing_id"]) . ")'>
                        Delete
                    </button>
                </td>
            </tr>
            <tr><td colspan='2'><hr style='border: 1px solid #1D5B4F; margin: 15px 0;'></td></tr>
            ";
        }
    }
}

?>