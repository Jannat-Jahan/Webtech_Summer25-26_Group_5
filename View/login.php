<?php
include "../Controller/LoginValidation.php";
?>

<!DOCTYPE html>

<html>

<head>

    <title>Login Page</title>

    <link rel="stylesheet" href="../Design/style.php">

    <script>

        function collect_data()
        {
            let name = document.getElementById("username").value.trim();

            let password = document.getElementById("password").value.trim();

            let valid = true;

            let message = "";


            if(name.length < 5)
            {
                message += "User Name Must be 5 Char\n";
                valid = false;
            }


            if(password.length < 5)
            {
                message += "Password Must be 5 Char";
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
                Room / Flat Rental Management System
            </h1>

        </div>


        <div class="topnav">

            <a href="index.php">Home</a>

            <a href="register.php">Register</a>

        </div>

    </div>


    <div class="container">

        <h1>Login Page</h1>


        <form method="post" action="" onsubmit="return collect_data()">

            <table>


                <tr>

                    <td>

                        <label for="username">
                            User Name:
                        </label>

                    </td>


                    <td>

                        <input
                            type="text"
                            id="username"
                            name="username"
                            placeholder="Enter Your Name"
                            value="<?php echo htmlspecialchars($name); ?>"
                        >

                    </td>

                </tr>


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
                        >

                    </td>

                </tr>


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


                <tr>

                    <td colspan="2">

                        <input
                            type="submit"
                            id="submit"
                            name="submit"
                            value="Log In"
                        >

                        <input
                            type="reset"
                            id="reset"
                            name="reset"
                            value="Reset"
                        >

                    </td>

                </tr>


            </table>

        </form>


        <?php

        if(!empty($message))
        {
            echo "<p>$message</p>";
        }

        ?>


        <p>
            Don't have an account?
            <a href="register.php">Register Here</a>
        </p>


    </div>


    <div class="footer">

        <h2>Created 2026</h2>

    </div>


</body>

</html>