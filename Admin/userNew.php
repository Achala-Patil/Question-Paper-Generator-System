<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom, #f0f0f0, #c0c0c0);
            background-size: cover;
            display: flex;
            flex-direction: column;
        }

        .container {
            margin: 50px auto;
            width: 80%;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            padding: 30px;
            flex-grow: 1;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background-color: #333;
            color: #fff;
            text-align: center;
        }

        th,
        td {
            padding: 12px;
            border: 1px solid #ccc;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        .edit-button,
        .delete-button,
        #addUserButton {
            background-color: grey;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 8px 12px;
            cursor: pointer;
        }

        .delete-button:hover {
            background-color: #ff3333;
        }

        .edit-button:hover,
        #addUserButton:hover {
            background-color: #555;
        }

        .title {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <?php include("nav.php"); ?>

    <div class="container">
        <h1>User Management</h1>
        <div class="title">
            <button id="addUserButton" onclick="addUserRow()">Add User</button>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>Username (Email)</th>
                    <th>Password</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "ques2";

                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT * FROM user";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td><input type='email' id='username_{$row['id']}' value='" . htmlspecialchars($row['username']) . "' required /></td>";
                        echo "<td><input type='password' id='password_{$row['id']}' value='" . htmlspecialchars($row['password']) . "' /></td>";
                        echo "<td>";
                        echo "<button class='edit-button' onClick=\"updateUser('{$row['id']}', document.getElementById('username_{$row['id']}').value, document.getElementById('password_{$row['id']}').value)\">Update</button>";
                        echo " <button class='delete-button' onClick=\"deleteUser('{$row['id']}', this.closest('tr'))\">Delete</button>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No users found</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <script>
        function isValidEmail(email) {
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailPattern.test(email);
        }

        function updateUser(id, username, password) {
            if (!isValidEmail(username)) {
                alert("Please enter a valid email address.");
                return;
            }

            const xhr = new XMLHttpRequest();
            xhr.open("POST", "update_user.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onload = function () {
                if (xhr.status === 200) {
                    alert(xhr.responseText);
                } else {
                    alert("Failed to update user.");
                }
            };
            xhr.send(`id=${id}&username=${encodeURIComponent(username)}&password=${encodeURIComponent(password)}`);
        }

        function deleteUser(id, row) {
            if (confirm("Are you sure you want to delete this user?")) {
                const xhr = new XMLHttpRequest();
                xhr.open("POST", "delete_user.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onload = function () {
                    if (xhr.status === 200) {
                        alert(xhr.responseText);
                        if (xhr.responseText.includes("User deleted successfully")) {
                            row.remove();
                        }
                    } else {
                        alert("Failed to delete user.");
                    }
                };
                xhr.send(`id=${id}`);
            }
        }

        function addUserRow() {
            const tbody = document.querySelector("tbody");

            const row = document.createElement("tr");
            row.innerHTML = `
                <td><input type="email" name="userName[]" placeholder="Enter Email" required /></td>
                <td><input type="password" name="password[]" placeholder="Enter Password" required /></td>
                <td><button class='edit-button' onclick="saveNewUser(this)">Save</button></td>
            `;
            tbody.appendChild(row);
        }

        function saveNewUser(button) {
            const row = button.closest("tr");
            const username = row.querySelector("input[name='userName[]']").value;
            const password = row.querySelector("input[name='password[]']").value;

            if (!isValidEmail(username)) {
                alert("Please enter a valid email address.");
                return;
            }

            const xhr = new XMLHttpRequest();
            xhr.open("POST", "add_user.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onload = function () {
                if (xhr.status === 200) {
                    alert(xhr.responseText);
                    button.disabled = true;
                } else {
                    alert("Failed to add user.");
                }
            };
            xhr.send(`username=${encodeURIComponent(username)}&password=${encodeURIComponent(password)}`);
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
