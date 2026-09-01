<?php
include "../Controller/TenantRegistration.php";
?>
 
<!DOCTYPE html>
<html lang="en-US">
 
<head>
 
    <title>Tenant Registration</title>
 
    <link rel="stylesheet" href="../Design/tenant_dashboard_style.css">
 
    <script>
 
        function collect_data()
        {
            let name = document.getElementById("tenant_name").value.trim();
            let username = document.getElementById("tenant_username").value.trim();
            let dob = document.getElementById("tenant_dob").value.trim();
            let phone = document.getElementById("tenant_phone").value.trim();
            let email = document.getElementById("tenant_email").value.trim();
            let address = document.getElementById("tenant_address").value.trim();
            let nid = document.getElementById("tenant_nid").files.length;
            let password = document.getElementById("password").value.trim();
 
            let valid = true;
            let message = "";
 
 
            if (name.length === 0)
            {
                message += "Tenant Name is Required\n";
                valid = false;
            }
 
 
            if (username.length < 5)
            {
                message += "Username must be at least 5 characters\n";
                valid = false;
            }
 
 
            if (dob.length === 0)
            {
                message += "Date of Birth is Required\n";
                valid = false;
            }
 
 
            if (phone.length === 0)
            {
                message += "Phone Number is Required\n";
                valid = false;
            }
 
 
            if (email.length === 0)
            {
                message += "Email is Required\n";
                valid = false;
            }
 
 
            if (address.length === 0)
            {
                message += "Address is Required\n";
                valid = false;
            }
 
 
            if (nid === 0)
            {
                message += "NID File is Required\n";
                valid = false;
            }
 
 
            if (password.length < 5)
            {
                message += "Password must be at least 5 characters\n";
                valid = false;
            }
 
 
            if (!valid)
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
 
            <a href="TenantLogin.php">Login</a>
 
        </div>
 
    </div>
 
 
    <div class="container">
 
        <h1>Tenant Registration</h1>
 
 
        <fieldset>
 
            <legend>Create Your Tenant Account</legend>
 
 
            <?php if (!empty($message)) { ?>
 
                <p style="color:#a33; font-weight:bold;">
 
                    <?php echo htmlspecialchars($message); ?>
 
                </p>
 
            <?php } ?>
 
 
            <form
                method="post"
                action=""
                enctype="multipart/form-data"
                onsubmit="return collect_data()"
>
 
                <table>
 
 
                    <!-- NAME -->
 
                    <tr>
 
                        <td>
<label for="tenant_name">
                                Full Name:
</label>
</td>
 
                        <td>
 
                            <input
                                type="text"
                                id="tenant_name"
                                name="tenant_name"
                                placeholder="Enter your full name"
                                value="<?php echo htmlspecialchars($name); ?>"
>
 
                        </td>
 
                    </tr>
 
 
                    <!-- USERNAME -->
 
                    <tr>
 
                        <td>
<label for="tenant_username">
                                Username:
</label>
</td>
 
                        <td>
 
                            <input
                                type="text"
                                id="tenant_username"
                                name="tenant_username"
                                placeholder="Enter a username"
                                value="<?php echo htmlspecialchars($username); ?>"
>
 
                        </td>
 
                    </tr>
 
 
                    <!-- DATE OF BIRTH -->
 
                    <tr>
 
                        <td>
<label for="tenant_dob">
                                Date of Birth:
</label>
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
 
 
                    <!-- PHONE -->
 
                    <tr>
 
                        <td>
<label for="tenant_phone">
                                Phone:
</label>
</td>
 
                        <td>
 
                            <input
                                type="tel"
                                id="tenant_phone"
                                name="tenant_phone"
                                placeholder="e.g. 017XXXXXXXX"
                                value="<?php echo htmlspecialchars($phone); ?>"
>
 
                        </td>
 
                    </tr>
 
 
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
                                value="<?php echo htmlspecialchars($email); ?>"
>
 
                        </td>
 
                    </tr>
 
 
                    <!-- ADDRESS -->
 
                    <tr>
 
                        <td>
<label for="tenant_address">
                                Address:
</label>
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
 
 
                    <!-- NID FILE -->
 
                    <tr>
 
                        <td>
<label for="tenant_nid">
                                NID:
</label>
</td>
 
                        <td>
 
                            <input
                                type="file"
                                id="tenant_nid"
                                name="tenant_nid"
                                accept=".jpg,.jpeg,.png,.pdf"
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
                                name="submit"
                                value="Register"
>
 
                            <input
                                type="reset"
                                name="reset"
                                value="Clear"
>
 
                        </td>
 
                    </tr>
 
 
                </table>
 
            </form>
 
        </fieldset>
 
 
        <p>
            Already have an account?
<a href="TenantLogin.php">
                Login here
</a>.
</p>
 
 
    </div>
 
</body>
 
</html>