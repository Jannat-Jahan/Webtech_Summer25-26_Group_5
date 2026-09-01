<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Update Listing</title>

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
        <a href="MyList.php" class="active">My Listings</a>
        <a href="MyProfile.php">My Profile</a>
        <a href="../Controller/Logout.php">Logout</a>
    </div>

    <div class="container add-listing-container">
        <h2>Update Property</h2>

        <form
            action="#"
            method="post"
            onsubmit="return validateUpdateForm()">

            <fieldset>
                <legend>Property Information</legend>

                <table>
                    <tr>
                        <td>
                            <label for="listing_id">Listing ID</label>
                        </td>
                        <td>
                            <input
                                type="text"
                                id="listing_id"
                                name="listing_id"
                                value="<?php echo htmlspecialchars($_GET['id'] ?? ''); ?>"
                                readonly>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="property_name">Property Name</label>
                        </td>
                        <td>
                            <input
                                type="text"
                                id="property_name"
                                name="property_name"
                                placeholder="Enter property name"
                                minlength="3"
                                maxlength="100">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="location">Location</label>
                        </td>
                        <td>
                            <input
                                type="text"
                                id="location"
                                name="location"
                                placeholder="Enter location"
                                minlength="3"
                                maxlength="150">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="rent">Rent (BDT)</label>
                        </td>
                        <td>
                            <input
                                type="number"
                                id="rent"
                                name="rent"
                                placeholder="Enter monthly rent"
                                min="1"
                                max="10000000"
                                step="1">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="description">Description</label>
                        </td>
                        <td>
                            <textarea
                                id="description"
                                name="description"
                                rows="5"
                                minlength="10"
                                maxlength="500"></textarea>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="status">Status</label>
                        </td>
                        <td>
                            <select id="status" name="status">
                                <option value="">Select Status</option>
                                <option value="Available">Available</option>
                                <option value="Rented">Rented</option>
                            </select>
                        </td>
                    </tr>
                </table>
            </fieldset>

            <input type="submit" value="Update Listing">
            <a href="MyList.php"><input type="button" value="Cancel" style="background-color:#c94c4c; width:20%; margin-left:10px; color:white; padding:10px 15px; border-radius:10px; cursor:pointer;"></a>

            <br><br>
            <span id="listingresponse" style="font-weight:bold; font-size:16px;"></span>
        </form>
    </div>

    <script>
        window.onload = function() {
            LoadListingForUpdate();
        };

        function validateUpdateForm()
        {
            let listingId = document.getElementById("listing_id").value.trim();
            let propertyName = document.getElementById("property_name").value.trim();
            let location = document.getElementById("location").value.trim();
            let rent = document.getElementById("rent").value;
            let description = document.getElementById("description").value.trim();
            let status = document.getElementById("status").value;

            if (listingId === "")
            {
                alert("Listing ID Required.");
                return false;
            }

            if (propertyName.length < 3)
            {
                alert("Property name must be at least 3 characters.");
                return false;
            }

            if (location.length < 3)
            {
                alert("Location must be at least 3 characters.");
                return false;
            }

            if (rent === "" || rent <= 0)
            {
                alert("Rent must be greater than 0.");
                return false;
            }

            if (description.length < 10)
            {
                alert("Description must be at least 10 characters.");
                return false;
            }

            if (status === "")
            {
                alert("Please select status.");
                return false;
            }

            UpdateListing();
            return false;
        }
    </script>

</body>
</html>