<?php

include __DIR__ . "/../../Model/db.php";

$database = new db();
$connection = $database->connection();

// GET LISTING ID (checking both listing_id and id to prevent missing ID error)
$listing_id = $_GET["listing_id"] ?? $_GET["id"] ?? "";

if (empty($listing_id)) {
    echo "<script>
            alert('Listing ID is missing!');
            window.location.href='../viewListings.php';
          </script>";
    exit();
}

// GET LISTING DATA
$result = $database->getListing(
    $connection,
    "listing_info",
    $listing_id
);

if (!$result || $result->num_rows == 0) {
    echo "<script>
            alert('Listing not found!');
            window.location.href='../viewListings.php';
          </script>";
    exit();
}

$listing = $result->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Listing - Room Rental System</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            margin: 0;
            padding: 40px 20px;
            background-color: #F8E7D1;
            display: flex;
            justify-content: center;
        }

        .container {
            width: 100%;
            max-width: 600px;
            background: white;
            padding: 35px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        }

        h2 {
            text-align: center;
            color: #0E1318;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-top: 15px;
            margin-bottom: 6px;
            font-weight: 600;
            font-size: 0.9rem;
            color: #334155;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #CBD5E1;
            border-radius: 6px;
            background-color: #F8FAFC;
            outline: none;
            font-size: 0.9rem;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #55CBC7;
            background-color: #ffffff;
        }

        textarea {
            height: 100px;
            resize: vertical;
        }

        .current-image {
            width: 140px;
            height: 95px;
            object-fit: cover;
            margin-top: 8px;
            border-radius: 6px;
            border: 1px solid #E2E8F0;
            display: block;
        }

        .btn-group {
            margin-top: 25px;
            display: flex;
            gap: 12px;
        }

        button {
            flex: 1;
            padding: 12px;
            background-color: #55CBC7;
            border: none;
            cursor: pointer;
            border-radius: 6px;
            color: white;
            font-weight: 600;
            font-size: 0.95rem;
        }

        button:hover {
            opacity: 0.9;
        }

        .cancel {
            flex: 1;
            text-align: center;
            padding: 12px;
            background-color: #E2E8F0;
            color: #334155;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 600;
            font-size: 0.95rem;
        }

        .cancel:hover {
            opacity: 0.85;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Update Listing</h2>

    <form action="../../Controller/ListingController.php" method="POST" enctype="multipart/form-data">
        
        <!-- Hidden Inputs for ID and Existing Image -->
        <input type="hidden" name="listing_id" value="<?php echo htmlspecialchars($listing["listing_id"]); ?>">
        <input type="hidden" name="old_image" value="<?php echo htmlspecialchars($listing["listing_image"]); ?>">

        <label>Home Name</label>
        <input type="text" name="home_name" value="<?php echo htmlspecialchars($listing["home_name"]); ?>" required>

        <label>Location</label>
        <input type="text" name="location" value="<?php echo htmlspecialchars($listing["location"]); ?>" required>

        <label>Rent / Month (৳)</label>
        <input type="number" name="rent" value="<?php echo htmlspecialchars($listing["rent"]); ?>" required>

        <label>Status</label>
        <select name="status" required>
            <option value="Available" <?php if($listing["status"] == "Available") echo "selected"; ?>>Available</option>
            <option value="Rented" <?php if($listing["status"] == "Rented") echo "selected"; ?>>Rented</option>
        </select>

        <label>Listing Date</label>
        <input type="date" name="listing_date" value="<?php echo htmlspecialchars($listing["listing_date"]); ?>" required>

        <label>Description</label>
        <textarea name="description" required><?php echo htmlspecialchars($listing["description"]); ?></textarea>

        <label>Current Image</label>
        <?php if (!empty($listing["listing_image"])): ?>
            <img src="uploads/<?php echo htmlspecialchars($listing["listing_image"]); ?>" class="current-image" alt="Listing Image">
        <?php else: ?>
            <p style="font-size: 0.85rem; color: #888;">No image uploaded</p>
        <?php endif; ?>

        <label>New Image (Leave empty to keep current image)</label>
        <input type="file" name="listing_image" accept=".jpg,.jpeg,.png,.webp">

        <div class="btn-group">
            <button type="submit" name="update_listing">Update Listing</button>
            <a href="../viewListings.php" class="cancel">Cancel</a>
        </div>
    </form>
</div>

</body>
</html>