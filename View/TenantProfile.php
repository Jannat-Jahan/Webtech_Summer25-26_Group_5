<?php
// You can connect your validation/controller here later
?>

<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>Edit Profile</title>
    <link rel="stylesheet" href="../Design/tenant_dashboard_style.css">
</head>

<body>

    <div class="position">

        <div class="Header">
            <h1>Edit Profile</h1>
        </div>

        <div class="topnav">
            <a href="tenant_dashboard.html">Dashboard</a>
            <a href="tenant_browse.html">Browse Listings</a>
            <a href="tenant_bookings.php">My Bookings</a>
            <a href="MyProfile.php">My Profile</a>
            <a href="index.html">Logout</a>
        </div>

    </div>

    <div class="container">

        <h1>Update Your Profile</h1>

        <fieldset>

            <legend>Tenant Profile</legend>

            <form method="post" action="" enctype="multipart/form-data">

                <table>

                    <tr>
                        <td>
                            <label for="tenant_id">Tenant ID:</label>
                        </td>
                        <td>
                            <input type="text"
                                   id="tenant_id"
                                   name="tenant_id"
                                   value=""
                                   readonly>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="tenant_name">Full Name:</label>
                        </td>
                        <td>
                            <input type="text"
                                   id="tenant_name"
                                   name="tenant_name"
                                   placeholder="Enter your name">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="tenant_username">Username:</label>
                        </td>
                        <td>
                            <input type="text"
                                   id="tenant_username"
                                   name="tenant_username"
                                   placeholder="Enter your username">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="tenant_email">Email:</label>
                        </td>
                        <td>
                            <input type="email"
                                   id="tenant_email"
                                   name="tenant_email"
                                   placeholder="Enter your email">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="tenant_phone">Phone:</label>
                        </td>
                        <td>
                            <input type="tel"
                                   id="tenant_phone"
                                   name="tenant_phone"
                                   placeholder="Enter your phone number">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="tenant_address">Address:</label>
                        </td>
                        <td>
                            <textarea id="tenant_address"
                                      name="tenant_address"
                                      rows="3"
                                      placeholder="Enter your address"></textarea>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="tenant_dob">Date of Birth:</label>
                        </td>
                        <td>
                            <input type="date"
                                   id="tenant_dob"
                                   name="tenant_dob">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="tenant_nid">NID:</label>
                        </td>
                        <td>
                            <input type="file"
                                   id="tenant_nid"
                                   name="tenant_nid"
                                   accept=".jpg,.jpeg,.png,.pdf">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="tenant_password">Password:</label>
                        </td>
                        <td>
                            <input type="password"
                                   id="tenant_password"
                                   name="tenant_password"
                                   placeholder="Enter new password">
                        </td>
                    </tr>

                    <tr>
                        <td></td>
                        <td>
                            <input type="submit"
                                   name="update"
                                   value="Update Profile">

                            <input type="reset"
                                   name="reset"
                                   value="Clear">
                        </td>
                    </tr>

                </table>

            </form>

        </fieldset>

    </div>

</body>

</html>