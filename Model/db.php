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
}

?>