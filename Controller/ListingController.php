<?php

include __DIR__ . "/../Model/db.php";

$database = new db();
$connection = $database->connection();

// =========================
// ADD LISTING
// =========================
if (isset($_POST["add_listing"])) {
    $rent         = trim($_POST["rent"] ?? "");
    $status       = trim($_POST["status"] ?? "");
    $listing_date = trim($_POST["listing_date"] ?? "");
    $location     = trim($_POST["location"] ?? "");
    $home_name    = trim($_POST["home_name"] ?? "");
    $description  = trim($_POST["description"] ?? "");

    $valid = true;
    $message = "";

    if (empty($rent)) {
        $message = "Rent is required";
        $valid = false;
    } else if (!is_numeric($rent)) {
        $message = "Rent must be a number";
        $valid = false;
    }

    if (empty($status)) {
        $message = "Status is required";
        $valid = false;
    }

    if (empty($listing_date)) {
        $message = "Listing date is required";
        $valid = false;
    }

    if (empty($location)) {
        $message = "Location is required";
        $valid = false;
    }

    if (empty($home_name)) {
        $message = "Home name is required";
        $valid = false;
    }

    if (empty($description)) {
        $message = "Description is required";
        $valid = false;
    }

    if (!isset($_FILES["listing_image"]) || $_FILES["listing_image"]["error"] != 0) {
        $message = "Please select a listing image";
        $valid = false;
    }

    if ($valid) {
        $image_name = $_FILES["listing_image"]["name"];
        $image_tmp  = $_FILES["listing_image"]["tmp_name"];
        $image_extension = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
        $allowed_extensions = array("jpg", "jpeg", "png", "webp");

        if (!in_array($image_extension, $allowed_extensions)) {
            $message = "Only JPG, JPEG, PNG and WEBP images are allowed";
            $valid = false;
        }

        if ($valid) {
            $new_image_name = time() . "_" . preg_replace("/[^a-zA-Z0-9._-]/", "", $image_name);
            $image_folder = __DIR__ . "/../View/Admin/uploads/";

            if (!is_dir($image_folder)) {
                mkdir($image_folder, 0777, true);
            }

            $image_path = $image_folder . $new_image_name;

            if (move_uploaded_file($image_tmp, $image_path)) {
                $result = $database->addListing(
                    $connection,
                    "listing_info",
                    $rent,
                    $status,
                    $listing_date,
                    $location,
                    $home_name,
                    $description,
                    $new_image_name
                );

                if ($result) {
                    echo "<script>
                            alert('Listing Added Successfully!');
                            window.location.href='../View/viewListings.php';
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
                        alert('Image Upload Failed!');
                        window.history.back();
                      </script>";
                exit();
            }
        }
    }

    if (!$valid) {
        echo "<script>
                alert('" . $message . "');
                window.history.back();
              </script>";
        exit();
    }
}

// =========================
// UPDATE LISTING
// =========================
if (isset($_POST["update_listing"])) {
    $listing_id   = trim($_POST["listing_id"] ?? "");
    $rent         = trim($_POST["rent"] ?? "");
    $status       = trim($_POST["status"] ?? "");
    $listing_date = trim($_POST["listing_date"] ?? "");
    $location     = trim($_POST["location"] ?? "");
    $home_name    = trim($_POST["home_name"] ?? "");
    $description  = trim($_POST["description"] ?? "");
    $old_image    = trim($_POST["old_image"] ?? "");

    $valid = true;
    $message = "";

    if (empty($listing_id)) {
        $message = "Listing ID is missing";
        $valid = false;
    } else if (empty($rent)) {
        $message = "Rent is required";
        $valid = false;
    } else if (!is_numeric($rent)) {
        $message = "Rent must be a number";
        $valid = false;
    } else if (empty($status)) {
        $message = "Status is required";
        $valid = false;
    } else if (empty($listing_date)) {
        $message = "Listing date is required";
        $valid = false;
    } else if (empty($location)) {
        $message = "Location is required";
        $valid = false;
    } else if (empty($home_name)) {
        $message = "Home name is required";
        $valid = false;
    } else if (empty($description)) {
        $message = "Description is required";
        $valid = false;
    }

    if ($valid) {
        $image_name = $old_image;

        // Check if new image is uploaded
        if (isset($_FILES["listing_image"]) && $_FILES["listing_image"]["error"] == 0) {
            $new_file_name = $_FILES["listing_image"]["name"];
            $new_file_tmp  = $_FILES["listing_image"]["tmp_name"];
            $image_extension = strtolower(pathinfo($new_file_name, PATHINFO_EXTENSION));
            $allowed_extensions = array("jpg", "jpeg", "png", "webp");

            if (!in_array($image_extension, $allowed_extensions)) {
                $message = "Only JPG, JPEG, PNG and WEBP images are allowed";
                $valid = false;
            } else {
                $image_name = time() . "_" . preg_replace("/[^a-zA-Z0-9._-]/", "", $new_file_name);
                $image_folder = __DIR__ . "/../View/Admin/uploads/";

                if (!is_dir($image_folder)) {
                    mkdir($image_folder, 0777, true);
                }

                $image_path = $image_folder . $image_name;

                if (move_uploaded_file($new_file_tmp, $image_path)) {
                    // Delete old image if new one was uploaded
                    if (!empty($old_image)) {
                        $old_image_path = $image_folder . $old_image;
                        if (file_exists($old_image_path)) {
                            unlink($old_image_path);
                        }
                    }
                } else {
                    $message = "Image Upload Failed!";
                    $valid = false;
                }
            }
        }

        if ($valid) {
            $result = $database->updateListing(
                $connection,
                "listing_info",
                $listing_id,
                $rent,
                $status,
                $listing_date,
                $location,
                $home_name,
                $description,
                $image_name
            );

            if ($result) {
                echo "<script>
                        alert('Listing Updated Successfully!');
                        window.location.href='../View/viewListings.php';
                      </script>";
                exit();
            } else {
                echo "<script>
                        alert('Database Update Failed!');
                        window.history.back();
                      </script>";
                exit();
            }
        }
    }

    if (!$valid) {
        echo "<script>
                alert('" . $message . "');
                window.history.back();
              </script>";
        exit();
    }
}

// =========================
// DELETE LISTING
// =========================
if (isset($_GET["delete_id"])) {
    $listing_id = $_GET["delete_id"];

    $result = $database->deleteListing(
        $connection,
        "listing_info",
        $listing_id
    );

    if ($result) {
        echo "<script>
                alert('Listing Deleted Successfully!');
                window.location.href='../View/viewListings.php';
              </script>";
        exit();
    } else {
        echo "<script>
                alert('Delete Failed!');
                window.location.href='../View/viewListings.php';
              </script>";
        exit();
    }
}
?>