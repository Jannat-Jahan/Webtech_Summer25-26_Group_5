<?php

class db
{
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
        }

        return $connection;
    }


    // ==========================================
    // OWNER MODULE
    // ==========================================

    function CheckOwner($connection, $table = "Owner", $owner_email = "")
    {
        $sql = "SELECT * FROM $table
                WHERE owner_email = '$owner_email'";

        return $connection->query($sql);
    }


    function CheckOwnerUsername($connection, $table = "Owner", $owner_username = "")
    {
        $sql = "SELECT * FROM $table
                WHERE owner_username = '$owner_username'";

        return $connection->query($sql);
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

        return $connection->query($sql);
    }


    function signin($connection, $table = "Owner", $owner_email = "")
    {
        $sql = "SELECT * FROM $table
                WHERE owner_email = '$owner_email'";

        return $connection->query($sql);
    }


    function LoginOwner($connection, $table = "Owner", $email_or_username = "")
    {
        $sql = "SELECT * FROM $table
                WHERE owner_email = '$email_or_username'
                OR owner_username = '$email_or_username'";

        return $connection->query($sql);
    }


    function getOwner($connection, $table = "Owner", $owner_id = 0)
    {
        $sql = "SELECT * FROM $table
                WHERE owner_id = '$owner_id'";

        return $connection->query($sql);
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

        return $connection->query($sql);
    }


    function deleteOwner(
        $connection,
        $table = "Owner",
        $owner_id = 0
    )
    {
        $sql = "DELETE FROM $table
                WHERE owner_id = '$owner_id'";

        return $connection->query($sql);
    }


    function viewOwners($connection, $table = "Owner")
    {
        $sql = "SELECT * FROM $table";

        return $connection->query($sql);
    }


    // ==========================================
    // LISTINGS MODULE
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
        $sql = "INSERT INTO $table
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

            $uploadSql = "INSERT INTO Uploads
                          (owner_id, listing_id)
                          VALUES
                          ('$owner_id', '$listing_id')";

            $connection->query($uploadSql);
        }

        return $result;
    }


    function viewListings($connection, $table = "Listings")
    {
        $sql = "SELECT * FROM $table";

        return $connection->query($sql);
    }


    function getOwnerListings(
        $connection,
        $table = "Listings",
        $owner_id = 0
    )
    {
        $sql = "SELECT l.*
                FROM $table l
                JOIN Uploads u
                ON l.listing_id = u.listing_id
                WHERE u.owner_id = '$owner_id'
                ORDER BY l.listing_id DESC";

        return $connection->query($sql);
    }


    function getRecentListings(
        $connection,
        $table = "Listings",
        $owner_id = 0
    )
    {
        $sql = "SELECT l.*
                FROM $table l
                JOIN Uploads u
                ON l.listing_id = u.listing_id
                WHERE u.owner_id = '$owner_id'
                ORDER BY l.listing_id DESC
                LIMIT 3";

        return $connection->query($sql);
    }


    function getListing(
        $connection,
        $table = "Listings",
        $listing_id = 0,
        $owner_id = 0
    )
    {
        if ($owner_id != 0) {

            $sql = "SELECT l.*
                    FROM $table l
                    JOIN Uploads u
                    ON l.listing_id = u.listing_id
                    WHERE l.listing_id = '$listing_id'
                    AND u.owner_id = '$owner_id'";

        } else {

            $sql = "SELECT * FROM $table
                    WHERE listing_id = '$listing_id'";
        }

        return $connection->query($sql);
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
        if ($owner_id != 0) {

            $checkSql = "SELECT * FROM Uploads
                         WHERE listing_id = '$listing_id'
                         AND owner_id = '$owner_id'";

            $checkResult = $connection->query($checkSql);

            if (!$checkResult || $checkResult->num_rows == 0) {
                return false;
            }
        }

        $sql = "UPDATE $table
                SET
                home_name = '$home_name',
                location = '$location',
                rent = '$rent',
                description = '$description',
                status = '$status'
                WHERE listing_id = '$listing_id'";

        return $connection->query($sql);
    }


    function deleteListing(
        $connection,
        $table = "Listings",
        $listing_id = 0,
        $owner_id = 0
    )
    {
        if ($owner_id != 0) {

            $sqlUploads = "DELETE FROM Uploads
                           WHERE listing_id = '$listing_id'
                           AND owner_id = '$owner_id'";

            $connection->query($sqlUploads);

        } else {

            $sqlUploads = "DELETE FROM Uploads
                           WHERE listing_id = '$listing_id'";

            $connection->query($sqlUploads);
        }

        $sql = "DELETE FROM $table
                WHERE listing_id = '$listing_id'";

        return $connection->query($sql);
    }


    function getAvailableListings(
        $connection,
        $table = "Listings"
    )
    {
        $sql = "SELECT * FROM $table
                WHERE status = 'Available'
                ORDER BY listing_id DESC";

        return $connection->query($sql);
    }


    function searchListings(
        $connection,
        $table = "Listings",
        $location = "",
        $minRent = 0,
        $maxRent = 0
    )
    {
        $sql = "SELECT * FROM $table
                WHERE status = 'Available'";

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

        return $connection->query($sql);
    }


    function getListingById(
        $connection,
        $table = "Listings",
        $listing_id = 0
    )
    {
        $sql = "SELECT * FROM $table
                WHERE listing_id = '$listing_id'";

        return $connection->query($sql);
    }


    // ==========================================
    // TENANT MODULE
    // ==========================================

    function CheckTenant(
        $connection,
        $table = "Tenant",
        $tenant_email = ""
    )
    {
        $sql = "SELECT * FROM $table
                WHERE tenant_email = '$tenant_email'";

        return $connection->query($sql);
    }


    function CheckTenantUsername(
        $connection,
        $table = "Tenant",
        $tenant_username = ""
    )
    {
        $sql = "SELECT * FROM $table
                WHERE tenant_username = '$tenant_username'";

        return $connection->query($sql);
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

        return $connection->query($sql);
    }


    function LoginTenant(
        $connection,
        $table = "Tenant",
        $email_or_username = ""
    )
    {
        $sql = "SELECT * FROM $table
                WHERE tenant_email = '$email_or_username'
                OR tenant_username = '$email_or_username'";

        return $connection->query($sql);
    }


    function getTenant(
        $connection,
        $table = "Tenant",
        $tenant_id = 0
    )
    {
        $sql = "SELECT * FROM $table
                WHERE tenant_id = '$tenant_id'";

        return $connection->query($sql);
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

        return $connection->query($sql);
    }


    function getAllTenants($connection)
    {
        $sql = "SELECT * FROM Tenant
                ORDER BY tenant_id DESC";

        return $connection->query($sql);
    }


    // ==========================================
    // BOOKING MODULE
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

        return $connection->query($sql);
    }


    function getTenantBookings(
        $connection,
        $booking_table = "Books",
        $listing_table = "Listings",
        $tenant_id = 0
    )
    {
        $sql = "SELECT b.*,
                       l.home_name,
                       l.location,
                       l.rent,
                       l.listing_image,
                       l.status AS listing_status
                FROM $booking_table b
                LEFT JOIN $listing_table l
                ON b.listing_id = l.listing_id
                WHERE b.tenant_id = '$tenant_id'
                ORDER BY b.booking_id DESC";

        return $connection->query($sql);
    }


    function getAllBookings($connection)
    {
        $sql = "SELECT b.*,
                       t.tenant_name,
                       t.tenant_email,
                       t.tenant_phone,
                       l.home_name,
                       l.location,
                       l.rent
                FROM Books b
                LEFT JOIN Tenant t
                ON b.tenant_id = t.tenant_id
                LEFT JOIN Listings l
                ON b.listing_id = l.listing_id
                ORDER BY b.booking_id DESC";

        return $connection->query($sql);
    }


    // ==========================================
    // ADMIN MODULE
    // ==========================================

    function CheckAdmin(
        $connection,
        $table = "Admin",
        $username = ""
    )
    {
        $sql = "SELECT * FROM $table
                WHERE username = '$username'";

        return $connection->query($sql);
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

        return $connection->query($sql);
    }


    function LoginAdmin(
        $connection,
        $table = "Admin",
        $username = ""
    )
    {
        $sql = "SELECT * FROM $table
                WHERE username = '$username'";

        return $connection->query($sql);
    }


    function getAllListings($connection)
    {
        $sql = "SELECT l.*,
                       o.owner_name,
                       o.owner_email,
                       o.owner_phone
                FROM Listings l
                LEFT JOIN Uploads u
                ON l.listing_id = u.listing_id
                LEFT JOIN Owner o
                ON u.owner_id = o.owner_id
                ORDER BY l.listing_id DESC";

        return $connection->query($sql);
    }


    function getAllOwners($connection)
    {
        $sql = "SELECT * FROM Owner
                ORDER BY owner_id DESC";

        return $connection->query($sql);
    }
}

?>