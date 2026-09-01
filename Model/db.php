<?php

class db
{
    function connection()
    {
        $connection=mysqli_connect(
            "localhost",
            "root",
            "",
            "home_rental"
        );

        return $connection;
    }


    function CheckOwner($connection,$table,$owner_email)
    {
        $sql="SELECT * FROM $table
              WHERE owner_email='$owner_email'";

        $result=$connection->query($sql);
        return $result;
    }


    function signup(
        $connection,
        $table,
        $owner_name,
        $owner_dob,
        $owner_phone,
        $owner_email,
        $owner_address,
        $owner_nid,
        $password
    )
    {
        $sql="INSERT INTO $table
        (
            owner_name,
            owner_dob,
            owner_phone,
            owner_email,
            owner_address,
            owner_nid,
            password
        )
        VALUES
        (
            '$owner_name',
            '$owner_dob',
            '$owner_phone',
            '$owner_email',
            '$owner_address',
            '$owner_nid',
            '$password'
        )";

        $result=$connection->query($sql);
        return $result;
    }


    function signin($connection,$table,$owner_email)
    {
        $sql="SELECT * FROM $table
              WHERE owner_email='$owner_email'";

        $result=$connection->query($sql);
        return $result;
    }


    function addListing(
        $connection,
        $table,
        $owner_id,
        $home_name,
        $location,
        $rent,
        $description,
        $listing_date,
        $status,
        $property_image
    )
    {
        $sql="INSERT INTO $table
        (
            owner_id,
            home_name,
            location,
            rent,
            description,
            listing_date,
            status,
            property_image
        )
        VALUES
        (
            '$owner_id',
            '$home_name',
            '$location',
            '$rent',
            '$description',
            '$listing_date',
            '$status',
            '$property_image'
        )";

        $result=$connection->query($sql);
        return $result;
    }


    function getOwnerListings($connection,$table,$owner_id)
    {
        $sql="SELECT * FROM $table
              WHERE owner_id='$owner_id'
              ORDER BY listing_id DESC";

        $result=$connection->query($sql);
        return $result;
    }


    function getRecentListings($connection,$table,$owner_id)
    {
        $sql="SELECT * FROM $table
              WHERE owner_id='$owner_id'
              ORDER BY listing_id DESC
              LIMIT 3";

        $result=$connection->query($sql);
        return $result;
    }


    function getListing($connection,$table,$listing_id,$owner_id)
    {
        $sql="SELECT * FROM $table
              WHERE listing_id='$listing_id'
              AND owner_id='$owner_id'";

        $result=$connection->query($sql);
        return $result;
    }


    function updateListing(
        $connection,
        $table,
        $listing_id,
        $owner_id,
        $home_name,
        $location,
        $rent,
        $description,
        $status
    )
    {
        $sql="UPDATE $table
              SET
              home_name='$home_name',
              location='$location',
              rent='$rent',
              description='$description',
              status='$status'
              WHERE listing_id='$listing_id'
              AND owner_id='$owner_id'";

        $result=$connection->query($sql);
        return $result;
    }


    function deleteListing(
        $connection,
        $table,
        $listing_id,
        $owner_id
    )
    {
        $sql="DELETE FROM $table
              WHERE listing_id='$listing_id'
              AND owner_id='$owner_id'";

        $result=$connection->query($sql);
        return $result;
    }


    function getOwner($connection,$table,$owner_id)
    {
        $sql="SELECT * FROM $table
              WHERE owner_id='$owner_id'";

        $result=$connection->query($sql);
        return $result;
    }


    function updateOwner(
        $connection,
        $table,
        $owner_id,
        $owner_name,
        $owner_dob,
        $owner_phone,
        $owner_email,
        $owner_address,
        $owner_nid
    )
    {
        $sql="UPDATE $table
              SET
              owner_name='$owner_name',
              owner_dob='$owner_dob',
              owner_phone='$owner_phone',
              owner_email='$owner_email',
              owner_address='$owner_address',
              owner_nid='$owner_nid'
              WHERE owner_id='$owner_id'";

        $result=$connection->query($sql);
        return $result;
    }
    function LoginOwner($connection, $table, $owner_email)
    {
        $sql = "SELECT * FROM $table
                WHERE owner_email='$owner_email'";

        $result = $connection->query($sql);
        return $result;
    }


    // ==========================================
    // TENANT MODULE DATABASE FUNCTIONS
    // ==========================================

    function CheckTenant($connection,$table,$tenant_email)
    {
        $sql="SELECT * FROM $table
              WHERE tenant_email='$tenant_email'";

        $result=$connection->query($sql);
        return $result;
    }


    function CheckTenantUsername($connection, $table, $tenant_username)
    {
        $sql = "SELECT * FROM $table
                WHERE tenant_username='$tenant_username'";

        $result = $connection->query($sql);
        return $result;
    }


