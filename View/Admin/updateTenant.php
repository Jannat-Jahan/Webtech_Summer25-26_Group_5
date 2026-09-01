<?php
include __DIR__ . "/../../Model/db.php";

$database = new db();
$connection = $database->connection();

$tenant_id = $_GET["tenant_id"] ?? $_GET["id"] ?? "";

if (empty($tenant_id)) {
    echo "<script>
            alert('Tenant ID is missing!');
            window.location.href='../viewTenants.php';
          </script>";
    exit();
}

$result = $database->getTenant($connection, "tenant_info", $tenant_id);

if (!$result || $result->num_rows == 0) {
    echo "<script>
            alert('Tenant not found!');
            window.location.href='../viewTenants.php';
          </script>";
    exit();
}

$tenant = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Tenant - Room Rental System</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Poppins', sans-serif; }
        body { background-color: #F8E7D1; min-height: 100vh; display: flex; justify-content: center; align-items: center; padding: 20px; }
        .form-container { background-color: white; width: 100%; max-width: 600px; padding: 35px; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.1); }
        h1 { text-align: center; margin-bottom: 8px; color: #0E1318; font-size: 1.6rem; }
        .underline { width: 100px; height: 4px; background-color: #55CBC7; margin: 0 auto 25px auto; border-radius: 5px; }
        table { width: 100%; }
        td { padding: 8px; }
        label { font-weight: 600; color: #334155; font-size: 0.9rem; }
        input, textarea { width: 100%; padding: 10px; border: 1px solid #CBD5E1; border-radius: 6px; outline: none; background-color: #F8FAFC; }
        input:focus, textarea:focus { border-color: #55CBC7; }
        textarea { height: 70px; resize: none; }
        .button-area { text-align: center; padding-top: 20px; }
        .btn { padding: 10px 20px; border: none; border-radius: 6px; cursor: pointer; text-decoration: none; margin: 5px; font-size: 14px; font-weight: 600; display: inline-block; }
        .update-btn { background-color: #55CBC7; color: white; }
        .reset-btn { background-color: #64748B; color: white; }
        .back-btn { background-color: #0E1318; color: white; }
        .btn:hover { opacity: 0.85; }
    </style>
    <script>
        function collect_data() {
            let name = document.getElementById("tenant_name").value.trim();
            let nid = document.getElementById("tenant_nid").value.trim();
            let address = document.getElementById("tenant_address").value.trim();
            let dob = document.getElementById("tenant_dob").value.trim();
            let email = document.getElementById("tenant_email").value.trim();
            let phone = document.getElementById("tenant_phone").value.trim();
            let username = document.getElementById("tenant_username").value.trim();

            let valid = true;
            let message = "";

            if(name === "") { message += "Tenant Name Required\n"; valid = false; }
            if(nid === "") { message += "Tenant NID Required\n"; valid = false; }
            if(address === "") { message += "Tenant Address Required\n"; valid = false; }
            if(dob === "") { message += "Tenant Date of Birth Required\n"; valid = false; }
            if(email === "") { message += "Tenant Email Required\n"; valid = false; }
            if(phone === "") { message += "Tenant Phone Required\n"; valid = false; }
            if(username === "") { message += "Tenant Username Required\n"; valid = false; }

            if(!valid) { alert(message); }
            return valid;
        }
    </script>
</head>
<body>

<div class="form-container">
    <h1>Update Tenant</h1>
    <div class="underline"></div>

    <form method="POST" action="../../Controller/TenantController.php" onsubmit="return collect_data()">
        <input type="hidden" name="tenant_id" value="<?php echo htmlspecialchars($tenant["tenant_id"]); ?>">

        <table>
            <tr>
                <td><label>Tenant Name:</label></td>
                <td><input type="text" id="tenant_name" name="tenant_name" value="<?php echo htmlspecialchars($tenant["tenant_name"]); ?>"></td>
            </tr>
            <tr>
                <td><label>NID:</label></td>
                <td><input type="text" id="tenant_nid" name="tenant_nid" value="<?php echo htmlspecialchars($tenant["tenant_nid"]); ?>"></td>
            </tr>
            <tr>
                <td><label>Address:</label></td>
                <td><textarea id="tenant_address" name="tenant_address"><?php echo htmlspecialchars($tenant["tenant_address"]); ?></textarea></td>
            </tr>
            <tr>
                <td><label>Date of Birth:</label></td>
                <td><input type="date" id="tenant_dob" name="tenant_dob" value="<?php echo htmlspecialchars($tenant["tenant_dob"]); ?>"></td>
            </tr>
            <tr>
                <td><label>Email:</label></td>
                <td><input type="email" id="tenant_email" name="tenant_email" value="<?php echo htmlspecialchars($tenant["tenant_email"]); ?>"></td>
            </tr>
            <tr>
                <td><label>Phone:</label></td>
                <td><input type="text" id="tenant_phone" name="tenant_phone" value="<?php echo htmlspecialchars($tenant["tenant_phone"]); ?>"></td>
            </tr>
            <tr>
                <td><label>Username:</label></td>
                <td><input type="text" id="tenant_username" name="tenant_username" value="<?php echo htmlspecialchars($tenant["tenant_username"]); ?>"></td>
            </tr>
            <tr>
                <td colspan="2" class="button-area">
                    <input type="submit" class="btn update-btn" name="update_tenant" value="Update Tenant">
                    <input type="reset" class="btn reset-btn" value="Reset">
                    <a href="../viewTenants.php" class="btn back-btn">Back</a>
                </td>
            </tr>
        </table>
    </form>
</div>

</body>
</html>
