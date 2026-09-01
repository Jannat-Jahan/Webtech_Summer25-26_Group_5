<?php

include "../Controller/ownerValidation.php";

?>

<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Owner Login</title>

    <link rel="stylesheet" href="../Design/style.css">

    <script>
        function collect_data()
        {
            let username =
                document.getElementById("username").value.trim();

            let password =
                document.getElementById("password").value.trim();

            let valid = true;
            let message = "";

            if(username.length === 0)
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
        <a href="OwnerRegistration.php">Register</a>
    </div>
</div>

<div class="container">
    <h1>Owner Login</h1>

    <fieldset>
        <legend>Owner Login</legend>

        <?php
        if(!empty($message))
        {
            echo "<p style='color:#a33; font-weight:bold;'>";
            echo htmlspecialchars($message);
            echo "</p>";
        }
        ?>

        <form method="post" action="" onsubmit="return collect_data()">
            <table>
                <!-- EMAIL / USERNAME -->
                <tr>
                    <td>
                        <label for="username">
                            Email:
                        </label>
                    </td>
                    <td>
                        <input
                            type="email"
                            id="username"
                            name="username"
                            placeholder="Enter your email"
                            value="<?php echo htmlspecialchars($name ?? ''); ?>"
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
                            <?php echo !empty($remember) ? 'checked' : ''; ?>
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
        Don't have an owner account?
        <a href="OwnerRegistration.php">
            Register here
        </a>
    </p>
</div>

<div class="footer">
    <h2>Home Rental Management System &copy; 2026</h2>
</div>

</body>
</html>