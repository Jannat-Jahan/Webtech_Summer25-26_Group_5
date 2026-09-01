
<?php

include "../../Controller/ListingController.php";

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Add Listing - Room Rental System</title>


    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap"
        rel="stylesheet"
    >


    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
    >


    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }


        body {
            background-color: #F8E7D1;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }


        .header-title-bar {
            background-color: #0E1318;
            color: #ffffff;
            padding: 16px 40px;
        }


        .header-title-bar h2 {
            font-size: 1.35rem;
            font-weight: 600;
        }


        .sub-nav {
            background-color: #55CBC7;
            padding: 12px 40px;
            display: flex;
            justify-content: flex-end;
        }


        .nav-links {
            display: flex;
            gap: 30px;
        }


        .nav-links a {
            color: #ffffff;
            text-decoration: none;
            font-size: 0.95rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 8px;
        }


        .nav-links a:hover {
            opacity: 0.85;
            text-decoration: underline;
        }


        .main-container {
            flex: 1;
            display: flex;
            align-items: flex-start;
            justify-content: center;
            padding: 40px 20px;
        }


        .content-card {
            background-color: #ffffff;
            border-radius: 20px;
            padding: 40px;
            width: 100%;
            max-width: 900px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.04);
        }


        .title-text {
            font-size: 1.6rem;
            font-weight: 700;
            color: #111111;
        }


        .underline {
            width: 140px;
            height: 4px;
            background-color: #55CBC7;
            border-radius: 2px;
            margin-top: 8px;
            margin-bottom: 30px;
        }


        .form-group {
            margin-bottom: 20px;
        }


        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 0.9rem;
            font-weight: 600;
            color: #334155;
        }


        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #E2E8F0;
            border-radius: 8px;
            outline: none;
            font-size: 0.9rem;
            background-color: #F8FAFC;
        }


        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            border-color: #55CBC7;
        }


        .form-group textarea {
            min-height: 120px;
            resize: vertical;
        }


        .form-row {
            display: flex;
            gap: 20px;
        }


        .form-row .form-group {
            width: 50%;
        }


        .button-area {
            display: flex;
            gap: 12px;
            margin-top: 25px;
        }


        .btn {
            padding: 12px 22px;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 600;
            cursor: pointer;
        }


        .btn-add {
            background-color: #55CBC7;
            color: #ffffff;
        }


        .btn-add:hover {
            opacity: 0.85;
        }


        .btn-cancel {
            background-color: #E2E8F0;
            color: #334155;
        }


        .btn-cancel:hover {
            opacity: 0.8;
        }


        .footer {
            background-color: #0E1318;
            color: #ffffff;
            text-align: center;
            padding: 22px 20px;
            font-size: 0.88rem;
        }


        @media(max-width:700px)
        {

            .form-row {
                display: block;
            }


            .form-row .form-group {
                width: 100%;
            }


            .nav-links {
                gap: 12px;
                flex-wrap: wrap;
            }


            .content-card {
                padding: 25px;
            }

        }

    </style>

</head>


<body>


<header>


    <div class="header-title-bar">

        <h2>
            Admin Dashboard - Room Rental System
        </h2>

    </div>


    <nav class="sub-nav">

        <div class="nav-links">


            <a href="../dashboard.php">

                <i class="fa-solid fa-gauge"></i>

                Dashboard

            </a>


            <a href="../viewOwners.php">

                <i class="fa-solid fa-user-group"></i>

                View Owners

            </a>


            <a href="../viewTenants.php">

                <i class="fa-solid fa-users"></i>

                View Tenants

            </a>


            <a href="../viewListings.php">

                <i class="fa-solid fa-house"></i>

                View Listings

            </a>


            <a href="../../logout.php">

                <i class="fa-solid fa-arrow-right-from-bracket"></i>

                Logout

            </a>


        </div>

    </nav>

</header>



<main class="main-container">


    <div class="content-card">


        <h1 class="title-text">

            Add New Listing

        </h1>


        <div class="underline"></div>



        <form
            action="../../Controller/ListingController.php"
            method="POST"
            enctype="multipart/form-data"
        >


            <div class="form-row">


                <div class="form-group">

                    <label>
                        Home Name
                    </label>

                    <input
                        type="text"
                        name="home_name"
                        placeholder="Enter home name"
                        required
                    >

                </div>



                <div class="form-group">

                    <label>
                        Location
                    </label>

                    <input
                        type="text"
                        name="location"
                        placeholder="Enter location"
                        required
                    >

                </div>


            </div>



            <div class="form-row">


                <div class="form-group">

                    <label>
                        Rent / Month
                    </label>

                    <input
                        type="number"
                        name="rent"
                        placeholder="Enter monthly rent"
                        min="0"
                        required
                    >

                </div>



                <div class="form-group">

                    <label>
                        Status
                    </label>

                    <select
                        name="status"
                        required
                    >

                        <option value="">
                            Select Status
                        </option>

                        <option value="Available">
                            Available
                        </option>

                        <option value="Rented">
                            Rented
                        </option>

                    </select>

                </div>


            </div>



            <div class="form-group">

                <label>
                    Listing Date
                </label>

                <input
                    type="date"
                    name="listing_date"
                    required
                >

            </div>



            <div class="form-group">

                <label>
                    Description
                </label>

                <textarea
                    name="description"
                    placeholder="Enter listing description"
                    required
                ></textarea>

            </div>



            <div class="form-group">

                <label>
                    Listing Image
                </label>

                <input
                    type="file"
                    name="listing_image"
                    accept=".jpg,.jpeg,.png,.webp"
                    required
                >

            </div>



            <div class="button-area">


                <button
                    type="submit"
                    name="add_listing"
                    class="btn btn-add"
                >

                    <i class="fa-solid fa-plus"></i>

                    Add Listing

                </button>



                <a
                    href="../viewListings.php"
                    class="btn btn-cancel"
                >

                    Cancel

                </a>


            </div>


        </form>


    </div>


</main>



<footer class="footer">

    <p>
        &copy; 2026 Room Rental System. All rights reserved.
    </p>

</footer>


</body>

</html>

