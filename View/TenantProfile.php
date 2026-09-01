<?php

include "../Controller/UpdateTenant.php";

?>

<!DOCTYPE html>
<html lang="en-US">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tenant Profile</title>

    <link rel="stylesheet" href="../Design/tenant_dashboard_style.css">

    <script>
        function validateProfile()
        {
            let name = document.getElementById("tenant_name").value.trim();
            let username = document.getElementById("tenant_username").value.trim();
            let email = document.getElementById("tenant_email").value.trim();
            let phone = document.getElementById("tenant_phone").value.trim();
            let address = document.getElementById("tenant_address").value.trim();
            let dob = document.getElementById("tenant_dob").value;

            if (name === "")
            {
                alert("Full Name is Required");
                return false;
            }

            if (username.length < 5)
            {
                alert("Username must be at least 5 characters");
                return false;
            }

            if (email === "")
            {
                alert("Email is Required");
                return false;
            }

            if (phone === "")
            {
                alert("Phone Number is Required");
                return false;
            }

            if (address === "")
            {
                alert("Address is Required");
                return false;
            }

            if (dob === "")
            {
                alert("Date of Birth is Required");
                return false;
            }

            return true;
        }
    </script>

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

        <h1>My Profile</h1>

        <fieldset>

            <legend>Tenant Profile Information</legend>

            <?php if (!empty($message)) { ?>
                <p style="color:#294638; font-weight:bold; background-color: #d7e8dd; padding: 10px; border-radius: 8px;">
                    <?php echo htmlspecialchars($message); ?>
                </p>
            <?php } ?>

            <form method="post" action="" enctype="multipart/form-data" onsubmit="return validateProfile()">

                <table>

                    <tr>

                        <td>
                            <label for="tenant_id">Tenant ID:</label>
                        </td>

                        <td>
                            <input
                                type="text"
                                id="tenant_id"
                                name="tenant_id"
                                value="<?php echo htmlspecialchars($tenant_id); ?>"
                                readonly
                            >
                        </td>

                    </tr>

                    <tr>

                        <td>
                            <label for="tenant_name">Full Name:</label>
                        </td>

                        <td>
                            <input
                                type="text"
                                id="tenant_name"
                                name="tenant_name"
                                value="<?php echo htmlspecialchars($name); ?>"
                                placeholder="Enter your name"
                            >
                        </td>

                    </tr>

                    <tr>

                        <td>
                            <label for="tenant_username">Username:</label>
                        </td>

                        <td>
                            <input
                                type="text"
                                id="tenant_username"
                                name="tenant_username"
                                value="<?php echo htmlspecialchars($username); ?>"
                                placeholder="Enter your username"
                            >
                        </td>

                    </tr>

                    <tr>

                        <td>
                            <label for="tenant_email">Email:</label>
                        </td>

                        <td>
                            <input
                                type="email"
                                id="tenant_email"
                                name="tenant_email"
                                value="<?php echo htmlspecialchars($email); ?>"
                                placeholder="Enter your email"
                            >
                        </td>

                    </tr>

                    <tr>

                        <td>
                            <label for="tenant_phone">Phone:</label>
                        </td>

                        <td>
                            <input
                                type="tel"
                                id="tenant_phone"
                                name="tenant_phone"
                                value="<?php echo htmlspecialchars($phone); ?>"
                                placeholder="Enter your phone number"
                            >
                        </td>

                    </tr>

                    <tr>

                        <td>
                            <label for="tenant_address">Address:</label>
                        </td>

                        <td>
                            <textarea
                                id="tenant_address"
                                name="tenant_address"
                                rows="3"
                                placeholder="Enter your address"
                            ><?php echo htmlspecialchars($address); ?></textarea>
                        </td>

                    </tr>

                    <tr>

                        <td>
                            <label for="tenant_dob">Date of Birth:</label>
                        </td>

                        <td>
                            <input
                                type="date"
                                id="tenant_dob"
                                name="tenant_dob"
                                value="<?php echo htmlspecialchars($dob); ?>"
                            >
                        </td>

                    </tr>

                    <tr>

                        <td>
                            <label for="tenant_nid">Update NID File (Optional):</label>
                        </td>

                        <td>
                            <input
                                type="file"
                                id="tenant_nid"
                                name="tenant_nid"
                                accept=".jpg,.jpeg,.png,.pdf"
                            >
                            <?php if (!empty($nid)) { ?>
                                <br>
                                <small style="color: #555;">Current file: <?php echo htmlspecialchars(basename($nid)); ?></small>
                            <?php } ?>
                        </td>

                    </tr>

                    <tr>

                        <td></td>

                        <td>

                            <input
                                type="submit"
                                name="update"
                                value="Save Changes"
                            >

                            <a href="tenant_dashboard.php">
                                <input type="button" value="Back to Dashboard">
                            </a>

                        </td>

                    </tr>

                </table>

            </form>

        </fieldset>

    </div>


    <div class="footer">

        <h2>Home Rental Management System &copy; 2026</h2>

    </div>

</body>

</html>