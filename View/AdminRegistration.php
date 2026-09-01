<?php

include "../Controller/AdminRegistration.php";

?>

<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>

    <link rel="stylesheet" href="../Design/style.css">

    <script>
        function checkAdminUsername()
        {
            let username = document.getElementById("admin_username").value.trim();
            let msgElement = document.getElementById("username_message");

            if(username.length === 0)
            {
                msgElement.innerHTML = "";
                return;
            }

            let xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if(this.readyState == 4 && this.status == 200)
                {
                    if(this.responseText.indexOf("Available") !== -1)
                    {
                        msgElement.style.color = "green";
                    }
                    else
                    {
                        msgElement.style.color = "red";
                    }
                    msgElement.innerHTML = this.responseText;
                }
            };

            xhttp.open("POST", "../Controller/CheckAdmin.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("username=" + encodeURIComponent(username));
        }

        function collect_data()
        {
            let name =
                document.getElementById("admin_name").value.trim();

            let username =
                document.getElementById("admin_username").value.trim();

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
        <a href="AdminLogin.php">Login</a>
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

        <form method="post" action="" onsubmit="return collect_data()">
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
                            placeholder="Enter a username (min 5 chars)"
                            onkeyup="checkAdminUsername()"
                            value="<?php echo htmlspecialchars($username ?? ''); ?>"
                        >
                        <br>
                        <span id="username_message" style="font-weight:bold; font-size:14px; margin-left:10px;"></span>
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

<div class="footer">
    <h2>Home Rental Management System &copy; 2026</h2>
</div>

</body>
</html>