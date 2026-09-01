<?php
include __DIR__ . "/../../Model/db.php";

$database = new db();
$connection = $database->connection();

$owner_id = $_GET["owner_id"] ?? $_GET["id"] ?? "";

if (empty($owner_id)) {
    echo "<script>
            alert('Owner ID is missing!');
            window.location.href='../viewOwners.php';
          </script>";
    exit();
}

$result = $database->getOwner($connection, "owner_info", $owner_id);

if (!$result || $result->num_rows == 0) {
    echo "<script>
            alert('Owner not found!');
            window.location.href='../viewOwners.php';
          </script>";
    exit();
}

$owner = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Owner - Room Rental System</title>
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
            let name = document.getElementById("owner_name").value.trim();
            let nid = document.getElementById("owner_nid").value.trim();
            let address = document.getElementById("owner_address").value.trim();
            let dob = document.getElementById("owner_dob").value.trim();
            let email = document.getElementById("owner_email").value.trim();
            let phone = document.getElementById("owner_phone").value.trim();
            let username = document.getElementById("owner_username").value.trim();

            let valid = true;
            let message = "";

            if(name === "") { message += "Owner Name Required\n"; valid = false; }
            if(nid === "") { message += "Owner NID Required\n"; valid = false; }
            if(address === "") { message += "Owner Address Required\n"; valid = false; }
            if(dob === "") { message += "Owner Date of Birth Required\n"; valid = false; }
            if(email === "") { message += "Owner Email Required\n"; valid = false; }
            if(phone === "") { message += "Owner Phone Required\n"; valid = false; }
            if(username === "") { message += "Owner Username Required\n"; valid = false; }

            if(!valid) { alert(message); }
            return valid;
        }
    </script>
</head>
<body>

<div class="form-container">
    <h1>Update Owner</h1>
    <div class="underline"></div>

    <form method="POST" action="../../Controller/OwnerController.php" onsubmit="return collect_data()">
        <input type="hidden" name="owner_id" value="<?php echo htmlspecialchars($owner["owner_id"]); ?>">

        <table>
            <tr>
                <td><label>Owner Name:</label></td>
                <td><input type="text" id="owner_name" name="owner_name" value="<?php echo htmlspecialchars($owner["owner_name"]); ?>"></td>
            </tr>
            <tr>
                <td><label>NID:</label></td>
                <td><input type="text" id="owner_nid" name="owner_nid" value="<?php echo htmlspecialchars($owner["owner_nid"]); ?>"></td>
            </tr>
            <tr>
                <td><label>Address:</label></td>
                <td><textarea id="owner_address" name="owner_address"><?php echo htmlspecialchars($owner["owner_address"]); ?></textarea></td>
            </tr>
            <tr>
                <td><label>Date of Birth:</label></td>
                <td><input type="date" id="owner_dob" name="owner_dob" value="<?php echo htmlspecialchars($owner["owner_dob"]); ?>"></td>
            </tr>
            <tr>
                <td><label>Email:</label></td>
                <td><input type="email" id="owner_email" name="owner_email" value="<?php echo htmlspecialchars($owner["owner_email"]); ?>"></td>
            </tr>
            <tr>
                <td><label>Phone:</label></td>
                <td><input type="text" id="owner_phone" name="owner_phone" value="<?php echo htmlspecialchars($owner["owner_phone"]); ?>"></td>
            </tr>
            <tr>
                <td><label>Username:</label></td>
                <td><input type="text" id="owner_username" name="owner_username" value="<?php echo htmlspecialchars($owner["owner_username"]); ?>"></td>
            </tr>
            <tr>
                <td colspan="2" class="button-area">
                    <input type="submit" class="btn update-btn" name="update_owner" value="Update Owner">
                    <input type="reset" class="btn reset-btn" value="Reset">
                    <a href="../viewOwners.php" class="btn back-btn">Back</a>
                </td>
            </tr>
        </table>
    </form>
</div>

</body>
</html>