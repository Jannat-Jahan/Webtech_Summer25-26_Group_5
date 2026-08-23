<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Listing</title>

    <link rel="stylesheet" href="../Design/OwnerStyle.php">
</head>

<body>

    <div class="Header">
        <h1>Home Rental Management System</h1>
    </div>

    <div class="topnav">
        <a href="Owner.php">Dashboard</a>
        <a href="#" class="active">Add Listing</a>
        <a href="MyList.php">My Listings</a>
        <a href="MyProfile.php">My Profile</a>
        <a href="index.html">Logout</a>
    </div>

    <div class="container add-listing-container">

        <h2>Add New Property</h2>

        <form action="#" method="post"
              enctype="multipart/form-data"
              onsubmit="return validateForm()">

            <fieldset>

                <legend>Property Information</legend>

                <table>

                    <tr>
                        <td>
                            <label for="property_name">
                                Property Name
                            </label>
                        </td>

                        <td>
                            <input
                                type="text"
                                id="property_name"
                                name="property_name"
                                placeholder="Enter property name"
                                required
                                minlength="3"
                                maxlength="100">
                        </td>
                    </tr>


                    <!-- Location -->
                    <tr>
                        <td>
                            <label for="location">
                                Location
                            </label>
                        </td>

                        <td>
                            <input
                                type="text"
                                id="location"
                                name="location"
                                placeholder="Enter location"
                                required
                                minlength="3"
                                maxlength="150">
                        </td>
                    </tr>


                    <!-- Rent -->
                    <tr>
                        <td>
                            <label for="rent">
                                Rent
                            </label>
                        </td>

                        <td>
                            <input
                                type="number"
                                id="rent"
                                name="rent"
                                placeholder="Enter monthly rent"
                                min="1"
                                max="10000000"
                                step="1"
                                required>
                        </td>
                    </tr>


                    <!-- Bedrooms -->
                    <tr>
                        <td>
                            <label for="bedrooms">
                                Bedrooms
                            </label>
                        </td>

                        <td>
                            <input
                                type="number"
                                id="bedrooms"
                                name="bedrooms"
                                placeholder="Number of bedrooms"
                                min="1"
                                max="20"
                                step="1"
                                required>
                        </td>
                    </tr>


                    <!-- Bathrooms -->
                    <tr>
                        <td>
                            <label for="bathrooms">
                                Bathrooms
                            </label>
                        </td>

                        <td>
                            <input
                                type="number"
                                id="bathrooms"
                                name="bathrooms"
                                placeholder="Number of bathrooms"
                                min="1"
                                max="20"
                                step="1"
                                required>
                        </td>
                    </tr>


                    <!-- Property Image -->
                    <tr>
                        <td>
                            <label for="property_image">
                                Property Image
                            </label>
                        </td>

                        <td>
                            <input
                                type="file"
                                id="property_image"
                                name="property_image"
                                accept="image/jpeg,image/png,image/jpg">
                        </td>
                    </tr>


                    <!-- Description -->
                    <tr>
                        <td>
                            <label for="description">
                                Description
                            </label>
                        </td>

                        <td>
                            <textarea
                                id="description"
                                name="description"
                                rows="5"
                                placeholder="Enter property description"
                                minlength="10"
                                maxlength="500"
                                required></textarea>
                        </td>
                    </tr>

                </table>

            </fieldset>


            <input
                type="submit"
                value="Add Listing">

            <input
                type="reset"
                value="Reset">

        </form>

    </div>


    <script>

        function validateForm() {

            let propertyName =
                document.getElementById("property_name").value.trim();

            let location =
                document.getElementById("location").value.trim();

            let rent =
                document.getElementById("rent").value;

            let bedrooms =
                document.getElementById("bedrooms").value;

            let bathrooms =
                document.getElementById("bathrooms").value;

            let image =
                document.getElementById("property_image").files[0];

            let description =
                document.getElementById("description").value.trim();


       
            if (propertyName.length < 3) {
                alert("Property name must be at least 3 characters.");
                return false;
            }


         
            if (location.length < 3) {
                alert("Location must be at least 3 characters.");
                return false;
            }


          
            if (rent <= 0) {
                alert("Rent must be greater than 0.");
                return false;
            }


           
            if (bedrooms < 1 || bedrooms > 20) {
                alert("Bedrooms must be between 1 and 20.");
                return false;
            }


           
            if (bathrooms < 1 || bathrooms > 20) {
                alert("Bathrooms must be between 1 and 20.");
                return false;
            }


            if (image) {

                let allowedTypes = [
                    "image/jpeg",
                    "image/jpg",
                    "image/png"
                ];

                if (!allowedTypes.includes(image.type)) {
                    alert("Only JPG, JPEG and PNG images are allowed.");
                    return false;
                }

              
                if (image.size > 5 * 1024 * 1024) {
                    alert("Image size must be less than 5 MB.");
                    return false;
                }
            }


           
            if (description.length < 10) {
                alert("Description must be at least 10 characters.");
                return false;
            }


           

            let listings =
                JSON.parse(localStorage.getItem("listings")) || [];

            let newListing = {

                propertyName: propertyName,

                location: location,

                rent: rent,

                bedrooms: bedrooms,

                bathrooms: bathrooms,

                description: description,

                status: "Available"

            };

            listings.unshift(newListing);

            localStorage.setItem(
                "listings",
                JSON.stringify(listings)
            );


            alert("Listing added successfully!");

            return true;
        }

    </script>

</body>
</html>