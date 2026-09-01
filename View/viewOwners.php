<?php
include __DIR__ . "/../Model/db.php";

$database = new db();
$connection = $database->connection();

$result = $database->viewOwners(
    $connection,
    "owner_info"
);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Owners - Room Rental System</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Poppins', sans-serif; }
        body { background-color: #F8E7D1; min-height: 100vh; display: flex; flex-direction: column; }
        .top-header { width: 100%; }
        .header-title-bar { background-color: #0E1318; color: #ffffff; padding: 16px 40px; }
        .header-title-bar h2 { font-size: 1.35rem; font-weight: 600; }
        .sub-nav { background-color: #55CBC7; padding: 12px 40px; display: flex; justify-content: flex-end; }
        .nav-links { display: flex; gap: 30px; }
        .nav-links a { color: #ffffff; text-decoration: none; font-size: 0.95rem; font-weight: 500; display: flex; align-items: center; gap: 8px; }
        .nav-links a:hover, .nav-links a.active { opacity: 0.85; text-decoration: underline; }
        .main-container { flex: 1; display: flex; align-items: flex-start; justify-content: center; padding: 40px 20px; }
        .content-card { background-color: #ffffff; border-radius: 20px; padding: 40px; width: 100%; max-width: 1200px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.04); }
        .card-header { display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 15px; margin-bottom: 8px; }
        .title-text { font-size: 1.6rem; font-weight: 700; color: #111111; }
        .underline { width: 140px; height: 4px; background-color: #55CBC7; border-radius: 2px; margin-bottom: 25px; }
        .header-right { display: flex; align-items: center; gap: 10px; }
        .search-box { display: flex; align-items: center; border: 1px solid #E2E8F0; border-radius: 8px; padding: 6px 12px; background-color: #F8FAFC; }
        .search-box input { border: none; outline: none; background: transparent; padding-left: 8px; font-size: 0.9rem; }
        .btn-add { display: inline-flex; align-items: center; gap: 7px; padding: 10px 16px; background-color: #55CBC7; color: #ffffff; text-decoration: none; border-radius: 8px; font-size: 0.85rem; font-weight: 600; }
        .btn-add:hover { opacity: 0.85; }
        .table-responsive { overflow-x: auto; margin-top: 15px; }
        table { width: 100%; border-collapse: collapse; text-align: left; }
        table thead tr { background-color: #F1F5F9; color: #334155; font-size: 0.9rem; font-weight: 600; }
        table th, table td { padding: 14px 16px; border-bottom: 1px solid #E2E8F0; font-size: 0.9rem; }
        table tbody tr:hover { background-color: #F8FAFC; }
        .btn-action { display: inline-flex; align-items: center; justify-content: center; width: 32px; height: 32px; border-radius: 6px; text-decoration: none; font-size: 0.85rem; margin-right: 5px; }
        .btn-edit { background-color: #E0F2FE; color: #0284C7; }
        .btn-delete { background-color: #FEE2E2; color: #DC2626; }
        .footer { background-color: #0E1318; color: #ffffff; text-align: center; padding: 22px 20px; font-size: 0.88rem; }
    </style>
</head>
<body>

<header class="top-header">
    <div class="header-title-bar">
        <h2>Admin Dashboard - Room Rental System</h2>
    </div>
    <nav class="sub-nav">
        <div class="nav-links">
            <a href="dashboard.php"><i class="fa-solid fa-gauge"></i> Dashboard</a>
            <a href="viewOwners.php" class="active"><i class="fa-solid fa-user-group"></i> View Owners</a>
            <a href="viewTenants.php"><i class="fa-solid fa-users"></i> View Tenants</a>
            <a href="viewListings.php"><i class="fa-solid fa-house"></i> View Listings</a>
            <a href="../logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a>
        </div>
    </nav>
</header>

<main class="main-container">
    <div class="content-card">
        <div class="card-header">
            <div><h1 class="title-text">Registered Owners</h1></div>
            <div class="header-right">
                <div class="search-box">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" id="searchInput" placeholder="Search owner...">
                </div>
                <a href="Admin/addOwner.php" class="btn-add"><i class="fa-solid fa-plus"></i> Add Owner</a>
            </div>
        </div>
        <div class="underline"></div>

        <div class="table-responsive">
            <table id="ownerTable">
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Name</th>
                        <th>NID</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Username</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php if ($result && $result->num_rows > 0): ?>
                    <?php while ($owner = $result->fetch_assoc()): ?>
                        <tr>
                            <td>#O-<?php echo htmlspecialchars($owner["owner_id"]); ?></td>
                            <td><?php echo htmlspecialchars($owner["owner_name"]); ?></td>
                            <td><?php echo htmlspecialchars($owner["owner_nid"]); ?></td>
                            <td><?php echo htmlspecialchars($owner["owner_email"]); ?></td>
                            <td><?php echo htmlspecialchars($owner["owner_phone"]); ?></td>
                            <td><?php echo htmlspecialchars($owner["owner_username"]); ?></td>
                            <td>
                                <a href="Admin/updateOwner.php?owner_id=<?php echo $owner["owner_id"]; ?>" class="btn-action btn-edit" title="Edit">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </a>
                                <a href="#" class="btn-action btn-delete" title="Delete" onclick="deleteOwner(<?php echo $owner["owner_id"]; ?>); return false;">
                                    <i class="fa-regular fa-trash-can"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" style="text-align:center; padding:30px;">No Owners Found</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<footer class="footer">
    <p>&copy; 2026 Room Rental System. All rights reserved.</p>
</footer>

<script>
function deleteOwner(owner_id) {
    if (confirm("Are you sure you want to delete this owner?")) {
        window.location.href = "../Controller/OwnerController.php?delete_id=" + owner_id;
    }
}

document.getElementById("searchInput").addEventListener("keyup", function() {
    let searchValue = this.value.toLowerCase();
    let rows = document.querySelectorAll("#ownerTable tbody tr");
    rows.forEach(function(row) {
        row.style.display = row.innerText.toLowerCase().includes(searchValue) ? "" : "none";
    });
});
</script>

</body>
</html>