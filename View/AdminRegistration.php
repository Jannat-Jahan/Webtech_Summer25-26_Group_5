<?php

include "../Controller/AdminRegistration.php";

?>

<!DOCTYPE html>
<html lang="en-US">

<head>

    <title>Admin Registration</title>

    <link rel="stylesheet" href="../Design/admin_dashboard_style.css">

    <script>

        function collect_data()
        {
            let name =
                document.getElementById("admin_name").value.trim();

            let username =
                document.getElementById("admin_username").value.trim();

            let dob =
                document.getElementById("admin_dob").value.trim();

            let phone =
                document.getElementById("admin_phone").value.trim();

            let email =
                document.getElementById("admin_email").value.trim();

            let address =
                document.getElementById("admin_address").value.trim();

            let password =
                document.getElementById("password").value.trim();

            let valid = true;

            let message = "";


            if(name.length === 0)
            {
                message += "Admin Name is Required\n";
                valid = false;
            }


            if(username.length < 5)
            {
                message += "Username must be at least 5 characters\n";
                valid = false;
            }


            if(dob.length === 0)
            {
                message += "Date of Birth is Required\n";
                valid = false;
            }


            if(phone.length === 0)
            {
                message += "Phone Number is Required\n";
                valid = false;
            }


            if(email.length === 0)
            {
                message += "Email is Required\n";
                valid = false;
            }


            if(address.length === 0)
            {
                message += "Address is Required\n";
                valid = false;
            }


            if(password.length < 5)
            {
                message += "Password must be at least 5 characters\n";
                valid = false;
            }


            if(!valid)
            {
                alert(message);
            }


            return valid;
        }

    </script>

</head>


<body>


<div class="position">

    <div class="Header">

        <h1>
            Flat Rental Management System
        </h1>

    </div>


    <div class="topnav">

        <a href="index.php">
            Home
        </a>

        <a href="AdminLogin.php">
            Login
        </a>

    </div>

</div>



<div class="container">

    <h1>Admin Registration</h1>


    <fieldset>

        <legend>Create Your Admin Account</legend>


        <?php

        if(!empty($message))
        {
            echo "<p style='color:#a33; font-weight:bold;'>";

            echo htmlspecialchars($message);

            echo "</p>";
        }

        ?>


        <form
            method="post"
            action=""
            onsubmit="return collect_data()"
        >

            <table>


                <!-- NAME -->

                <tr>

                    <td>

                        <label for="admin_name">
                            Full Name:
                        </label>

                    </td>


                    <td>

                        <input
                            type="text"
                            id="admin_name"
                            name="admin_name"
                            placeholder="Enter your full name"
                            value="<?php echo htmlspecialchars($name ?? ''); ?>"
                        >

                    </td>

                </tr>


                <!-- USERNAME -->

                <tr>

                    <td>

                        <label for="admin_username">
                            Username:
                        </label>

                    </td>


                    <td>

                        <input
                            type="text"
                            id="admin_username"
                            name="admin_username"
                            placeholder="Enter a username"
                            value="<?php echo htmlspecialchars($username ?? ''); ?>"
                        >

                    </td>

                </tr>


                <!-- DOB -->

                <tr>

                    <td>

                        <label for="admin_dob">
                            Date of Birth:
                        </label>

                    </td>


                    <td>

                        <input
                            type="date"
                            id="admin_dob"
                            name="admin_dob"
                            value="<?php echo htmlspecialchars($dob ?? ''); ?>"
                        >

                    </td>

                </tr>


                <!-- PHONE -->

                <tr>

                    <td>

                        <label for="admin_phone">
                            Phone:
                        </label>

                    </td>


                    <td>

                        <input
                            type="tel"
                            id="admin_phone"
                            name="admin_phone"
                            placeholder="e.g. 017XXXXXXXX"
                            value="<?php echo htmlspecialchars($phone ?? ''); ?>"
                        >

                    </td>

                </tr>


                <!-- EMAIL -->

                <tr>

                    <td>

                        <label for="admin_email">
                            Email:
                        </label>

                    </td>


                    <td>

                        <input
                            type="email"
                            id="admin_email"
                            name="admin_email"
                            placeholder="Enter your email"
                            value="<?php echo htmlspecialchars($email ?? ''); ?>"
                        >

                    </td>

                </tr>


                <!-- ADDRESS -->

                <tr>

                    <td>

                        <label for="admin_address">
                            Address:
                        </label>

                    </td>


                    <td>

                        <textarea
                            id="admin_address"
                            name="admin_address"
                            rows="4"
                            placeholder="Enter your address"
                        ><?php echo htmlspecialchars($address ?? ''); ?></textarea>

                    </td>

                </tr>


                <!-- PASSWORD -->

                <tr>

                    <td>

                        <label for="password">
                            Password:
                        </label>

                    </td>


                    <td>

                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="At least 5 characters"
                        >

                    </td>

                </tr>


                <!-- BUTTONS -->

                <tr>

                    <td></td>

                    <td>

                        <input
                            type="submit"
                            id="submit"
                            name="submit"
                            value="Register"
                        >

                        <input
                            type="reset"
                            id="reset"
                            name="reset"
                            value="Clear"
                        >

                    </td>

                </tr>


            </table>

        </form>

    </fieldset>


    <p>

        Already have an admin account?

        <a href="AdminLogin.php">
            Login here
        </a>.

    </p>


</div>


</body>

</html>