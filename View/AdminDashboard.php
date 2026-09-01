<?php

include "../Model/db.php";

if (session_status() == PHP_SESSION_NONE)
{
    session_start();
}

if (!isset($_SESSION["admin_id"]))
{
    header("Location: AdminLogin.php");
    exit();
}

$database = new db();
$connection = $database->connection();

$listings = $database->getAllListings($connection);
$owners = $database->getAllOwners($connection);
$tenants = $database->getAllTenants($connection);
$bookings = $database->getAllBookings($connection);

?>

<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <link rel="stylesheet" href="../Design/style.php">
</head>

<body>

<div class="position">
    <div class="Header">
        <h1>Flat Rental Management System</h1>
    </div>

    <div class="topnav">
        <a href="AdminDashboard.php" class="active">Admin Dashboard</a>
        <a href="../Controller/Logout.php">Logout (<?php echo htmlspecialchars($_SESSION["admin_name"] ?? "Admin"); ?>)</a>
    </div>
</div>

<div class="container">
    <h1>System Admin Dashboard</h1>

    <fieldset>
        <legend>System Overview</legend>
        <p>
            Welcome, <strong><?php echo htmlspecialchars($_SESSION["admin_name"] ?? "Admin"); ?></strong> (<em>@<?php echo htmlspecialchars($_SESSION["admin_username"] ?? "admin"); ?></em>).
            Here is the central management portal for all rental listings, owners, tenants, and booking transactions.
        </p>
    </fieldset>

    <br>

    <!-- SECTION 1: ALL LISTINGS -->
    <fieldset>
        <legend>All Property Listings (<?php echo ($listings ? $listings->num_rows : 0); ?> Total)</legend>

        <?php if (!$listings || $listings->num_rows == 0) { ?>
            <p>No listings found in the system.</p>
        <?php } else { ?>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Property Name</th>
                    <th>Location</th>
                    <th>Rent</th>
                    <th>Status</th>
                    <th>Owner Name</th>
                    <th>Owner Email</th>
                </tr>
                <?php while ($l = $listings->fetch_assoc()) {
                    $img = $l["listing_image"] ?? "";
                    if (!empty($img)) {
                        if (strpos($img, "../Uploads/") === false && strpos($img, "Uploads/") !== false) {
                            $img = "../" . $img;
                        } else if (strpos($img, "Uploads/") === false) {
                            $img = "../Uploads/" . $img;
                        }
                    }
                ?>
                <tr>
                    <td>#<?php echo htmlspecialchars($l["listing_id"]); ?></td>
                    <td>
                        <?php if (!empty($img)) { ?>
                            <img src="<?php echo htmlspecialchars($img); ?>" alt="Property" style="width:60px; height:45px; object-fit:cover; border-radius:4px;">
                        <?php } else { ?>
                            <span style="color:#888;">No Image</span>
                        <?php } ?>
                    </td>
                    <td><?php echo htmlspecialchars($l["home_name"]); ?></td>
                    <td><?php echo htmlspecialchars($l["location"]); ?></td>
                    <td><?php echo htmlspecialchars($l["rent"]); ?> BDT</td>
                    <td><strong><?php echo htmlspecialchars($l["status"]); ?></strong></td>
                    <td><?php echo htmlspecialchars($l["owner_name"] ?? "N/A"); ?></td>
                    <td><?php echo htmlspecialchars($l["owner_email"] ?? "N/A"); ?></td>
                </tr>
                <?php } ?>
            </table>
        <?php } ?>
    </fieldset>

    <br>

    <!-- SECTION 2: ALL BOOKINGS -->
    <fieldset>
        <legend>All Booking Requests & Transactions (<?php echo ($bookings ? $bookings->num_rows : 0); ?> Total)</legend>

        <?php if (!$bookings || $bookings->num_rows == 0) { ?>
            <p>No booking records found.</p>
        <?php } else { ?>
            <table>
                <tr>
                    <th>Booking ID</th>
                    <th>Tenant</th>
                    <th>Tenant Phone</th>
                    <th>Property</th>
                    <th>Rent</th>
                    <th>Booking Date</th>
                    <th>Move In Date</th>
                    <th>Payment Phone</th>
                    <th>Transaction ID</th>
                </tr>
                <?php while ($b = $bookings->fetch_assoc()) { ?>
                <tr>
                    <td>#<?php echo htmlspecialchars($b["booking_id"]); ?></td>
                    <td><?php echo htmlspecialchars($b["tenant_name"] ?? "Tenant #" . $b["tenant_id"]); ?></td>
                    <td><?php echo htmlspecialchars($b["tenant_phone"] ?? "N/A"); ?></td>
                    <td><?php echo htmlspecialchars($b["home_name"] ?? "Listing #" . $b["listing_id"]); ?></td>
                    <td><?php echo htmlspecialchars($b["rent"] ?? "N/A"); ?> BDT</td>
                    <td><?php echo htmlspecialchars($b["booking_date"]); ?></td>
                    <td><?php echo htmlspecialchars($b["move_in_date"]); ?></td>
                    <td><?php echo htmlspecialchars($b["payment_number"]); ?></td>
                    <td><?php echo htmlspecialchars($b["transaction_id"]); ?></td>
                </tr>
                <?php } ?>
            </table>
        <?php } ?>
    </fieldset>

    <br>

    <!-- SECTION 3: ALL OWNERS -->
    <fieldset>
        <legend>Registered Property Owners (<?php echo ($owners ? $owners->num_rows : 0); ?> Total)</legend>

        <?php if (!$owners || $owners->num_rows == 0) { ?>
            <p>No registered owners found.</p>
        <?php } else { ?>
            <table>
                <tr>
                    <th>Owner ID</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Date of Birth</th>
                    <th>NID</th>
                </tr>
                <?php while ($o = $owners->fetch_assoc()) { ?>
                <tr>
                    <td>#<?php echo htmlspecialchars($o["owner_id"]); ?></td>
                    <td><?php echo htmlspecialchars($o["owner_name"]); ?></td>
                    <td><?php echo htmlspecialchars($o["owner_username"]); ?></td>
                    <td><?php echo htmlspecialchars($o["owner_email"]); ?></td>
                    <td><?php echo htmlspecialchars($o["owner_phone"]); ?></td>
                    <td><?php echo htmlspecialchars($o["owner_address"]); ?></td>
                    <td><?php echo htmlspecialchars($o["owner_dob"]); ?></td>
                    <td>
                        <?php
                        $nidVal = $o["owner_nid"];
                        if (strpos($nidVal, "Uploads/") !== false) {
                            $nidPath = (strpos($nidVal, "../") === 0) ? $nidVal : "../" . $nidVal;
                            echo "<a href='" . htmlspecialchars($nidPath) . "' target='_blank'>View Document</a>";
                        } else {
                            echo htmlspecialchars($nidVal);
                        }
                        ?>
                    </td>
                </tr>
                <?php } ?>
            </table>
        <?php } ?>
    </fieldset>

    <br>

    <!-- SECTION 4: ALL TENANTS -->
    <fieldset>
        <legend>Registered Tenants (<?php echo ($tenants ? $tenants->num_rows : 0); ?> Total)</legend>

        <?php if (!$tenants || $tenants->num_rows == 0) { ?>
            <p>No registered tenants found.</p>
        <?php } else { ?>
            <table>
                <tr>
                    <th>Tenant ID</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Date of Birth</th>
                    <th>NID Document</th>
                </tr>
                <?php while ($t = $tenants->fetch_assoc()) { ?>
                <tr>
                    <td>#<?php echo htmlspecialchars($t["tenant_id"]); ?></td>
                    <td><?php echo htmlspecialchars($t["tenant_name"]); ?></td>
                    <td><?php echo htmlspecialchars($t["tenant_username"]); ?></td>
                    <td><?php echo htmlspecialchars($t["tenant_email"]); ?></td>
                    <td><?php echo htmlspecialchars($t["tenant_phone"]); ?></td>
                    <td><?php echo htmlspecialchars($t["tenant_address"]); ?></td>
                    <td><?php echo htmlspecialchars($t["tenant_dob"]); ?></td>
                    <td>
                        <?php
                        $tNid = $t["tenant_nid"];
                        if (strpos($tNid, "Uploads/") !== false) {
                            $tNidPath = (strpos($tNid, "../") === 0) ? $tNid : "../" . $tNid;
                            echo "<a href='" . htmlspecialchars($tNidPath) . "' target='_blank'>View Document</a>";
                        } else {
                            echo htmlspecialchars($tNid);
                        }
                        ?>
                    </td>
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
