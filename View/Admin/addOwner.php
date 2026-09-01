<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Owner - Room Rental System</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Poppins', sans-serif; }
        body { background-color: #F8E7D1; min-height: 100vh; display: flex; justify-content: center; align-items: center; padding: 20px; }
        .container { background-color: white; width: 100%; max-width: 650px; padding: 35px; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.1); }
        h1 { text-align: center; color: #0E1318; font-size: 1.6rem; }
        .underline { width: 100px; height: 4px; background-color: #55CBC7; margin: 8px auto 25px auto; border-radius: 5px; }
        table { width: 100%; }
        td { padding: 8px; }
        label { font-weight: 600; color: #334155; font-size: 0.9rem; }
        input, textarea { width: 100%; padding: 10px; border: 1px solid #CBD5E1; border-radius: 6px; outline: none; font-size: 0.9rem; background-color: #F8FAFC; }
        input:focus, textarea:focus { border-color: #55CBC7; }
        textarea { height: 80px; resize: none; }
        .buttons { text-align: center; padding-top: 20px; }
        .btn { padding: 10px 20px; border: none; border-radius: 6px; cursor: pointer; text-decoration: none; margin: 5px; font-size: 14px; font-weight: 600; display: inline-block; }
        .btn-add { background-color: #55CBC7; color: white; }
        .btn-reset { background-color: #64748B; color: white; }
        .btn-back { background-color: #0E1318; color: white; }
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
            let password = document.getElementById("owner_password").value.trim();

            let valid = true;
            let message = "";

            if(name === "") { message += "Owner Name Required\n"; valid = false; }
            if(nid === "") { message += "Owner NID Required\n"; valid = false; }
            if(address === "") { message += "Owner Address Required\n"; valid = false; }
            if(dob === "") { message += "Owner Date of Birth Required\n"; valid = false; }
            if(email === "") { message += "Owner Email Required\n"; valid = false; }
            if(phone === "") { message += "Owner Phone Required\n"; valid = false; }
            if(username === "") { message += "Owner Username Required\n"; valid = false; }
            if(password.length < 5) { message += "Password must be at least 5 characters\n"; valid = false; }

            if(!valid) { alert(message); }
            return valid;
        }
    </script>
</head>
<body>

<div class="container">
    <h1>Add New Owner</h1>
    <div class="underline"></div>

    <form method="POST" action="../../Controller/OwnerController.php" onsubmit="return collect_data()">
        <table>
            <tr>
                <td><label>Owner Name:</label></td>
                <td><input type="text" id="owner_name" name="owner_name" placeholder="Enter Owner Name"></td>
            </tr>
            <tr>
                <td><label>NID:</label></td>
                <td><input type="text" id="owner_nid" name="owner_nid" placeholder="Enter NID"></td>
            </tr>
            <tr>
                <td><label>Address:</label></td>
                <td><textarea id="owner_address" name="owner_address" placeholder="Enter Address"></textarea></td>
            </tr>
            <tr>
                <td><label>Date of Birth:</label></td>
                <td><input type="date" id="owner_dob" name="owner_dob"></td>
            </tr>
            <tr>
                <td><label>Email:</label></td>
                <td><input type="email" id="owner_email" name="owner_email" placeholder="Enter Email"></td>
            </tr>
            <tr>
                <td><label>Phone:</label></td>
                <td><input type="text" id="owner_phone" name="owner_phone" placeholder="Enter Phone"></td>
            </tr>
            <tr>
                <td><label>Username:</label></td>
                <td><input type="text" id="owner_username" name="owner_username" placeholder="Enter Username"></td>
            </tr>
            <tr>
                <td><label>Password:</label></td>
                <td><input type="password" id="owner_password" name="owner_password" placeholder="Enter Password"></td>
            </tr>
            <tr>
                <td colspan="2" class="buttons">
                    <input type="submit" class="btn btn-add" name="add_owner" value="Add Owner">
                    <input type="reset" class="btn btn-reset" value="Reset">
                    <a href="../viewOwners.php" class="btn btn-back">Back</a>
                </td>
            </tr>
        </table>
    </form>
</div>

</body>
</html>