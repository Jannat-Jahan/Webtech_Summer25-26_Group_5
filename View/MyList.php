<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>My Listings</title>

    <link rel="stylesheet" href="../Design/OwnerStyle.php">
    <script src="../JS/owner.js"></script>

</head>

<body>

    <div class="Header">
        <h1>Home Rental Management System</h1>
    </div>

    <div class="topnav">
        <a href="Owner.php">Dashboard</a>
        <a href="AddListing.php">Add Listing</a>
        <a href="MyList.php" class="active">My Listings</a>
        <a href="MyProfile.php">My Profile</a>
        <a href="../Controller/Logout.php">Logout</a>
    </div>

    <div class="container">
        <h1>My Listings</h1>

        <table class="my-listings-table" id="my_listings_table"></table>

        <br>
        <span id="listingresponse" style="font-weight:bold; font-size:16px;"></span>
    </div>

    <script>
        window.onload = function()
        {
            LoadMyListings();
        };
    </script>

</body>
</html>