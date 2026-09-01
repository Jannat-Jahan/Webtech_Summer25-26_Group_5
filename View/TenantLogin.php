<?php

include "../Controller/TenantLogin.php";

?>

<!DOCTYPE html>
<html lang="en-US">

<head>

    <title>Tenant Login</title>

    <link rel="stylesheet" href="../Design/tenant_dashboard_style.php">

    <script>

        function collect_data()
        {
            let email =
                document.getElementById("tenant_email").value.trim();

            let password =
                document.getElementById("password").value.trim();

            let valid = true;

            let message = "";


            if(email.length === 0)
            {
                message += "Email is Required\n";
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

            <h1>Flat Rental Management System</h1>

        </div>


        <div class="topnav">

            <a href="index.php">Home</a>

            <a href="TenantRegistration.php">Register</a>

        </div>

    </div>


    <div class="container">

        <h1>Tenant Login</h1>


        <fieldset>

            <legend>Tenant Login</legend>


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


                    <!-- EMAIL -->

                    <tr>

                        <td>
                            <label for="tenant_email">
                                Email:
                            </label>
                        </td>

                        <td>

                            <input
                                type="email"
                                id="tenant_email"
                                name="tenant_email"
                                placeholder="Enter your email"
                                value="<?php echo htmlspecialchars($email ?? ''); ?>"
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


                    <!-- BUTTON -->

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

            Don't have a tenant account?

            <a href="TenantRegistration.php">
                Register here
            </a>

        </p>


    </div>


</body>

</html>