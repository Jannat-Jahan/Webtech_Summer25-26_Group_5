<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flat Rental Management System</title>

    <link rel="stylesheet" href="../Design/style.css">

    <style>
        /* Dropdown Component Styles */
        .topnav {
            background-color: #a9bea9;
            padding: 0 10px;
            overflow: visible;
            position: relative;
            z-index: 1000;
        }

        .topnav::after {
            content: "";
            clear: both;
            display: table;
        }

        .topnav a {
            float: left;
            display: block;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
            font-size: 18px;
            font-weight: bold;
            color: #26382d;
        }

        .topnav a:hover {
            background-color: #5f806c;
            color: white;
        }

        .dropdown {
            float: left;
            position: relative;
            display: inline-block;
        }

        .dropdown .dropbtn {
            font-size: 18px;
            font-weight: bold;
            color: #26382d;
            background-color: transparent;
            padding: 14px 20px;
            border: none;
            border-radius: 0;
            margin: 0;
            cursor: pointer;
            font-family: inherit;
            display: block;
        }

        .dropdown:hover .dropbtn {
            background-color: #5f806c;
            color: white;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background-color: #ffffff;
            min-width: 220px;
            box-shadow: 0 8px 16px rgba(40, 50, 40, 0.3);
            border: 1px solid #6f927e;
            border-radius: 0 0 10px 10px;
            z-index: 9999;
            overflow: hidden;
        }

        .dropdown-content a {
            float: none;
            color: #26382d;
            padding: 12px 18px;
            text-decoration: none;
            display: block;
            text-align: left;
            font-size: 16px;
            font-weight: bold;
            border-bottom: 1px solid #edf2e8;
        }

        .dropdown-content a:last-child {
            border-bottom: none;
        }

        .dropdown-content a:hover {
            background-color: #5f806c;
            color: white;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }
    </style>
</head>

<body>

    <div class="position">
        <div class="Header">
            <h1>Flat Rental Management System</h1>
        </div>

        <div class="topnav">
            <a href="index.php">Home</a>

            <!-- Login Dropdown -->
            <div class="dropdown">
                <button class="dropbtn" type="button">Login &#9660;</button>
                <div class="dropdown-content">
                    <a href="TenantLogin.php">Login as Tenant</a>
                    <a href="OwnerLogin.php">Login as Owner</a>
                    <a href="AdminLogin.php">Login as Admin</a>
                </div>
            </div>

            <!-- Register Dropdown -->
            <div class="dropdown">
                <button class="dropbtn" type="button">Register &#9660;</button>
                <div class="dropdown-content">
                    <a href="TenantRegistration.php">Register as Tenant</a>
                    <a href="OwnerRegistration.php">Register as Owner</a>
                    <a href="AdminRegistration.php">Register as Admin</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <h1>Welcome to Flat Rental Management System</h1>

        <p>
            Find your suitable room or flat, manage rental listings, and handle your bookings easily through our system.
        </p>

        <fieldset>
            <legend>Portal Overview</legend>
            <p>
                Hover over the <strong>Login</strong> or <strong>Register</strong> dropdown menus in the navigation bar above to choose your role (Tenant, Owner, or Admin).
            </p>
        </fieldset>

        <h2>Our Portal Roles</h2>

        <table>
            <tr>
                <td>
                    <h3>Tenants</h3>
                    <p>
                        Browse available properties, filter by rent range, book rooms/flats, and manage your bookings.
                    </p>
                </td>
                <td>
                    <h3>Flat Owners</h3>
                    <p>
                        Post new rental listings, manage property details, upload photos, and monitor tenant requests.
                    </p>
                </td>
                <td>
                    <h3>System Admin</h3>
                    <p>
                        Monitor listings, manage owner and tenant records, and ensure smooth system operations.
                    </p>
                </td>
            </tr>
        </table>
    </div>

    <div class="footer">
        <h2>Home Rental Management System &copy; 2026</h2>
    </div>

</body>
</html>