<?php

if (session_status() == PHP_SESSION_NONE)
{
    session_start();
}

if (!isset($_SESSION["tenant_id"]))
{
    header("Location: TenantLogin.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en-US">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tenant Dashboard</title>

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

        <h1>Welcome, <?php echo htmlspecialchars($_SESSION["tenant_name"] ?? "Tenant"); ?>!</h1>

        <fieldset>

            <legend>Tenant Dashboard</legend>

            <p>
                Welcome to the Flat Rental Management System.
                You can browse available properties, filter by rent range, book your preferred flat or room, and manage your profile and bookings below.
            </p>

            <table>

                <tr>

                    <td>
                        <h2>Browse Available Listings</h2>
                        <p>
                            Search and explore properties available for rent. Filter by rent price or location.
                        </p>

                        <a href="tenant_browse.php">
                            <input type="button" value="Browse Listings">
                        </a>
                    </td>

                </tr>

                <tr>

                    <td>
                        <h2>My Bookings</h2>
                        <p>
                            View the current status of all your booked properties and payment details.
                        </p>

                        <a href="tenant_bookings.php">
                            <input type="button" value="View My Bookings">
                        </a>
                    </td>

                </tr>

                <tr>

                    <td>
                        <h2>My Profile</h2>
                        <p>
                            View and edit your personal information and contact details.
                        </p>

                        <a href="TenantProfile.php">
                            <input type="button" value="View / Edit Profile">
                        </a>
                    </td>

                </tr>

            </table>

        </fieldset>

    </div>


    <div class="footer">

        <h2>Home Rental Management System &copy; 2026</h2>

    </div>

</body>

</html>
