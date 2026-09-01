<?php

include __DIR__ . "/../Model/db.php";

$database = new db();
$connection = $database->connection();

// =========================
// ADD OWNER
// =========================
if (isset($_POST["add_owner"])) {
    $owner_name     = trim($_POST["owner_name"] ?? "");
    $owner_nid      = trim($_POST["owner_nid"] ?? "");
    $owner_address  = trim($_POST["owner_address"] ?? "");
    $owner_dob      = trim($_POST["owner_dob"] ?? "");
    $owner_email    = trim($_POST["owner_email"] ?? "");
    $owner_phone    = trim($_POST["owner_phone"] ?? "");
    $owner_password = trim($_POST["owner_password"] ?? "");
    $owner_username = trim($_POST["owner_username"] ?? "");

    $valid = true;
    $message = "";

    if (empty($owner_name)) {
        $message = "Owner Name is required";
        $valid = false;
    } else if (empty($owner_nid)) {
        $message = "Owner NID is required";
        $valid = false;
    } else if (empty($owner_address)) {
        $message = "Owner Address is required";
        $valid = false;
    } else if (empty($owner_dob)) {
        $message = "Owner Date of Birth is required";
        $valid = false;
    } else if (empty($owner_email)) {
        $message = "Owner Email is required";
        $valid = false;
    } else if (empty($owner_phone)) {
        $message = "Owner Phone is required";
        $valid = false;
    } else if (empty($owner_username)) {
        $message = "Owner Username is required";
        $valid = false;
    } else if (strlen($owner_password) < 5) {
        $message = "Password must be at least 5 characters";
        $valid = false;
    }

    if ($valid) {
        $result = $database->addOwner(
            $connection,
            "owner_info",
            $owner_name,
            $owner_nid,
            $owner_address,
            $owner_dob,
            $owner_email,
            $owner_phone,
            $owner_password,
            $owner_username
        );

        if ($result) {
            echo "<script>
                    alert('Owner Added Successfully!');
                    window.location.href='../View/viewOwners.php';
                  </script>";
            exit();
        } else {
            echo "<script>
                    alert('Database Error!');
                    window.history.back();
                  </script>";
            exit();
        }
    } else {
        echo "<script>
                alert('" . $message . "');
                window.history.back();
              </script>";
        exit();
    }
}

// =========================
// UPDATE OWNER
// =========================
if (isset($_POST["update_owner"])) {
    $owner_id       = trim($_POST["owner_id"] ?? "");
    $owner_name     = trim($_POST["owner_name"] ?? "");
    $owner_nid      = trim($_POST["owner_nid"] ?? "");
    $owner_address  = trim($_POST["owner_address"] ?? "");
    $owner_dob      = trim($_POST["owner_dob"] ?? "");
    $owner_email    = trim($_POST["owner_email"] ?? "");
    $owner_phone    = trim($_POST["owner_phone"] ?? "");
    $owner_username = trim($_POST["owner_username"] ?? "");

    $valid = true;
    $message = "";

    if (empty($owner_id)) {
        $message = "Owner ID is missing";
        $valid = false;
    } else if (empty($owner_name)) {
        $message = "Owner Name is required";
        $valid = false;
    } else if (empty($owner_nid)) {
        $message = "Owner NID is required";
        $valid = false;
    } else if (empty($owner_address)) {
        $message = "Owner Address is required";
        $valid = false;
    } else if (empty($owner_dob)) {
        $message = "Owner Date of Birth is required";
        $valid = false;
    } else if (empty($owner_email)) {
        $message = "Owner Email is required";
        $valid = false;
    } else if (empty($owner_phone)) {
        $message = "Owner Phone is required";
        $valid = false;
    } else if (empty($owner_username)) {
        $message = "Owner Username is required";
        $valid = false;
    }

    if ($valid) {
        $result = $database->updateOwner(
            $connection,
            "owner_info",
            $owner_id,
            $owner_name,
            $owner_nid,
            $owner_address,
            $owner_dob,
            $owner_email,
            $owner_phone,
            $owner_username
        );

        if ($result) {
            echo "<script>
                    alert('Owner Updated Successfully!');
                    window.location.href='../View/viewOwners.php';
                  </script>";
            exit();
        } else {
            echo "<script>
                    alert('Database Update Failed!');
                    window.history.back();
                  </script>";
            exit();
        }
    } else {
        echo "<script>
                alert('" . $message . "');
                window.history.back();
              </script>";
        exit();
    }
}

// =========================
// DELETE OWNER
// =========================
if (isset($_GET["delete_id"])) {
    $owner_id = $_GET["delete_id"];

    $result = $database->deleteOwner(
        $connection,
        "owner_info",
        $owner_id
    );

    if ($result) {
        echo "<script>
                alert('Owner Deleted Successfully!');
                window.location.href='../View/viewOwners.php';
              </script>";
        exit();
    } else {
        echo "<script>
                alert('Delete Failed!');
                window.location.href='../View/viewOwners.php';
              </script>";
        exit();
    }
}
?>
