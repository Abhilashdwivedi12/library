<?php
$servername = "localhost";
$username = "root";
$password = "Abhi@sql123";
$dbname = "user_dm";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT name, email, membership_year, profile_picture FROM profile_t WHERE id = 1"; // Fetching user with ID 1
$result = $conn->query($sql);
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #74ebd5, #acb6e5);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .profile-container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
            max-width: 400px;
            width: 100%;
        }
        .profile-container img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #74ebd5;
        }
        .upload-btn {
            margin-top: 15px;
        }
        .upload-btn input {
            display: none;
        }
        .upload-btn label {
            background: #74ebd5;
            color: white;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            transition: 0.3s;
        }
        .upload-btn label:hover {
            background: #56c5a9;
        }
        .profile-details {
            margin-top: 20px;
        }
        .profile-details p {
            font-size: 18px;
            font-weight: bold;
        }
        .update-form input, .update-form button {
            width: 100%;
            margin-top: 10px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .update-form button {
            background: #74ebd5;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <h2>User Profile</h2>
        <img id="profile-img" src="<?php echo $user['profile_picture'] ?: 'default-profile.png'; ?>" alt="User Profile">
        <div class="upload-btn">
            <input type="file" id="profile-upload" accept="image/*">
            <label for="profile-upload">Upload Profile Picture</label>
        </div>
        <div class="profile-details">
            <p>Name: <?php echo htmlspecialchars($user['name']); ?></p>
            <p>Email: <?php echo htmlspecialchars($user['email']); ?></p>
            <p>Member Since: <?php echo htmlspecialchars($user['membership_year']); ?></p>
        </div>
        
        <form class="update-form" action="update_profile.php" method="POST">
            <input type="text" name="name" placeholder="Enter new name" value="<?php echo $user['name']; ?>">
            <input type="email" name="email" placeholder="Enter new email" value="<?php echo $user['email']; ?>">
            <input type="number" name="membership_year" placeholder="Membership Year" value="<?php echo $user['membership_year']; ?>">
            <button type="submit">Update Profile</button>
        </form>
    </div>
</body>
</html>

