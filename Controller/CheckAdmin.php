<?php

include "../Model/db.php";

$username = trim($_POST["username"] ?? "");

if (!$username)
{
    echo "Username Required";
}
else if (strlen($username) < 5)
{
    echo "Username must be at least 5 characters";
}
else
{
    $database = new db();
    $connection = $database->connection();

    $result = $database->CheckAdmin(
        $connection,
        "Admin",
        $username
    );

    if ($result && $result->num_rows > 0)
    {
        echo "Username Already Taken";
    }
    else
    {
        echo "Username Available";
    }
}

?>
