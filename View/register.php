<?php
include "../Controller/RegisterValidation.php";
?>

<!DOCTYPE html>

<html>

<head>

    <title>User Registration</title>

    <link rel="stylesheet" href="../Design/style.php">

    <script>

        function collect_data()
        {
            let name = document.getElementById("name").value.trim();
            let email = document.getElementById("email").value.trim();
            let phone = document.getElementById("phone").value.trim();
            let username = document.getElementById("username").value.trim();
            let password = document.getElementById("password").value.trim();
            let confirmPassword = document.getElementById("confirmPassword").value.trim();

            let valid = true;
            let message = "";


            if(name.length < 3)
            {
                message += "Name must be at least 3 characters.\n";
                valid = false;
            }


            if(email.length == 0)
            {
                message += "Email is required.\n";
                valid = false;
            }


            if(phone.length < 11)
            {
                message += "Phone Number must be at least 11 characters.\n";
                valid = false;
            }


            if(username.length < 5)
            {
                message += "User Name must be at least 5 characters.\n";
                valid = false;
            }


            if(password.length < 5)
            {
                message += "Password must be at least 5 characters.\n";
                valid = false;
            }


            if(password !== confirmPassword)
            {
                message += "Password and Confirm Password do not match.\n";
                valid = false;
            }


            if(!document.getElementById("condition").checked)
            {
                message += "You must agree to the Terms and Conditions.\n";
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

        <a href="login.php">Login</a>

    </div>

</div>



<div class="container">

    <h1>User Registration Form</h1>


    <fieldset>

        <legend>User Personal Information</legend>


        <form method="post" action="" onsubmit="return collect_data()">

            <table>


                <!-- Name -->

                <tr>

                    <td>
                        <label for="name">
                            Name:
                        </label>
                    </td>

                    <td>

                        <input
                            type="text"
                            id="name"
                            name="name"
                            placeholder="Enter Your Name"
                            value="<?php echo htmlspecialchars($name ?? ''); ?>"
                        >

                    </td>

                </tr>


                <!-- Date of Birth -->

                <tr>

                    <td>
                        <label for="DOB">
                            DOB:
                        </label>
                    </td>

                    <td>

                        <input
                            type="date"
                            id="DOB"
                            name="DOB"
                        >

                    </td>

                </tr>


                <!-- Phone -->

                <tr>

                    <td>
                        <label for="phone">
                            Phone Number:
                        </label>
                    </td>

                    <td>

                        <input
                            type="text"
                            id="phone"
                            name="phone"
                            placeholder="Enter Your Phone Number"
                        >

                    </td>

                </tr>


                <!-- Email -->

                <tr>

                    <td>
                        <label for="email">
                            Email:
                        </label>
                    </td>

                    <td>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            placeholder="Enter Your Email"
                        >

                    </td>

                </tr>


                <!-- NID -->

                <tr>

                    <td>
                        <label for="nid">
                            National NID:
                        </label>
                    </td>

                    <td>

                        <input
                            type="text"
                            id="nid"
                            name="nid"
                            placeholder="Enter Your NID"
                        >

                    </td>

                </tr>


                <!-- Citizenship -->

                <tr>

                    <td>

                        <label for="citizenship">
                            Choose Citizenship:
                        </label>

                    </td>

                    <td>

                        <select id="citizenship" name="citizenship">

                            <option value="">
                                Select Country
                            </option>

                            <option value="Bangladesh">
                                Bangladesh
                            </option>

                            <option value="USA">
                                USA
                            </option>

                            <option value="UK">
                                UK
                            </option>

                            <option value="Argentina">
                                Argentina
                            </option>

                        </select>

                    </td>

                </tr>


                <!-- Profession -->

                <tr>

                    <td>

                        <label>
                            User Profession:
                        </label>

                    </td>

                    <td>

                        <input
                            type="radio"
                            id="student"
                            name="profession"
                            value="Student"
                        >

                        <label for="student">
                            Student
                        </label>

                        <br>


                        <input
                            type="radio"
                            id="faculty"
                            name="profession"
                            value="Faculty"
                        >

                        <label for="faculty">
                            Faculty
                        </label>

                        <br>


                        <input
                            type="radio"
                            id="privatejob"
                            name="profession"
                            value="Private Job Holder"
                        >

                        <label for="privatejob">
                            Private Job Holder
                        </label>

                    </td>

                </tr>


                <!-- Address -->

                <tr>

                    <td>

                        <label for="address">
                            Address:
                        </label>

                    </td>

                    <td>

                        <textarea
                            id="address"
                            name="address"
                            rows="6"
                            cols="25"
                            style="resize: none;"
                            placeholder="Enter Your Address"
                        ></textarea>

                    </td>

                </tr>


                <!-- Username -->

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
                            placeholder="Enter Your Username"
                        >

                    </td>

                </tr>


                <!-- Password -->

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


                <!-- Confirm Password -->

                <tr>

                    <td>

                        <label for="confirmPassword">
                            Confirm Password:
                        </label>

                    </td>

                    <td>

                        <input
                            type="password"
                            id="confirmPassword"
                            name="confirmPassword"
                        >

                    </td>

                </tr>


                <!-- User Role -->

                <tr>

                    <td>

                        <label for="role">
                            Register As:
                        </label>

                    </td>

                    <td>

                        <select id="role" name="role">

                            <option value="">
                                Select Role
                            </option>

                            <option value="Owner">
                                Home Owner
                            </option>

                            <option value="Tenant">
                                Tenant
                            </option>

                        </select>

                    </td>

                </tr>


                <!-- Terms -->

                <tr>

                    <td colspan="2">

                        <input
                            type="checkbox"
                            id="condition"
                            name="condition"
                            value="1"
                        >

                        <label for="condition">

                            <font color="red">
                                I have agreed to Terms and Conditions*
                            </font>

                        </label>

                    </td>

                </tr>


            </table>


            <br>


            <input
                type="submit"
                id="submit"
                name="submit"
                value="SignUp"
            >

            <input
                type="reset"
                id="reset"
                name="reset"
                value="Reset"
            >


        </form>

    </fieldset>


    <?php

    if(!empty($message))
    {
        echo "<p>$message</p>";
    }

    ?>


    <p>

        Already have an account?

        <a href="login.php">
            Login Here
        </a>

    </p>


</div>



<div class="footer">

    <h2>Created 2026</h2>

</div>


</body>

</html>