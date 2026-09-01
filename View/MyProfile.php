<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Owner Profile</title>

    <link rel="stylesheet"
          href="../Design/OwnerStyle.php">

    <script src="../JS/Owner.js"></script>

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


        <a href="#"
           class="active">

            My Profile

        </a>


        <a href="../Controller/Logout.php">

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


            <div class="profile-info"
                 id="profile-info">


                <div class="info-box">

                    <label for="full_name">

                        Full Name

                    </label>

                    <input
                        type="text"
                        id="full_name"
                        readonly>

                </div>


                <div class="info-box">

                    <label for="owner_dob">

                        Date of Birth

                    </label>

                    <input
                        type="date"
                        id="owner_dob"
                        readonly>

                </div>


                <div class="info-box">

                    <label for="email">

                        Email

                    </label>

                    <input
                        type="email"
                        id="email"
                        readonly>

                </div>


                <div class="info-box">

                    <label for="phone">

                        Phone

                    </label>

                    <input
                        type="text"
                        id="phone"
                        readonly>

                </div>


                <div class="info-box">

                    <label for="address">

                        Address

                    </label>

                    <input
                        type="text"
                        id="address"
                        readonly>

                </div>


                <div class="info-box">

                    <label for="owner_nid">

                        NID

                    </label>

                    <input
                        type="text"
                        id="owner_nid"
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


            <span id="profileresponse"></span>


        </div>

    </div>


    <script>

        window.onload=function()
        {
            LoadOwnerProfile();
        }


        function editProfile()
        {

            let fields=[

                "full_name",
                "owner_dob",
                "email",
                "phone",
                "address",
                "owner_nid"

            ];


            fields.forEach(function(id)
            {

                document
                    .getElementById(id)
                    .removeAttribute("readonly");

            });


            document
                .getElementById("full_name")
                .focus();


            document
                .querySelector(".edit-btn")
                .innerText="Save Profile";


            document
                .querySelector(".edit-btn")
                .setAttribute(
                    "onclick",
                    "saveProfile()"
                );

        }


        function saveProfile()
        {

            let fullName =
                document
                .getElementById("full_name")
                .value.trim();


            let dob =
                document
                .getElementById("owner_dob")
                .value;


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


            let nid =
                document
                .getElementById("owner_nid")
                .value.trim();


            if(fullName.length<3)
            {
                alert(
                    "Full Name must be at least 3 characters."
                );

                return;
            }


            if(!/^[A-Za-z ]+$/.test(fullName))
            {
                alert(
                    "Invalid Full Name."
                );

                return;
            }


            if(dob==="")
            {
                alert(
                    "Please enter your date of birth."
                );

                return;
            }


            if(email==="")
            {
                alert(
                    "Please enter your email."
                );

                return;
            }


            if(!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email))
            {
                alert(
                    "Please enter a valid email."
                );

                return;
            }


            if(!/^01[3-9][0-9]{8}$/.test(phone))
            {
                alert(
                    "Please enter a valid phone number."
                );

                return;
            }


            if(address.length<3)
            {
                alert(
                    "Please enter your address."
                );

                return;
            }


            if(nid==="")
            {
                alert(
                    "Please enter your NID."
                );

                return;
            }


            UpdateOwner();

        }

    </script>


</body>

</html>