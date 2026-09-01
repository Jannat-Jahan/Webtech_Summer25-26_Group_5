<?php

include __DIR__ . "/../Model/db.php";

$database = new db();
$connection = $database->connection();

// =========================
// ADD TENANT
// =========================
if (isset($_POST["add_tenant"])) {
    $tenant_name     = trim($_POST["tenant_name"] ?? "");
    $tenant_nid      = trim($_POST["tenant_nid"] ?? "");
    $tenant_address  = trim($_POST["tenant_address"] ?? "");
    $tenant_dob      = trim($_POST["tenant_dob"] ?? "");
    $tenant_email    = trim($_POST["tenant_email"] ?? "");
    $tenant_phone    = trim($_POST["tenant_phone"] ?? "");
    $tenant_password = trim($_POST["tenant_password"] ?? "");
    $tenant_username = trim($_POST["tenant_username"] ?? "");

    $valid = true;
    $message = "";

    if (empty($tenant_name)) {
        $message = "Tenant Name is required";
        $valid = false;
    } else if (empty($tenant_nid)) {
        $message = "Tenant NID is required";
        $valid = false;
    } else if (empty($tenant_address)) {
        $message = "Tenant Address is required";
        $valid = false;
    } else if (empty($tenant_dob)) {
        $message = "Tenant Date of Birth is required";
        $valid = false;
    } else if (empty($tenant_email)) {
        $message = "Tenant Email is required";
        $valid = false;
    } else if (empty($tenant_phone)) {
        $message = "Tenant Phone is required";
        $valid = false;
    } else if (empty($tenant_username)) {
        $message = "Tenant Username is required";
        $valid = false;
    } else if (strlen($tenant_password) < 5) {
        $message = "Password must be at least 5 characters";
        $valid = false;
    }

    if ($valid) {
        $result = $database->addTenant(
            $connection,
            "tenant_info",
            $tenant_name,
            $tenant_nid,
            $tenant_address,
            $tenant_dob,
            $tenant_email,
            $tenant_phone,
            $tenant_password,
            $tenant_username
        );

        if ($result) {
            echo "<script>
                    alert('Tenant Added Successfully!');
                    window.location.href='../View/viewTenants.php';
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
// UPDATE TENANT
// =========================
if (isset($_POST["update_tenant"])) {
    $tenant_id       = trim($_POST["tenant_id"] ?? "");
    $tenant_name     = trim($_POST["tenant_name"] ?? "");
    $tenant_nid      = trim($_POST["tenant_nid"] ?? "");
    $tenant_address  = trim($_POST["tenant_address"] ?? "");
    $tenant_dob      = trim($_POST["tenant_dob"] ?? "");
    $tenant_email    = trim($_POST["tenant_email"] ?? "");
    $tenant_phone    = trim($_POST["tenant_phone"] ?? "");
    $tenant_username = trim($_POST["tenant_username"] ?? "");

    $valid = true;
    $message = "";

    if (empty($tenant_id)) {
        $message = "Tenant ID is missing";
        $valid = false;
    } else if (empty($tenant_name)) {
        $message = "Tenant Name is required";
        $valid = false;
    } else if (empty($tenant_nid)) {
        $message = "Tenant NID is required";
        $valid = false;
    } else if (empty($tenant_address)) {
        $message = "Tenant Address is required";
        $valid = false;
    } else if (empty($tenant_dob)) {
        $message = "Tenant Date of Birth is required";
        $valid = false;
    } else if (empty($tenant_email)) {
        $message = "Tenant Email is required";
        $valid = false;
    } else if (empty($tenant_phone)) {
        $message = "Tenant Phone is required";
        $valid = false;
    } else if (empty($tenant_username)) {
        $message = "Tenant Username is required";
        $valid = false;
    }

    if ($valid) {
        $result = $database->updateTenant(
            $connection,
            "tenant_info",
            $tenant_id,
            $tenant_name,
            $tenant_nid,
            $tenant_address,
            $tenant_dob,
            $tenant_email,
            $tenant_phone,
            $tenant_username
        );

        if ($result) {
            echo "<script>
                    alert('Tenant Updated Successfully!');
                    window.location.href='../View/viewTenants.php';
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
// DELETE TENANT
// =========================
if (isset($_GET["delete_id"])) {
    $tenant_id = $_GET["delete_id"];

    $result = $database->deleteTenant(
        $connection,
        "tenant_info",
        $tenant_id
    );

    if ($result) {
        echo "<script>
                alert('Tenant Deleted Successfully!');
                window.location.href='../View/viewTenants.php';
              </script>";
        exit();
    } else {
        echo "<script>
                alert('Delete Failed!');
                window.location.href='../View/viewTenants.php';
              </script>";
        exit();
    }
}
?>
