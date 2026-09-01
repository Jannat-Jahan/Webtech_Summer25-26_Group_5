<?php

include "../Model/db.php";

if (session_status() == PHP_SESSION_NONE)
{
    session_start();
}

if (!isset($_SESSION["tenant_id"]))
{
    echo "<p>Please Login First</p>";
    exit();
}

$database = new db();
$connection = $database->connection();

$location = trim($_GET["location"] ?? $_POST["location"] ?? "");
$minRent = trim($_GET["minRent"] ?? $_POST["minRent"] ?? 0);
$maxRent = trim($_GET["maxRent"] ?? $_POST["maxRent"] ?? 0);

if (!empty($location) || (!empty($minRent) && $minRent > 0) || (!empty($maxRent) && $maxRent > 0))
{
    $result = $database->searchListings($connection, "Listings", $location, $minRent, $maxRent);
}
else
{
    $result = $database->getAvailableListings($connection, "Listings");
}

if (!$result || $result->num_rows == 0)
{
    echo "<p>No properties available matching your criteria.</p>";
}
else
{
    echo "<table>";
    echo "<tr>
            <th>Image</th>
            <th>Property</th>
            <th>Location</th>
            <th>Rent (BDT)</th>
            <th>Description</th>
            <th>Action</th>
          </tr>";

    while ($row = $result->fetch_assoc())
    {
        $imagePath = $row["listing_image"] ?? $row["property_image"] ?? "";
        if (!empty($imagePath))
        {
            if (strpos($imagePath, "../Uploads/") === false && strpos($imagePath, "Uploads/") !== false)
            {
                $imagePath = "../" . $imagePath;
            }
            else if (strpos($imagePath, "Uploads/") === false)
            {
                $imagePath = "../Uploads/" . $imagePath;
            }
            $imgTag = "<img src='" . htmlspecialchars($imagePath) . "' alt='Property' style='width:90px; height:65px; object-fit:cover; border-radius:6px;'>";
        }
        else
        {
            $imgTag = "<span style='color:#888;'>No Image</span>";
        }

        echo "<tr>";
        echo "<td>" . $imgTag . "</td>";
        echo "<td>" . htmlspecialchars($row["home_name"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["location"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["rent"]) . " BDT</td>";
        echo "<td>" . htmlspecialchars($row["description"]) . "</td>";
        echo "<td>
                <a href='tenant_book_form.php?listing_id=" . urlencode($row["listing_id"]) . "'>
                    <input type='button' value='Book Now'>
                </a>
              </td>";
        echo "</tr>";
    }

    echo "</table>";
}

?>
