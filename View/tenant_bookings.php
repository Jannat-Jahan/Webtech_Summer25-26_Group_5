<?php

include "../Model/db.php";

if (session_status() == PHP_SESSION_NONE)
{
    session_start();
}

if (!isset($_SESSION["tenant_id"]))
{
    header("Location: TenantLogin.php");
    exit();
}

$database = new db();
$connection = $database->connection();

$tenant_id = $_SESSION["tenant_id"];
$result = $database->getTenantBookings($connection, "Books", "Listings", $tenant_id);

?>

<!DOCTYPE html>
<html lang="en-US">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>My Bookings</title>

    <link rel="stylesheet" href="../Design/tenant_dashboard_style.php">

</head>

<body>

    <div class="position">

        <div class="Header">

            <h1>Flat Rental Management System</h1>

        </div>

        <div class="topnav">

            <a href="tenant_dashboard.php">Dashboard</a>
            <a href="tenant_browse.php">Browse Listings</a>
            <a href="tenant_bookings.php">My Bookings</a>
            <a href="TenantProfile.php">My Profile</a>
            <a href="../Controller/Logout.php">Logout</a>

        </div>

    </div>


    <div class="container">

        <h1>My Bookings</h1>

        <fieldset>

            <legend>Your Booked Properties</legend>

            <?php if (!$result || $result->num_rows == 0) { ?>

                <p>You have not made any bookings yet.</p>
                <a href="tenant_browse.php">
                    <input type="button" value="Browse Available Listings">
                </a>

            <?php } else { ?>

                <table>

                    <tr>
                        <th>Booking ID</th>
                        <th>Image</th>
                        <th>Property</th>
                        <th>Location</th>
                        <th>Rent (BDT)</th>
                        <th>Booking Date</th>
                        <th>Move In Date</th>
                        <th>Payment Number</th>
                        <th>Transaction ID</th>
                    </tr>

                    <?php while ($row = $result->fetch_assoc()) {
                        $imgPath = $row["listing_image"] ?? "";
                        if (!empty($imgPath)) {
                            if (strpos($imgPath, "../Uploads/") === false && strpos($imgPath, "Uploads/") !== false) {
                                $imgPath = "../" . $imgPath;
                            } else if (strpos($imgPath, "Uploads/") === false) {
                                $imgPath = "../Uploads/" . $imgPath;
                            }
                        }
                    ?>

                        <tr>
                            <td>#<?php echo htmlspecialchars($row["booking_id"]); ?></td>
                            <td>
                                <?php if (!empty($imgPath)) { ?>
                                    <img src="<?php echo htmlspecialchars($imgPath); ?>" alt="Property" style="width: 80px; height: 60px; object-fit: cover; border-radius: 6px;">
                                <?php } else { ?>
                                    <span style="color:#888;">No Image</span>
                                <?php } ?>
                            </td>
                            <td><?php echo htmlspecialchars($row["home_name"] ?? "Listing #" . $row["listing_id"]); ?></td>
                            <td><?php echo htmlspecialchars($row["location"] ?? "N/A"); ?></td>
                            <td><?php echo htmlspecialchars($row["rent"] ?? "N/A"); ?> BDT</td>
                            <td><?php echo htmlspecialchars($row["booking_date"]); ?></td>
                            <td><?php echo htmlspecialchars($row["move_in_date"]); ?></td>
                            <td><?php echo htmlspecialchars($row["payment_number"]); ?></td>
                            <td><?php echo htmlspecialchars($row["transaction_id"]); ?></td>
                        </tr>

                    <?php } ?>

                </table>

            <?php } ?>

        </fieldset>

    </div>


    <div class="footer">

        <h2>Home Rental Management System &copy; 2026</h2>

    </div>

</body>

</html>
