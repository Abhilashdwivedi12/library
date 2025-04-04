<?php
include('database.php'); // Include database connection

// Fetch total books
$booksQuery = "SELECT COUNT(*) AS total_books FROM books";
$booksResult = $conn->query($booksQuery);
$booksData = $booksResult->fetch_assoc();
$totalBooks = $booksData['total_books'];


// Fetch issued books
$issuedQuery = "SELECT COUNT(*) AS issued_books FROM transactions WHERE status='issued'";
$issuedResult = $conn->query($issuedQuery);
$issuedData = $issuedResult->fetch_assoc();
$totalIssued = $issuedData['issued_books'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Dashboard</title>
    <link rel="stylesheet" href="../frontend/css/manage.css">
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
                <li><a href="../backend/manage_book.php">Manage Books</a></li>
                <li><a href="../backend/members.php">Manage Members</a></li>
                <li><a href="../backend/transactions.php">Transactions</a></li>
                <li><a href="../backend/about.php">About</a></li>
                <li><a href="../backend/contact.php">Contact</a></li>
                <li><a href="../backend/logout.php">Logout</a></li>
            </ul>
        </aside>
        <main class="main-content">
            <h1>Dashboard Overview</h1>
            <div class="card">
    <h3>Total Books</h3>
    <p><?php echo $totalBooks; ?></p>
</div>
<!--<div class="card">
    <h3>Total Members</h3>
    <p></p>-->
</div>

        </main>
    </div>
    <footer class="footer">
        <p>&copy; 2025 Library Management System. All Rights Reserved.</p>
    </footer>
</body>
</html>