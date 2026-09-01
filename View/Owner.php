<!DOCTYPE html>
<html lang="en-US">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Owner Dashboard</title>

    <link rel="stylesheet" href="../Design/OwnerStyle.php">
    <script src="../JS/owner.js"></script>

</head>

<body>

<div class="position">

    <div class="Header" id="header">
        <h1 id="system_title">Home Rental Management System</h1>
    </div>

    <div class="topnav" id="top_navigation">
        <a href="Owner.php" id="dashboard_link" name="dashboard" class="active">Dashboard</a>
        <a href="AddListing.php" id="add_listing_link" name="add_listing">Add Listing</a>
        <a href="MyList.php" id="my_listings_link" name="my_listings">My Listings</a>
        <a href="MyProfile.php" id="my_profile_link" name="my_profile">My Profile</a>
        <a href="../Controller/Logout.php" id="logout_link" name="logout">Logout</a>
    </div>

</div>

<div class="container" id="dashboard_container">

    <h1 id="dashboard_title">Owner Dashboard</h1>

    <fieldset id="welcome_section">
        <legend id="welcome_title">Welcome Back, Owner</legend>
        <p id="welcome_message">Here's an overview of your rental properties today.</p>
    </fieldset>

    <h2 id="recent_title" style="margin-top:20px;">Recent Listings</h2>

    <table id="recent_listings" name="recent_listings"></table>

</div>

<script>
    window.onload = function()
    {
        LoadRecentListings();
    };
</script>

</body>
</html>