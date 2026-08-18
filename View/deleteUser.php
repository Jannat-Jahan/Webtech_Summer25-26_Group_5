<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete User / Listing - Room Rental System</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #F8E7D1;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Header Styling */
        .top-header {
            width: 100%;
        }

        .header-title-bar {
            background-color: #0E1318;
            color: #ffffff;
            padding: 16px 40px;
        }

        .header-title-bar h2 {
            font-size: 1.35rem;
            font-weight: 600;
        }

        .sub-nav {
            background-color: #55CBC7;
            padding: 12px 40px;
            display: flex;
            justify-content: flex-end;
        }

        .nav-links {
            display: flex;
            gap: 30px;
        }

        .nav-links a {
            color: #ffffff;
            text-decoration: none;
            font-size: 0.95rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: opacity 0.2s ease;
        }

        .nav-links a:hover,
        .nav-links a.active {
            opacity: 0.85;
            text-decoration: underline;
        }

        /* Main Container */
        .main-container {
            flex: 1;
            display: flex;
            align-items: flex-start;
            justify-content: center;
            padding: 40px 20px;
        }

        .content-card {
            background-color: #ffffff;
            border-radius: 20px;
            padding: 40px;
            width: 100%;
            max-width: 900px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.04);
        }

        .title-text {
            font-size: 1.6rem;
            font-weight: 700;
            color: #111111;
        }

        .underline {
            width: 140px;
            height: 4px;
            background-color: #55CBC7;
            border-radius: 2px;
            margin-top: 8px;
            margin-bottom: 30px;
        }

        /* Danger / Notice Box */
        .alert-warning {
            background-color: #FFF5F5;
            border-left: 4px solid #E53E3E;
            padding: 14px 18px;
            border-radius: 8px;
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            gap: 12px;
            color: #9B2C2C;
            font-size: 0.9rem;
        }

        .alert-warning i {
            font-size: 1.2rem;
            color: #E53E3E;
        }

        /* Form Styling */
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 25px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .form-group.full-width {
            grid-column: span 2;
        }

        .form-group label {
            font-size: 0.9rem;
            font-weight: 600;
            color: #2D3748;
        }

        .form-control {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #E2E8F0;
            border-radius: 8px;
            font-size: 0.9rem;
            outline: none;
            background-color: #F8FAFC;
            transition: border-color 0.2s;
        }

        .form-control:focus {
            border-color: #55CBC7;
            background-color: #ffffff;
        }

        /* Delete Button */
        .btn-delete-submit {
            background-color: #DC2626;
            color: #ffffff;
            border: none;
            padding: 13px 28px;
            font-size: 0.95rem;
            font-weight: 600;
            border-radius: 8px;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: background-color 0.2s, transform 0.1s;
        }

        .btn-delete-submit:hover {
            background-color: #B91C1C;
        }

        .btn-delete-submit:active {
            transform: scale(0.98);
        }

        /* Footer */
        .footer {
            background-color: #0E1318;
            color: #ffffff;
            text-align: center;
            padding: 22px 20px;
            font-size: 0.88rem;
        }

     
    </style>
</head>
<body>

    <!-- Header / Navbar -->
    <header class="top-header">
        <div class="header-title-bar">
            <h2>Admin Dashboard - Room Rental System</h2>
        </div>
        <nav class="sub-nav">
            <div class="nav-links">
                <a href="dashboard.php"><i class="fa-solid fa-gauge"></i> Dashboard</a>
                <a href="viewOwners.php"><i class="fa-solid fa-user-group"></i> View Owners</a>
                <a href="viewTenants.php"><i class="fa-solid fa-users"></i> View Tenants</a>
                <a href="viewListings.php"><i class="fa-solid fa-house"></i> View Listings</a>
                <a href="../logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a>
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="main-container">
        <div class="content-card">
            <h1 class="title-text">Delete User or Listing</h1>
            <div class="underline"></div>

            <div class="alert-warning">
                <i class="fa-solid fa-triangle-exclamation"></i>
                <span><strong>Caution:</strong> Deleting a user or listing is permanent and cannot be undone.</span>
            </div>

            <!-- Delete Form -->
            <form action="../Ajax/deleteUser.php" method="POST" onsubmit="return confirm('Are you sure you want to delete this record?');">
                <div class="form-grid">
                    
                    <div class="form-group">
                        <label for="targetType">Select Category</label>
                        <select id="targetType" name="targetType" class="form-control" required>
                            <option value="">-- Choose Category --</option>
                            <option value="owner">Owner</option>
                            <option value="tenant">Tenant</option>
                            <option value="listing">Room / Property Listing</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="targetId">ID / Record Number</label>
                        <input type="text" id="targetId" name="targetId" class="form-control" placeholder="e.g. 101 or L-301" required>
                    </div>

                    <div class="form-group full-width">
                        <label for="deleteReason">Reason for Deletion (Optional)</label>
                        <textarea id="deleteReason" name="deleteReason" rows="3" class="form-control" placeholder="Enter reason for removal..."></textarea>
                    </div>

                </div>

                <button type="submit" class="btn-delete-submit">
                    <i class="fa-regular fa-trash-can"></i> Delete Permanently
                </button>
            </form>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2026 Room Rental System. All rights reserved.</p>
    </footer>

</body>
</html>