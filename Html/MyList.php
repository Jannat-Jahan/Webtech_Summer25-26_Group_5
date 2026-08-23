<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>My Listings</title>

    <link rel="stylesheet" href="../Design/OwnerStyle.php">

</head>

<body>

    <div class="Header">

        <h1>Home Rental Management System</h1>

    </div>


    <div class="topnav">

        <a href="Owner.php">
            Dashboard
        </a>

        <a href="AddListing.php">
            Add Listing
        </a>

        <a href="#" class="active">
            My Listings
        </a>

        <a href="MyProfile.php">
            My Profile
        </a>

        <a href="index.html">
            Logout
        </a>

    </div>


    <div class="container">

        <h1>My Listings</h1>


        <table class="my-listings-table" id="my_listings_table">

            <!-- Property 1 -->

            <tr>

                <td>
                    <label for="property1">
                        Property :
                    </label>
                </td>

                <td>
                    <input
                        type="text"
                        id="property1"
                        name="property1"
                        value="Bachelor Room"
                        readonly>
                </td>

            </tr>


            <tr>

                <td>
                    <label for="location1">
                        Location :
                    </label>
                </td>

                <td>
                    <input
                        type="text"
                        id="location1"
                        name="location1"
                        value="Uttara"
                        readonly>
                </td>

            </tr>


            <tr>

                <td>
                    <label for="rent1">
                        Rent :
                    </label>
                </td>

                <td>
                    <input
                        type="text"
                        id="rent1"
                        name="rent1"
                        value="10000 BDT"
                        readonly>
                </td>

            </tr>


            <tr>

                <td>
                    <label for="status1">
                        Status :
                    </label>
                </td>

                <td>
                    <input
                        type="text"
                        id="status1"
                        name="status1"
                        value="Available"
                        readonly>
                </td>

            </tr>


            <tr>

                <td colspan="2">

                    <button
                        type="button"
                        onclick="editListing(1)">
                        Edit
                    </button>

                </td>

            </tr>


            <!-- Property 2 -->

            <tr>

                <td>
                    <label for="property2">
                        Property :
                    </label>
                </td>

                <td>
                    <input
                        type="text"
                        id="property2"
                        name="property2"
                        value="Family Apartment"
                        readonly>
                </td>

            </tr>


            <tr>

                <td>
                    <label for="location2">
                        Location :
                    </label>
                </td>

                <td>
                    <input
                        type="text"
                        id="location2"
                        name="location2"
                        value="Mirpur"
                        readonly>
                </td>

            </tr>


            <tr>

                <td>
                    <label for="rent2">
                        Rent :
                    </label>
                </td>

                <td>
                    <input
                        type="text"
                        id="rent2"
                        name="rent2"
                        value="15000 BDT"
                        readonly>
                </td>

            </tr>


            <tr>

                <td>
                    <label for="status2">
                        Status :
                    </label>
                </td>

                <td>
                    <input
                        type="text"
                        id="status2"
                        name="status2"
                        value="Rented"
                        readonly>
                </td>

            </tr>


            <tr>

                <td colspan="2">

                    <button
                        type="button"
                        onclick="editListing(2)">
                        Edit
                    </button>

                </td>

            </tr>

        </table>

    </div>


    <script>

  

        function loadSavedListings()
        {

            let listings =
                JSON.parse(localStorage.getItem("listings")) || [];


            let table =
                document.getElementById("my_listings_table");


            if(listings.length === 0)
            {
                return;
            }


            listings.forEach(function(listing, index)
            {

                let number = index + 3;


                let rows = `

                    <tr>

                        <td>
                            <label for="saved_property${number}">
                                Property :
                            </label>
                        </td>

                        <td>
                            <input
                                type="text"
                                id="saved_property${number}"
                                name="saved_property${number}"
                                value="${listing.propertyName}"
                                readonly>
                        </td>

                    </tr>


                    <tr>

                        <td>
                            <label for="saved_location${number}">
                                Location :
                            </label>
                        </td>

                        <td>
                            <input
                                type="text"
                                id="saved_location${number}"
                                name="saved_location${number}"
                                value="${listing.location}"
                                readonly>
                        </td>

                    </tr>


                    <tr>

                        <td>
                            <label for="saved_rent${number}">
                                Rent :
                            </label>
                        </td>

                        <td>
                            <input
                                type="text"
                                id="saved_rent${number}"
                                name="saved_rent${number}"
                                value="${listing.rent} BDT"
                                readonly>
                        </td>

                    </tr>


                    <tr>

                        <td>
                            <label for="saved_status${number}">
                                Status :
                            </label>
                        </td>

                        <td>
                            <input
                                type="text"
                                id="saved_status${number}"
                                name="saved_status${number}"
                                value="${listing.status}"
                                readonly>
                        </td>

                    </tr>


                    <tr>

                        <td colspan="2">

                            <button
                                type="button"
                                onclick="editSavedListing(${number})">

                                Edit

                            </button>

                        </td>

                    </tr>

                `;


                table.insertAdjacentHTML(
                    "afterbegin",
                    rows
                );

            });

        }


        function editListing(number) {

            let property =
                document.getElementById("property" + number);

            let location =
                document.getElementById("location" + number);

            let rent =
                document.getElementById("rent" + number);

            let status =
                document.getElementById("status" + number);


            property.removeAttribute("readonly");

            location.removeAttribute("readonly");

            rent.removeAttribute("readonly");

            status.removeAttribute("readonly");


            property.focus();

        }


        function editSavedListing(number) {

            let property =
                document.getElementById("saved_property" + number);

            let location =
                document.getElementById("saved_location" + number);

            let rent =
                document.getElementById("saved_rent" + number);

            let status =
                document.getElementById("saved_status" + number);


            property.removeAttribute("readonly");

            location.removeAttribute("readonly");

            rent.removeAttribute("readonly");

            status.removeAttribute("readonly");


            property.focus();

        }
         window.onload = function()
        {
            loadSavedListings();
        }

    </script>


</body>

</html>