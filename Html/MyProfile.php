<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Owner Profile</title>

    <link rel="stylesheet" href="../Design/OwnerStyle.php">

</head>

<body>


    <div class="Header">

        <h1>
            Home Rental Management System
        </h1>

    </div>


    <div class="topnav">

        <a href="Owner.php">
            Dashboard
        </a>

        <a href="AddListing.php">
            Add Listing
        </a>

        <a href="MyList.php">
            My Listings
        </a>

        <a href="#" class="active">
            My Profile
        </a>

        <a href="index.html">
            Logout
        </a>

    </div>


    <div class="container">

        <div class="profile-card">


            <div class="profile-header">

                <div class="profile-image">
                    <span></span>
                </div>

                <div>

                    <h2>
                        Owner Profile
                    </h2>

                    <p>
                        Manage and view your personal information
                    </p>

                </div>

            </div>



            <div class="profile-info">


                <div class="info-box">

                    <label for="full_name">
                        Full Name
                    </label>

                    <input
                        type="text"
                        id="full_name"
                        value="Mahbuba Nasrin"
                        readonly>

                </div>



                <div class="info-box">

                    <label for="username">
                        Username
                    </label>

                    <input
                        type="text"
                        id="username"
                        value="mahbuba"
                        readonly>

                </div>



                <div class="info-box">

                    <label for="email">
                        Email
                    </label>

                    <input
                        type="email"
                        id="email"
                        value="mahbuba@example.com"
                        readonly>

                </div>



                <div class="info-box">

                    <label for="phone">
                        Phone
                    </label>

                    <input
                        type="text"
                        id="phone"
                        value="01700000000"
                        readonly>

                </div>



                <div class="info-box">

                    <label for="address">
                        Address
                    </label>

                    <input
                        type="text"
                        id="address"
                        value="Dhaka, Bangladesh"
                        readonly>

                </div>



                <div class="info-box">

                    <label for="account_type">
                        Account Type
                    </label>

                    <input
                        type="text"
                        id="account_type"
                        value="Owner"
                        readonly>

                </div>


            </div>



            <div class="buttons">

                <button
                    type="button"
                    class="edit-btn"
                    onclick="editProfile()">

                    Edit Profile

                </button>

            </div>


        </div>

    </div>



    <script>

        function editProfile() {

            let fields = [

                "full_name",
                "username",
                "email",
                "phone",
                "address"

            ];


            fields.forEach(function(id) {

                document
                    .getElementById(id)
                    .removeAttribute("readonly");

            });


            document
                .getElementById("full_name")
                .focus();


            document
                .querySelector(".edit-btn")
                .innerText = "Save Profile";


            document
                .querySelector(".edit-btn")
                .setAttribute(
                    "onclick",
                    "saveProfile()"
                );

        }



        function saveProfile() {

            let fullName =
                document
                    .getElementById("full_name")
                    .value.trim();


            let username =
                document
                    .getElementById("username")
                    .value.trim();


            let email =
                document
                    .getElementById("email")
                    .value.trim();


            let phone =
                document
                    .getElementById("phone")
                    .value.trim();


            let address =
                document
                    .getElementById("address")
                    .value.trim();



            // Client-side validation

            if (fullName.length < 3) {

                alert(
                    "Full Name must be at least 3 characters."
                );

                return;

            }


            if (username.length < 3) {

                alert(
                    "Username must be at least 3 characters."
                );

                return;

            }


            if (email === "") {

                alert(
                    "Please enter your email."
                );

                return;

            }


            if (phone.length < 11) {

                alert(
                    "Please enter a valid phone number."
                );

                return;

            }


            if (address.length < 3) {

                alert(
                    "Please enter your address."
                );

                return;

            }



            // Make fields readonly again

            let fields = [

                "full_name",
                "username",
                "email",
                "phone",
                "address"

            ];


            fields.forEach(function(id) {

                document
                    .getElementById(id)
                    .setAttribute(
                        "readonly",
                        true
                    );

            });



            document
                .querySelector(".edit-btn")
                .innerText = "Edit Profile";


            document
                .querySelector(".edit-btn")
                .setAttribute(
                    "onclick",
                    "editProfile()"
                );


            alert(
                "Profile updated successfully!"
            );

        }

    </script>


</body>

</html>