<?php
include __DIR__ . "/../Model/db.php";

$database = new db();
$connection = $database->connection();

$location = trim($_GET["location"] ?? "");
$minRent  = trim($_GET["minRent"] ?? "");
$maxRent  = trim($_GET["maxRent"] ?? "");

$result = $database->searchListings($connection, "listing_info", $location, $minRent, $maxRent);
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>Browse Listings</title>
    <link rel="stylesheet" href="../Design/tenant_dashboard_style.css">
</head>

<body>
    <div class="position">

        <div class="Header">
            <h1>Available Listings</h1>
        </div>

        <div class="topnav">
            <a href="tenant_dashboard.html">Dashboard</a>
            <a href="tenant_browse.php">Browse Listings</a>
            <a href="tenant_bookings.html">My Bookings</a>
            <a href="index.html">Logout</a>
        </div>

    </div>

    <div class="container">

        <h1>Find Your Home</h1>

        <fieldset>
            <legend>Search / Filter Listings</legend>
            <form method="GET" action="tenant_browse.php">
                <table>
                    <tr>
                        <td>
                            <label for="location">Location:</label>
                        </td>

                        <td>
                            <input type="text" id="location" name="location" placeholder="Enter location" value="<?php echo htmlspecialchars($location); ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="minRent">Minimum Rent:</label>
                        </td>

                        <td>
                            <input type="number" id="minRent" name="minRent" placeholder="Minimum rent" value="<?php echo htmlspecialchars($minRent); ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="maxRent">Maximum Rent:</label>
                        </td>

                        <td>
                            <input type="number" id="maxRent" name="maxRent" placeholder="Maximum rent" value="<?php echo htmlspecialchars($maxRent); ?>">
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" value="Search">
                            <a href="tenant_browse.php"><input type="button" value="Clear"></a>
                        </td>
                    </tr>

                </table>

            </form>

        </fieldset>
        <br>
        <fieldset>

            <legend>Available Properties</legend>

            <?php if ($result && $result->num_rows > 0): ?>
                <table>
                    <thead>
                        <tr>
                            <th>Home Name</th>
                            <th>Location</th>
                            <th>Rent / Month</th>
                            <th>Listing Date</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($listing = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($listing["home_name"]); ?></td>
                                <td><?php echo htmlspecialchars($listing["location"]); ?></td>
                                <td>৳ <?php echo number_format($listing["rent"]); ?></td>
                                <td><?php echo htmlspecialchars($listing["listing_date"]); ?></td>
                                <td><?php echo htmlspecialchars($listing["description"]); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>
                    No properties are currently available.
                </p>

                <p>
                    Please check again later or try different
                    search criteria.
                </p>
            <?php endif; ?>

        </fieldset>

    </div>


</body>

</html>