    function signupTenant(
        $connection,
        $table,
        $tenant_name,
        $tenant_username,
        $tenant_dob,
        $tenant_phone,
        $tenant_email,
        $tenant_address,
        $tenant_nid,
        $tenant_password
    )
    {
        $sql="INSERT INTO $table
        (
            tenant_name,
            tenant_username,
            tenant_dob,
            tenant_phone,
            tenant_email,
            tenant_address,
            tenant_nid,
            tenant_password
        )
        VALUES
        (
            '$tenant_name',
            '$tenant_username',
            '$tenant_dob',
            '$tenant_phone',
            '$tenant_email',
            '$tenant_address',
            '$tenant_nid',
            '$tenant_password'
        )";

        $result=$connection->query($sql);
        return $result;
    }


    function LoginTenant($connection, $table, $email_or_username)
    {
        $sql = "SELECT * FROM $table
                WHERE tenant_email='$email_or_username'
                OR tenant_username='$email_or_username'";

        $result = $connection->query($sql);
        return $result;
    }


    function getTenant($connection, $table, $tenant_id)
    {
        $sql = "SELECT * FROM $table
                WHERE tenant_id='$tenant_id'";

        $result = $connection->query($sql);
        return $result;
    }


    function updateTenant(
        $connection,
        $table,
        $tenant_id,
        $tenant_name,
        $tenant_username,
        $tenant_dob,
        $tenant_phone,
        $tenant_email,
        $tenant_address,
        $tenant_nid
    )
    {
        $sql = "UPDATE $table
                SET
                tenant_name='$tenant_name',
                tenant_username='$tenant_username',
                tenant_dob='$tenant_dob',
                tenant_phone='$tenant_phone',
                tenant_email='$tenant_email',
                tenant_address='$tenant_address',
                tenant_nid='$tenant_nid'
                WHERE tenant_id='$tenant_id'";

        $result = $connection->query($sql);
        return $result;
    }


    function getAvailableListings($connection, $table = "Listings")
    {
        $sql = "SELECT * FROM $table
                WHERE status='Available'
                ORDER BY listing_id DESC";

        $result = $connection->query($sql);
        if (!$result)
        {
            $result = $connection->query("SELECT * FROM listing WHERE status='Available' ORDER BY listing_id DESC");
        }
        return $result;
    }


    function searchListings($connection, $table = "Listings", $location = "", $minRent = 0, $maxRent = 0)
    {
        $sql = "SELECT * FROM $table WHERE status='Available'";

        if (!empty($location))
        {
            $sql .= " AND location LIKE '%$location%'";
        }

        if (!empty($minRent) && is_numeric($minRent) && $minRent > 0)
        {
            $sql .= " AND rent >= $minRent";
        }

        if (!empty($maxRent) && is_numeric($maxRent) && $maxRent > 0)
        {
            $sql .= " AND rent <= $maxRent";
        }

        $sql .= " ORDER BY listing_id DESC";

        $result = $connection->query($sql);
        if (!$result)
        {
            $sql2 = str_replace("SELECT * FROM $table", "SELECT * FROM listing", $sql);
            $result = $connection->query($sql2);
        }
        return $result;
    }


    function getListingById($connection, $table = "Listings", $listing_id = 0)
    {
        $sql = "SELECT * FROM $table
                WHERE listing_id='$listing_id'";

        $result = $connection->query($sql);
        if (!$result)
        {
            $result = $connection->query("SELECT * FROM listing WHERE listing_id='$listing_id'");
        }
        return $result;
    }


    function addBooking(
        $connection,
        $table,
        $tenant_id,
        $listing_id,
        $booking_date,
        $move_in_date,
        $payment_number,
        $transaction_id,
        $student_card
    )
    {
        $sql = "INSERT INTO $table
        (
            tenant_id,
            listing_id,
            booking_date,
            move_in_date,
            payment_number,
            transaction_id,
            student_card
        )
        VALUES
        (
            '$tenant_id',
            '$listing_id',
            '$booking_date',
            '$move_in_date',
            '$payment_number',
            '$transaction_id',
            '$student_card'
        )";

        $result = $connection->query($sql);
        return $result;
    }


    function getTenantBookings($connection, $booking_table, $listing_table, $tenant_id)
    {
        $sql = "SELECT b.*, l.home_name, l.location, l.rent, l.status AS listing_status
                FROM $booking_table b
                LEFT JOIN $listing_table l ON b.listing_id = l.listing_id
                WHERE b.tenant_id = '$tenant_id'
                ORDER BY b.booking_id DESC";

        $result = $connection->query($sql);
        if (!$result)
        {
            // Fallback if table name difference occurs
            $sql2 = "SELECT * FROM $booking_table WHERE tenant_id = '$tenant_id' ORDER BY booking_id DESC";
            $result = $connection->query($sql2);
        }
        return $result;
    }
}

?>


