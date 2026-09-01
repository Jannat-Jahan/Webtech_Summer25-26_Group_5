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

    <title>Browse Listings</title>

    <link rel="stylesheet" href="../Design/tenant_dashboard_style.php">

    <script src="../JS/tenant.js"></script>

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

        <h1>Browse Available Listings</h1>

        <fieldset>

            <legend>Search / Filter Listings</legend>

            <form>

                <table>

                    <tr>

                        <td>
                            <label for="location">Location:</label>
                        </td>

                        <td>
                            <input
                                type="text"
                                id="location"
                                name="location"
                                placeholder="Enter location"
                            >
                        </td>

                    </tr>

                    <tr>

                        <td>
                            <label for="minRent">Minimum Rent (BDT):</label>
                        </td>

                        <td>
                            <input
                                type="number"
                                id="minRent"
                                name="minRent"
                                placeholder="Minimum rent"
                            >
                        </td>

                    </tr>

                    <tr>

                        <td>
                            <label for="maxRent">Maximum Rent (BDT):</label>
                        </td>

                        <td>
                            <input
                                type="number"
                                id="maxRent"
                                name="maxRent"
                                placeholder="Maximum rent"
                            >
                        </td>

                    </tr>

                    <tr>

                        <td></td>

                        <td>

                            <input
                                type="button"
                                value="Search"
                                onclick="SearchListings()"
                            >

                            <input
                                type="button"
                                value="Show All"
                                onclick="document.getElementById('location').value=''; document.getElementById('minRent').value=''; document.getElementById('maxRent').value=''; LoadAvailableListings();"
                            >

                        </td>

                    </tr>

                </table>

            </form>

        </fieldset>

        <br>

        <fieldset>

            <legend>Available Properties</legend>

            <div id="listings_container">
                <p>Loading properties...</p>
            </div>

        </fieldset>

    </div>


    <div class="footer">

        <h2>Home Rental Management System &copy; 2026</h2>

    </div>


    <script>
        window.onload = function () {
            LoadAvailableListings();
        };
    </script>

</body>

</html>
