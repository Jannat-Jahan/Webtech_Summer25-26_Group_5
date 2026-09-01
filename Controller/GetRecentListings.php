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
        <td colspan='2'>
            Please Login First
        </td>
    </tr>
    ";
}
else
{
    $database = new db();
    $connection = $database->connection();

    $result = $database->getRecentListings(
        $connection,
        "Listings",
        $_SESSION["owner_id"]
    );

    if (!$result || $result->num_rows == 0)
    {
        echo "
        <tr>
            <td colspan='2'>
                No recent listings available.
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
                $imgTag = "<img src='" . htmlspecialchars($imgPath) . "' alt='Property' style='width:90px; height:60px; object-fit:cover; border-radius:6px; margin-right:10px;'>";
            }

            echo "
            <tr>
                <td style='width: 100px;'>
                    " . $imgTag . "
                </td>
                <td>
                    <strong>" . htmlspecialchars($row["home_name"]) . "</strong> - " . htmlspecialchars($row["location"]) . "
                    <br>
                    Rent: <strong>" . htmlspecialchars($row["rent"]) . " BDT</strong> | Status: <strong>" . htmlspecialchars($row["status"]) . "</strong>
                </td>
            </tr>
            ";
        }
    }
}

?>