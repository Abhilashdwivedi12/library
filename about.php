<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About - Library Management System</title>
    <link rel="stylesheet" href="../frontend/css/manage.css">
    <style>
        .main-content {
            max-width: 900px;
            margin: auto;
            padding: 30px;
            background: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .main-content h1,
        .main-content h2,
        .main-content h3 {
            text-align: center;
            color: #333;
        }

        .main-content ul {
            list-style: none;
            padding-left: 0;
        }

        .main-content ul li::before {
            content: "✔️";
            margin-right: 8px;
            color: #28a745;
        }

        .main-content p {
            text-align: justify;
            margin-bottom: 15px;
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
            <h1>About the Library Management System</h1>

            <p>The <strong>Library Management System</strong> is a digital platform developed to manage books, members, and transactions in libraries—especially for educational institutions like schools, colleges, and universities.</p>

            <h2>🏫 About the Library</h2>
            <p>This library serves students and faculty with a wide collection of books and resources. The system helps librarians maintain and track book records efficiently.</p>

            <h2>📚 Book Management</h2>
            <ul>
                <li>Add, update, and delete books</li>
                <li>Search and sort books by category</li>
                <li>Track availability and issued copies</li>
            </ul>

            <h2>🔁 Transactions</h2>
            <ul>
                <li>Issue and return books with status logs</li>
                <li>Due date tracking and fine calculation</li>
                <li>Real-time status updates</li>
            </ul>

            <h2>⚙️ Key Features</h2>
            <ul>
                <li>Book and student record management</li>
                <li>Real-time issue/return tracking</li>
                <li>Fine management system</li>
                <li>Admin dashboard and analytics</li>
            </ul>

            <h2>🧪 Technologies Used</h2>
            <ul>
                <li><strong>Frontend:</strong> HTML, CSS, JavaScript</li>
                <li><strong>Backend:</strong> Core PHP</li>
                <li><strong>Database:</strong> MySQL</li>
            </ul>

            <h2>👨‍💻 Developed By</h2>
            <p>This project is developed by <strong>Abhilash Dhr Dwivedi</strong> as a practical implementation of web development and database concepts learned through training and personal study.</p>

            <h2>🎯 Future Plans</h2>
            <p>Enhancements like reporting, book search filters, multiple admin roles, and email notifications may be added in upcoming versions.</p>
        </main>
    </div>

    <footer class="footer">
        <p>&copy; 2025 Library Management System. All Rights Reserved.</p>
    </footer>
</body>
</html>
