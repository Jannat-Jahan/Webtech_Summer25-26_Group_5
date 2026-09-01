<?php

class db
{
<<<<<<< HEAD
    function connection()
    {
        $connection = mysqli_connect(
            "localhost",
            "root",
            "",
            "home_rental"
        );

        if (!$connection) {
            die("Database Connection Failed: " . mysqli_connect_error());
=======

    function connection()
    {
        $db_host="localhost";
        $db_user="root";
        $db_password="";
        $db_name="admin";

        $connection=new mysqli(
            $db_host,
            $db_user,
            $db_password,
            $db_name
        );

        if($connection->connect_error)
        {
            die("Please Connect the Database");
>>>>>>> 0e011b6 (Admin Done By Tanzila)
        }

        return $connection;
    }

<<<<<<< HEAD
    // ==========================================
    // OWNER MODULE DATABASE FUNCTIONS
    // ==========================================

    function CheckOwner($connection, $table = "Owner", $owner_email = "")
    {
        $sql = "SELECT * FROM $table
                WHERE owner_email = '$owner_email'";

        $result = $connection->query($sql);
        return $result;
    }

    function CheckOwnerUsername($connection, $table = "Owner", $owner_username = "")
    {
        $sql = "SELECT * FROM $table
                WHERE owner_username = '$owner_username'";

        $result = $connection->query($sql);
        return $result;
    }

    function signup(
        $connection,
        $table = "Owner",
        $owner_name = "",
        $owner_username = "",
        $owner_address = "",
        $owner_nid = "",
        $owner_dob = "",
        $owner_email = "",
        $owner_phone = "",
        $password = ""
    )
    {
        $sql = "INSERT INTO $table
        (
            owner_name,
            owner_username,
            owner_address,
            owner_nid,
            owner_dob,
            owner_email,
            owner_phone,
            owner_password
        )
        VALUES
        (
            '$owner_name',
            '$owner_username',
            '$owner_address',
            '$owner_nid',
            '$owner_dob',
            '$owner_email',
            '$owner_phone',
            '$password'
        )";

        $result = $connection->query($sql);
        return $result;
    }

    function signin($connection, $table = "Owner", $owner_email = "")
    {
        $sql = "SELECT * FROM $table
                WHERE owner_email = '$owner_email'";

        $result = $connection->query($sql);
        return $result;
    }

    function LoginOwner($connection, $table = "Owner", $email_or_username = "")
    {
        $sql = "SELECT * FROM $table
                WHERE owner_email = '$email_or_username'
                OR owner_username = '$email_or_username'";

        $result = $connection->query($sql);
        return $result;
    }

    function getOwner($connection, $table = "Owner", $owner_id = 0)
    {
        $sql = "SELECT * FROM $table
                WHERE owner_id = '$owner_id'";

        $result = $connection->query($sql);
        return $result;
    }

    function updateOwner(
        $connection,
        $table = "Owner",
        $owner_id = 0,
        $owner_name = "",
        $owner_username = "",
        $owner_address = "",
        $owner_nid = "",
        $owner_dob = "",
        $owner_email = "",
        $owner_phone = ""
    )
    {
        $sql = "UPDATE $table
                SET
                owner_name = '$owner_name',
                owner_username = '$owner_username',
                owner_address = '$owner_address',
                owner_nid = '$owner_nid',
                owner_dob = '$owner_dob',
                owner_email = '$owner_email',
                owner_phone = '$owner_phone'
                WHERE owner_id = '$owner_id'";

        $result = $connection->query($sql);
=======

    // =========================
    // OWNER FUNCTIONS
    // =========================

    function addOwner(
        $connection,
        $tablename,
        $owner_name,
        $owner_nid,
        $owner_address,
        $owner_dob,
        $owner_email,
        $owner_phone,
        $owner_password,
        $owner_username
    )
    {
        $sql="INSERT INTO ".$tablename."
        (
            owner_name,
            owner_nid,
            owner_address,
            owner_dob,
            owner_email,
            owner_phone,
            owner_password,
            owner_username
        )
        VALUES
        (
            '".$owner_name."',
            '".$owner_nid."',
            '".$owner_address."',
            '".$owner_dob."',
            '".$owner_email."',
            '".$owner_phone."',
            '".$owner_password."',
            '".$owner_username."'
        )";

        $result=$connection->query($sql);

        return $result;
    }


    function viewOwners(
        $connection,
        $tablename
    )
    {
        $sql="SELECT * FROM ".$tablename;

        $result=$connection->query($sql);

        return $result;
    }


    function getOwner(
        $connection,
        $tablename,
        $owner_id
    )
    {
        $sql="SELECT * FROM ".$tablename."
        WHERE owner_id='".$owner_id."'";

        $result=$connection->query($sql);

        return $result;
    }


    function updateOwner(
        $connection,
        $tablename,
        $owner_id,
        $owner_name,
        $owner_nid,
        $owner_address,
        $owner_dob,
        $owner_email,
        $owner_phone,
        $owner_username
    )
    {
        $sql="UPDATE ".$tablename." SET
        owner_name='".$owner_name."',
        owner_nid='".$owner_nid."',
        owner_address='".$owner_address."',
        owner_dob='".$owner_dob."',
        owner_email='".$owner_email."',
        owner_phone='".$owner_phone."',
        owner_username='".$owner_username."'
        WHERE owner_id='".$owner_id."'";

        $result=$connection->query($sql);

>>>>>>> 0e011b6 (Admin Done By Tanzila)
        return $result;
    }


<<<<<<< HEAD
    // ==========================================
    // LISTINGS & UPLOADS MODULE DATABASE FUNCTIONS
    // ==========================================

    function addListing(
        $connection,
        $table = "Listings",
        $owner_id = 0,
        $home_name = "",
        $location = "",
        $rent = 0,
        $description = "",
        $listing_date = "",
        $status = "Available",
        $listing_image = ""
    )
    {
        // 1. Insert property into Listings table
        $sql = "INSERT INTO $table
=======
    function deleteOwner(
        $connection,
        $tablename,
        $owner_id
    )
    {
        $sql="DELETE FROM ".$tablename."
        WHERE owner_id='".$owner_id."'";

        $result=$connection->query($sql);

        return $result;
    }


    // =========================
    // LISTING FUNCTIONS
    // =========================

    function addListing(
        $connection,
        $tablename,
        $rent,
        $status,
        $listing_date,
        $location,
        $home_name,
        $description,
        $listing_image
    )
    {
        $sql="INSERT INTO ".$tablename."
>>>>>>> 0e011b6 (Admin Done By Tanzila)
        (
            rent,
            status,
            listing_date,
            location,
            home_name,
            description,
            listing_image
        )
        VALUES
        (
<<<<<<< HEAD
            '$rent',
            '$status',
            '$listing_date',
            '$location',
            '$home_name',
            '$description',
            '$listing_image'
        )";

        $result = $connection->query($sql);

        if ($result) {
            $listing_id = $connection->insert_id;

            // 2. Insert relationship into Uploads table
            $uploadSql = "INSERT INTO Uploads (owner_id, listing_id)
                          VALUES ('$owner_id', '$listing_id')";
            $connection->query($uploadSql);
        }
=======
            '".$rent."',
            '".$status."',
            '".$listing_date."',
            '".$location."',
            '".$home_name."',
            '".$description."',
            '".$listing_image."'
        )";

        $result=$connection->query($sql);
>>>>>>> 0e011b6 (Admin Done By Tanzila)

        return $result;
    }

<<<<<<< HEAD
    function getOwnerListings($connection, $table = "Listings", $owner_id = 0)
    {
        $sql = "SELECT l.*
                FROM $table l
                JOIN Uploads u ON l.listing_id = u.listing_id
                WHERE u.owner_id = '$owner_id'
                ORDER BY l.listing_id DESC";

        $result = $connection->query($sql);
        return $result;
    }

    function getRecentListings($connection, $table = "Listings", $owner_id = 0)
    {
        $sql = "SELECT l.*
                FROM $table l
                JOIN Uploads u ON l.listing_id = u.listing_id
                WHERE u.owner_id = '$owner_id'
                ORDER BY l.listing_id DESC
                LIMIT 3";

        $result = $connection->query($sql);
        return $result;
    }

    function getListing($connection, $table = "Listings", $listing_id = 0, $owner_id = 0)
    {
        $sql = "SELECT l.*
                FROM $table l
                JOIN Uploads u ON l.listing_id = u.listing_id
                WHERE l.listing_id = '$listing_id'
                AND u.owner_id = '$owner_id'";

        $result = $connection->query($sql);
        return $result;
    }

    function updateListing(
        $connection,
        $table = "Listings",
        $listing_id = 0,
        $owner_id = 0,
        $home_name = "",
        $location = "",
        $rent = 0,
        $description = "",
        $status = "Available"
    )
    {
        // Verify owner via Uploads table first
        $checkSql = "SELECT * FROM Uploads WHERE listing_id = '$listing_id' AND owner_id = '$owner_id'";
        $checkResult = $connection->query($checkSql);

        if ($checkResult && $checkResult->num_rows > 0) {
            $sql = "UPDATE $table
                    SET
                    home_name = '$home_name',
                    location = '$location',
                    rent = '$rent',
                    description = '$description',
                    status = '$status'
                    WHERE listing_id = '$listing_id'";

            $result = $connection->query($sql);
            return $result;
        }

        return false;
    }

    function deleteListing($connection, $table = "Listings", $listing_id = 0, $owner_id = 0)
    {
        // Delete relationship from Uploads first
        $sqlUploads = "DELETE FROM Uploads
                       WHERE listing_id = '$listing_id'
                       AND owner_id = '$owner_id'";
        $connection->query($sqlUploads);

        // Delete listing record from Listings
        $sql = "DELETE FROM $table
                WHERE listing_id = '$listing_id'";

        $result = $connection->query($sql);
        return $result;
    }

    function getAvailableListings($connection, $table = "Listings")
    {
        $sql = "SELECT * FROM $table
                WHERE status = 'Available'
                ORDER BY listing_id DESC";

        $result = $connection->query($sql);
        return $result;
    }

    function searchListings($connection, $table = "Listings", $location = "", $minRent = 0, $maxRent = 0)
    {
        $sql = "SELECT * FROM $table WHERE status = 'Available'";

        if (!empty($location)) {
            $sql .= " AND location LIKE '%$location%'";
        }

        if (!empty($minRent) && is_numeric($minRent) && $minRent > 0) {
            $sql .= " AND rent >= $minRent";
        }

        if (!empty($maxRent) && is_numeric($maxRent) && $maxRent > 0) {
            $sql .= " AND rent <= $maxRent";
        }

        $sql .= " ORDER BY listing_id DESC";

        $result = $connection->query($sql);
        return $result;
    }

    function getListingById($connection, $table = "Listings", $listing_id = 0)
    {
        $sql = "SELECT * FROM $table
                WHERE listing_id = '$listing_id'";

        $result = $connection->query($sql);
=======

    function viewListings(
        $connection,
        $tablename
    )
    {
        $sql="SELECT * FROM ".$tablename;

        $result=$connection->query($sql);

        return $result;
    }


    function getListing(
        $connection,
        $tablename,
        $listing_id
    )
    {
        $sql="SELECT * FROM ".$tablename."
        WHERE listing_id='".$listing_id."'";

        $result=$connection->query($sql);

        return $result;
    }


    function updateListing(
        $connection,
        $tablename,
        $listing_id,
        $rent,
        $status,
        $listing_date,
        $location,
        $home_name,
        $description,
        $listing_image
    )
    {
        $sql="UPDATE ".$tablename." SET
        rent='".$rent."',
        status='".$status."',
        listing_date='".$listing_date."',
        location='".$location."',
        home_name='".$home_name."',
        description='".$description."',
        listing_image='".$listing_image."'
        WHERE listing_id='".$listing_id."'";

        $result=$connection->query($sql);

>>>>>>> 0e011b6 (Admin Done By Tanzila)
        return $result;
    }


<<<<<<< HEAD
    // ==========================================
    // TENANT MODULE DATABASE FUNCTIONS
    // ==========================================

    function CheckTenant($connection, $table = "Tenant", $tenant_email = "")
    {
        $sql = "SELECT * FROM $table
                WHERE tenant_email = '$tenant_email'";

        $result = $connection->query($sql);
        return $result;
    }

    function CheckTenantUsername($connection, $table = "Tenant", $tenant_username = "")
    {
        $sql = "SELECT * FROM $table
                WHERE tenant_username = '$tenant_username'";

        $result = $connection->query($sql);
        return $result;
    }

    function signupTenant(
        $connection,
        $table = "Tenant",
        $tenant_name = "",
        $tenant_username = "",
        $tenant_email = "",
        $tenant_phone = "",
        $tenant_address = "",
        $tenant_dob = "",
        $tenant_password = "",
        $tenant_nid = ""
    )
    {
        $sql = "INSERT INTO $table
        (
            tenant_name,
            tenant_username,
            tenant_email,
            tenant_phone,
            tenant_address,
            tenant_dob,
            tenant_password,
            tenant_nid
        )
        VALUES
        (
            '$tenant_name',
            '$tenant_username',
            '$tenant_email',
            '$tenant_phone',
            '$tenant_address',
            '$tenant_dob',
            '$tenant_password',
            '$tenant_nid'
        )";

        $result = $connection->query($sql);
        return $result;
    }

    function LoginTenant($connection, $table = "Tenant", $email_or_username = "")
    {
        $sql = "SELECT * FROM $table
                WHERE tenant_email = '$email_or_username'
                OR tenant_username = '$email_or_username'";

        $result = $connection->query($sql);
        return $result;
    }

    function getTenant($connection, $table = "Tenant", $tenant_id = 0)
    {
        $sql = "SELECT * FROM $table
                WHERE tenant_id = '$tenant_id'";

        $result = $connection->query($sql);
        return $result;
    }

    function updateTenant(
        $connection,
        $table = "Tenant",
        $tenant_id = 0,
        $tenant_name = "",
        $tenant_username = "",
        $tenant_email = "",
        $tenant_phone = "",
        $tenant_address = "",
        $tenant_dob = "",
        $tenant_nid = ""
    )
    {
        $sql = "UPDATE $table
                SET
                tenant_name = '$tenant_name',
                tenant_username = '$tenant_username',
                tenant_email = '$tenant_email',
                tenant_phone = '$tenant_phone',
                tenant_address = '$tenant_address',
                tenant_dob = '$tenant_dob',
                tenant_nid = '$tenant_nid'
                WHERE tenant_id = '$tenant_id'";

        $result = $connection->query($sql);
        return $result;
    }


    // ==========================================
    // BOOKS (BOOKINGS) MODULE DATABASE FUNCTIONS
    // ==========================================

    function addBooking(
        $connection,
        $table = "Books",
        $tenant_id = 0,
        $listing_id = 0,
        $booking_date = "",
        $move_in_date = "",
        $transaction_id = "",
        $payment_number = "",
        $student_card = ""
    )
    {
        $sql = "INSERT INTO $table
        (
            tenant_id,
            listing_id,
            booking_date,
            move_in_date,
            transaction_id,
            payment_number,
            student_card
        )
        VALUES
        (
            '$tenant_id',
            '$listing_id',
            '$booking_date',
            '$move_in_date',
            '$transaction_id',
            '$payment_number',
            '$student_card'
        )";

        $result = $connection->query($sql);
        return $result;
    }

    function getTenantBookings($connection, $booking_table = "Books", $listing_table = "Listings", $tenant_id = 0)
    {
        $sql = "SELECT b.*, l.home_name, l.location, l.rent, l.listing_image, l.status AS listing_status
                FROM $booking_table b
                LEFT JOIN $listing_table l ON b.listing_id = l.listing_id
                WHERE b.tenant_id = '$tenant_id'
                ORDER BY b.booking_id DESC";

        $result = $connection->query($sql);
        return $result;
    }


    // ==========================================
    // ADMIN MODULE DATABASE FUNCTIONS
    // ==========================================

    function CheckAdmin($connection, $table = "Admin", $username = "")
    {
        $sql = "SELECT * FROM $table
                WHERE username = '$username'";

        $result = $connection->query($sql);
        return $result;
    }

    function signupAdmin(
        $connection,
        $table = "Admin",
        $admin_name = "",
        $username = "",
        $password = ""
    )
    {
        $sql = "INSERT INTO $table
        (
            admin_name,
            username,
            password
        )
        VALUES
        (
            '$admin_name',
            '$username',
            '$password'
        )";

        $result = $connection->query($sql);
        return $result;
    }

    function LoginAdmin($connection, $table = "Admin", $username = "")
    {
        $sql = "SELECT * FROM $table
                WHERE username = '$username'";

        $result = $connection->query($sql);
        return $result;
    }

    function getAllListings($connection)
    {
        $sql = "SELECT l.*, o.owner_name, o.owner_email, o.owner_phone
                FROM Listings l
                LEFT JOIN Uploads u ON l.listing_id = u.listing_id
                LEFT JOIN Owner o ON u.owner_id = o.owner_id
                ORDER BY l.listing_id DESC";

        $result = $connection->query($sql);
        return $result;
    }

    function getAllOwners($connection)
    {
        $sql = "SELECT * FROM Owner ORDER BY owner_id DESC";
        return $connection->query($sql);
    }

    function getAllTenants($connection)
    {
        $sql = "SELECT * FROM Tenant ORDER BY tenant_id DESC";
        return $connection->query($sql);
    }

    function getAllBookings($connection)
    {
        $sql = "SELECT b.*, t.tenant_name, t.tenant_email, t.tenant_phone, l.home_name, l.location, l.rent
                FROM Books b
                LEFT JOIN Tenant t ON b.tenant_id = t.tenant_id
                LEFT JOIN Listings l ON b.listing_id = l.listing_id
                ORDER BY b.booking_id DESC";

        return $connection->query($sql);
    }
}

?>
=======
    function deleteListing(
        $connection,
        $tablename,
        $listing_id
    )
    {
        $sql="DELETE FROM ".$tablename."
        WHERE listing_id='".$listing_id."'";

        $result=$connection->query($sql);

        return $result;
    }

}

?>
>>>>>>> 0e011b6 (Admin Done By Tanzila)
