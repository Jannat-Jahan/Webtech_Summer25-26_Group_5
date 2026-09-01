<?php

include "../Controller/OwnerRegistration.php";

?>

<!DOCTYPE html>
<html lang="en-US">

<head>

    <title>Owner Registration</title>

    <link rel="stylesheet" href="../Design/owner_dashboard_style.css">

    <script>

        function collect_data()
        {
            let name =
                document.getElementById("owner_name").value.trim();

            let username =
                document.getElementById("owner_username").value.trim();

            let dob =
                document.getElementById("owner_dob").value.trim();

            let phone =
                document.getElementById("owner_phone").value.trim();

            let email =
                document.getElementById("owner_email").value.trim();

            let address =
                document.getElementById("owner_address").value.trim();

            let password =
                document.getElementById("password").value.trim();

            let valid = true;

            let message = "";


            if(name.length === 0)
            {
                message += "Owner Name is Required\n";
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

        <a href="OwnerLogin.php">
            Login
        </a>

    </div>

</div>



<div class="container">

    <h1>Owner Registration</h1>


    <fieldset>

        <legend>Create Your Owner Account</legend>


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

                        <label for="owner_name">
                            Full Name:
                        </label>

                    </td>


                    <td>

                        <input
                            type="text"
                            id="owner_name"
                            name="owner_name"
                            placeholder="Enter your full name"
                            value="<?php echo htmlspecialchars($name ?? ''); ?>"
                        >

                    </td>

                </tr>


                <!-- USERNAME -->

                <tr>

                    <td>

                        <label for="owner_username">
                            Username:
                        </label>

                    </td>


                    <td>

                        <input
                            type="text"
                            id="owner_username"
                            name="owner_username"
                            placeholder="Enter a username"
                            value="<?php echo htmlspecialchars($username ?? ''); ?>"
                        >

                    </td>

                </tr>


                <!-- DOB -->

                <tr>

                    <td>

                        <label for="owner_dob">
                            Date of Birth:
                        </label>

                    </td>


                    <td>

                        <input
                            type="date"
                            id="owner_dob"
                            name="owner_dob"
                            value="<?php echo htmlspecialchars($dob ?? ''); ?>"
                        >

                    </td>

                </tr>


                <!-- PHONE -->

                <tr>

                    <td>

                        <label for="owner_phone">
                            Phone:
                        </label>

                    </td>


                    <td>

                        <input
                            type="tel"
                            id="owner_phone"
                            name="owner_phone"
                            placeholder="e.g. 017XXXXXXXX"
                            value="<?php echo htmlspecialchars($phone ?? ''); ?>"
                        >

                    </td>

                </tr>


                <!-- EMAIL -->

                <tr>

                    <td>

                        <label for="owner_email">
                            Email:
                        </label>

                    </td>


                    <td>

                        <input
                            type="email"
                            id="owner_email"
                            name="owner_email"
                            placeholder="Enter your email"
                            value="<?php echo htmlspecialchars($email ?? ''); ?>"
                        >

                    </td>

                </tr>


                <!-- ADDRESS -->

                <tr>

                    <td>

                        <label for="owner_address">
                            Address:
                        </label>

                    </td>


                    <td>

                        <textarea
                            id="owner_address"
                            name="owner_address"
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

        Already have an owner account?

        <a href="OwnerLogin.php">
            Login here
        </a>.

    </p>


</div>


</body>

</html>