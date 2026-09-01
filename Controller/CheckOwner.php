<?php

include "../Model/db.php";

$owner_email = trim($_POST["owner_email"] ?? "");

if (!$owner_email)
{
    echo "Email Required";
}
else
{
    $database = new db();
    $connection = $database->connection();

    $result = $database->CheckOwner(
        $connection,
        "Owner",
        $owner_email
    );

    if ($result && $result->num_rows > 0)
    {
        echo "Email Already Taken";
    }
    else
    {
        echo "Email Available";
    }
}

?>