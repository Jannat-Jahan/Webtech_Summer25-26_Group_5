<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Owner Profile</title>

    <link rel="stylesheet" href="../Design/OwnerStyle.php">
    <script src="../JS/owner.js"></script>

</head>

<body>

    <div class="Header">
        <h1>Flat Rental Management System</h1>
    </div>

    <div class="topnav">
        <a href="Owner.php">Dashboard</a>
        <a href="AddListing.php">Add Listing</a>
        <a href="MyList.php">My Listings</a>
        <a href="MyProfile.php" class="active">My Profile</a>
        <a href="../Controller/Logout.php">Logout</a>
    </div>

    <div class="container">
        <div class="profile-card">
            <div class="profile-header">
                <div class="profile-image">
                    <span>&#128100;</span>
                </div>

                <div>
                    <h2>Owner Profile</h2>
                    <p>Manage and view your personal information</p>
                </div>
            </div>

            <div class="profile-info" id="profile-info">

                <div class="info-box">
                    <label for="full_name">Full Name</label>
                    <input type="text" id="full_name" readonly>
                </div>

                <div class="info-box">
                    <label for="owner_username">Username</label>
                    <input type="text" id="owner_username" readonly>
                </div>

                <div class="info-box">
                    <label for="owner_dob">Date of Birth</label>
                    <input type="date" id="owner_dob" readonly>
                </div>

                <div class="info-box">
                    <label for="email">Email</label>
                    <input type="email" id="email" readonly>
                </div>

                <div class="info-box">
                    <label for="phone">Phone</label>
                    <input type="text" id="phone" readonly>
                </div>

                <div class="info-box">
                    <label for="address">Address</label>
                    <input type="text" id="address" readonly>
                </div>

                <div class="info-box">
                    <label for="owner_nid">NID / ID Document</label>
                    <input type="text" id="owner_nid" readonly>
                    <div id="nid_file_box" style="display:none; margin-top:8px;">
                        <label for="owner_nid_file" style="font-size:14px;">Upload New NID File (Optional):</label>
                        <input type="file" id="owner_nid_file" accept=".jpg,.jpeg,.png,.pdf">
                    </div>
                </div>

                <div class="info-box">
                    <label for="account_type">Account Type</label>
                    <input type="text" id="account_type" value="Owner" readonly>
                </div>

            </div>

            <div class="buttons">
                <button type="button" class="edit-btn" onclick="editProfile()">
                    Edit Profile
                </button>
            </div>

            <br>
            <span id="profileresponse" style="font-weight:bold; font-size:16px;"></span>

        </div>
    </div>

    <script>
        window.onload = function() {
            LoadOwnerProfile();
        };

        function editProfile() {
            let fields = [
                "full_name",
                "owner_username",
                "owner_dob",
                "email",
                "phone",
                "address",
                "owner_nid"
            ];

            fields.forEach(function(id) {
                let el = document.getElementById(id);
                if (el) el.removeAttribute("readonly");
            });

            let nidFileBox = document.getElementById("nid_file_box");
            if (nidFileBox) nidFileBox.style.display = "block";

            document.getElementById("full_name").focus();

            let btn = document.querySelector(".edit-btn");
            btn.innerText = "Save Profile";
            btn.setAttribute("onclick", "saveProfile()");
        }

        function saveProfile() {
            let fullName = document.getElementById("full_name").value.trim();
            let username = document.getElementById("owner_username").value.trim();
            let dob = document.getElementById("owner_dob").value;
            let email = document.getElementById("email").value.trim();
            let phone = document.getElementById("phone").value.trim();
            let address = document.getElementById("address").value.trim();
            let nid = document.getElementById("owner_nid").value.trim();

            if (fullName.length < 3) {
                alert("Full Name must be at least 3 characters.");
                return;
            }

            if (!/^[A-Za-z ]+$/.test(fullName)) {
                alert("Invalid Full Name.");
                return;
            }

            if (username.length < 5) {
                alert("Username must be at least 5 characters.");
                return;
            }

            if (dob === "") {
                alert("Please enter your date of birth.");
                return;
            }

            if (email === "") {
                alert("Please enter your email.");
                return;
            }

            if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                alert("Please enter a valid email.");
                return;
            }

            if (!/^01[3-9][0-9]{8}$/.test(phone)) {
                alert("Please enter a valid phone number (e.g. 017XXXXXXXX).");
                return;
            }

            if (address.length < 3) {
                alert("Please enter your address.");
                return;
            }

            if (nid === "") {
                alert("Please enter your NID number or upload a document.");
                return;
            }

            UpdateOwner();
        }
    </script>

</body>
</html>