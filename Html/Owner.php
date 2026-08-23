<!DOCTYPE html>
<html lang="en-US">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Owner Dashboard</title>

    <link rel="stylesheet" href="../Design/OwnerStyle.php">


    <script>

        function loadRecentListings()
        {
            let listings = JSON.parse(localStorage.getItem("listings")) || [];

            let recentListings = listings.slice(0, 3);

            let table = document.getElementById("recent_listings");

            table.innerHTML = "";


            if(recentListings.length === 0)
            {
                table.innerHTML = `
                    <tr>
                        <td colspan="8">
                            No recent listings available.
                        </td>
                    </tr>
                `;

                return;
            }


            recentListings.forEach(function(listing, index)
            {

                let number = index + 1;

                table.innerHTML += `

                    <tr id="listing${number}">

                        <td>
                            <label for="property${number}">
                                Property:
                            </label>
                        </td>

                        <td>
                            <input
                                type="text"
                                id="property${number}"
                                name="property${number}"
                                value="${listing.propertyName}"
                                readonly>
                        </td>

                        <td>
                            <label for="location${number}">
                                Location:
                            </label>
                        </td>

                        <td>
                            <input
                                type="text"
                                id="location${number}"
                                name="location${number}"
                                value="${listing.location}"
                                readonly>
                        </td>

                        <td>
                            <label for="rent${number}">
                                Rent:
                            </label>
                        </td>

                        <td>
                            <input
                                type="text"
                                id="rent${number}"
                                name="rent${number}"
                                value="${listing.rent} BDT"
                                readonly>
                        </td>

                        <td>
                            <label for="status${number}">
                                Status:
                            </label>
                        </td>

                        <td>
                            <input
                                type="text"
                                id="status${number}"
                                name="status${number}"
                                value="${listing.status}"
                                readonly>
                        </td>

                    </tr>

                `;

            });

        }


        window.onload = function()
        {
            loadRecentListings();
        }

    </script>


</head>

<body>

<div class="position">

    <div class="Header" id="header">

        <h1 id="system_title">
            Home Rental Management System
        </h1>

    </div>


    <div class="topnav" id="top_navigation">

        <a href="Owner.php"
           id="dashboard_link"
           name="dashboard">

            Dashboard

        </a>


        <a href="AddListing.php"
           id="add_listing_link"
           name="add_listing">

            Add Listing

        </a>


        <a href="MyList.php"
           id="my_listings_link"
           name="my_listings">

            My Listings

        </a>


        <a href="MyProfile.php"
           id="my_profile_link"
           name="my_profile">

            My Profile

        </a>


        <a href="index.html"
           id="logout_link"
           name="logout">

            Logout

        </a>

    </div>

</div>


<div class="container" id="dashboard_container">

    <h1 id="dashboard_title">

        Owner Dashboard

    </h1>


    <fieldset id="welcome_section">

        <legend id="welcome_title">

            Welcome Back, Owner

        </legend>


        <p id="welcome_message">

            Here's an overview of your rental properties today.

        </p>

    </fieldset>


    <h2 id="recent_title">

        Recent Listings

    </h2>


    <table id="recent_listings"
           name="recent_listings">

    </table>


</div>


</body>

</html>