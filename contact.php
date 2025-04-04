<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - Library System</title>
    <link rel="stylesheet" href="../frontend/css/manage.css">
    <style>
        .main-content {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            background: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .main-content h1, .main-content p {
            text-align: center;
        }

        form {
            margin-top: 30px;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        input, textarea {
            padding: 12px;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 16px;
        }

        textarea {
            resize: vertical;
            min-height: 120px;
        }

        button {
            background-color: #007bff;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <header class="header">
        <h1>Library Management System</h1>
    </header>

    <div class="dashboard-container">
        <aside class="sidebar">
            <h2>Library System</h2>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="manage_book.php">Manage Books</a></li>
                <li><a href="members.php">Manage Members</a></li>
                <li><a href="transactions.php">Transactions</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </aside>

        <main class="main-content">
            <h1>Contact Us</h1>
            <p>Have a question or suggestion? We'd love to hear from you!</p>

            <form action="login.php" method="post">
                <input type="text" name="name" placeholder="Your Name" required>
                <input type="email" name="email" placeholder="Your Email" required>
                <input type="text" name="subject" placeholder="Subject" required>
                <textarea name="message" placeholder="Your Message" required></textarea>
                <button type="submit">Send Message</button>
            </form>
        </main>
    </div>

    <footer class="footer">
        <p>&copy; 2025 Library Management System. All Rights Reserved.</p>
    </footer>
</body>
</html>
