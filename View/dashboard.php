<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Room Rental System</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    
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

        .nav-links a:hover {
            opacity: 0.85;
        }

       
        .main-container {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
        }

        .dashboard-card {
            background-color: #ffffff;
            border-radius: 20px;
            padding: 45px 40px;
            width: 100%;
            max-width: 1000px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.04);
        }

        .welcome-text {
            font-size: 1.8rem;
            font-weight: 700;
            color: #111111;
            margin-bottom: 12px;
        }

        .underline {
            width: 160px;
            height: 4px;
            background-color: #55CBC7;
            border-radius: 2px;
            margin-bottom: 35px;
        }

        
        .cards-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }

        .action-card {
            background-color: #ffffff;
            border: 1px solid #EFEFEF;
            border-radius: 16px;
            padding: 35px 20px 25px;
            text-align: center;
            text-decoration: none;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .action-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 18px rgba(0, 0, 0, 0.08);
        }

        .icon-box {
            font-size: 2.3rem;
            color: #49C5B6;
            margin-bottom: 20px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .icon-box .dark-icon {
            color: #2D3748;
        }

        .action-card h3 {
            font-size: 1.05rem;
            font-weight: 600;
            color: #1a202c;
            margin-bottom: 6px;
        }

        .action-card p {
            font-size: 0.82rem;
            color: #718096;
            line-height: 1.4;
        }

      
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

    
    <header class="top-header">
        <div class="header-title-bar">
            <h2>Admin Dashboard - Room Rental System</h2>
        </div>
        <nav class="sub-nav">
            <div class="nav-links">
                <a href="#"><i class="fa-solid fa-user-group"></i> View Owners</a>
                <a href="#"><i class="fa-solid fa-users"></i> View Tenants</a>
                <a href="#"><i class="fa-solid fa-house"></i> View Listings</a>
                <a href="../logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a>
            </div>
        </nav>
    </header>

    
    <main class="main-container">
        <div class="dashboard-card">
            <h1 class="welcome-text">Welcome Admin</h1>
            <div class="underline"></div>

            
            <div class="cards-grid">
                
               
                <a href="#" class="action-card">
                    <div class="icon-box">
                        <i class="fa-solid fa-users"></i>
                    </div>
                    <h3>View Owners</h3>
                    <p>Manage property owners</p>
                </a>

              
                <a href="#" class="action-card">
                    <div class="icon-box">
                        <i class="fa-regular fa-user"></i>
                    </div>
                    <h3>View Tenants</h3>
                    <p>Manage tenants</p>
                </a>

                
                <a href="#" class="action-card">
                    <div class="icon-box">
                        <i class="fa-solid fa-house-chimney"></i>
                    </div>
                    <h3>View Listings</h3>
                    <p>Manage room listings</p>
                </a>

               
                <a href="#" class="action-card">
                    <div class="icon-box">
                        <i class="fa-regular fa-trash-can dark-icon"></i>
                    </div>
                    <h3>Delete User/Listing</h3>
                    <p>Remove users or listings</p>
                </a>

            </div>
        </div>
    </main>

    
    <footer class="footer">
        <p>&copy; 2026 Room Rental System. All rights reserved.</p>
    </footer>

</body>
</html>