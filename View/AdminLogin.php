<?php

include "../Controller/AdminLogin.php";

?>

<!DOCTYPE html>
<html lang="en-US">

<head>

    <title>Admin Login</title>

    <link rel="stylesheet" href="../Design/admin_dashboard_style.css">

    <script>

        function collect_data()
        {
            let username =
                document.getElementById("admin_username").value.trim();

            let password =
                document.getElementById("password").value.trim();

            let valid = true;

            let message = "";


            if(username.length < 5)
            {
                message += "Username must be at least 5 characters\n";
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

        <a href="AdminRegistration.php">
            Register
        </a>

    </div>

</div>



<div class="container">

    <h1>Admin Login</h1>


    <fieldset>

        <legend>Admin Login</legend>


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
                            placeholder="Enter your username"
                            value="<?php echo htmlspecialchars($username ?? ''); ?>"
                        >

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
                            placeholder="Enter your password"
                        >

                    </td>

                </tr>


                <!-- REMEMBER ME -->

                <tr>

                    <td colspan="2">

                        <input
                            type="checkbox"
                            id="rememberuser"
                            name="rememberuser"
                            value="1"
                            <?php echo $remember ? 'checked' : ''; ?>
                        >

                        <label for="rememberuser">
                            Remember Me
                        </label>

                    </td>

                </tr>


                <!-- BUTTONS -->

                <tr>

                    <td colspan="2">

                        <input
                            type="submit"
                            id="submit"
                            name="submit"
                            value="Login"
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

        Don't have an admin account?

        <a href="AdminRegistration.php">
            Register here
        </a>

    </p>


</div>


</body>

</html>