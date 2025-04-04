<?php
session_start();
include('Database.php');

$admin = $_SESSION['admin_name'] ?? 'admin';

// Handle Book Issuing
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['issue_book'])) {
    $student_id = mysqli_real_escape_string($conn, $_POST['student_id']);
    $book_id = mysqli_real_escape_string($conn, $_POST['book_id']);
    $issue_date = date('Y-m-d');
    $due_date = date('Y-m-d', strtotime('+7 days'));

    // Proceed to issue book without checking availability
    $insert = "INSERT INTO transactions (student_id, book_id, issue_date, due_date, status, created_by) 
               VALUES ('$student_id', '$book_id', '$issue_date', '$due_date', 'Issued', '$admin')";
    if (mysqli_query($conn, $insert)) {
        header("Location: transactions.php");
        exit();
    } else {
        echo "Error issuing book: " . mysqli_error($conn);
    }
}

// Handle Book Return
if (isset($_GET['return_id'])) {
    $transaction_id = $_GET['return_id'];

    $fetch = mysqli_query($conn, "SELECT * FROM transactions WHERE transaction_id = $transaction_id");
    $trans = mysqli_fetch_assoc($fetch);

    if ($trans) {
        $book_id = $trans['book_id'];
        $due_date = $trans['due_date'];
        $return_date = date('Y-m-d');

        $fine = 0;
        if ($return_date > $due_date) {
            $days_late = (strtotime($return_date) - strtotime($due_date)) / (60 * 60 * 24);
            $fine = $days_late * 10;
        }

        $update = "UPDATE transactions 
                   SET status = 'Returned', return_date = '$return_date', fine_amount = '$fine', updated_by = '$admin' 
                   WHERE transaction_id = $transaction_id";
        if (mysqli_query($conn, $update)) {
            header("Location: transactions.php");
            exit();
        } else {
            echo "Error updating transaction: " . mysqli_error($conn);
        }
    }
}

// Fetch Transactions
$transactionsResult = mysqli_query($conn, "
    SELECT t.*, s.student_name, b.title 
    FROM transactions t
    JOIN students_login s ON t.student_id = s.student_id
    JOIN books b ON t.book_id = b.book_id
    ORDER BY t.issue_date DESC
");

// Fetch all books and members
$booksResult = mysqli_query($conn, "SELECT * FROM books");
$membersResult = mysqli_query($conn, "SELECT * FROM students_login");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Transactions</title>
    <link rel="stylesheet" href="../frontend/css/manage.css">
</head>
<body>
    <header class="header">
        <h1>Library Management System - Transactions</h1>
    </header>

    <div class="dashboard-container">
        <aside class="sidebar">
            <h2>Library System</h2>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="manage_books.php">Manage Books</a></li>
                <li><a href="members.php">Manage Members</a></li>
                <li><a href="transactions.php">Transactions</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </aside>

        <main class="main-content">
            <h2>Issue a Book</h2>
            <form method="POST" action="transactions.php">
                <label for="student_id">Select Member:</label>
                <select name="student_id" required>
                    <?php while ($m = mysqli_fetch_assoc($membersResult)) { ?>
                        <option value="<?php echo $m['student_id']; ?>"><?php echo $m['student_name']; ?></option>
                    <?php } ?>
                </select>

                <label for="book_id">Select Book:</label>
                <select name="book_id" required>
                    <?php while ($b = mysqli_fetch_assoc($booksResult)) { ?>
                        <option value="<?php echo $b['book_id']; ?>">
                            <?php echo $b['title']; ?>
                        </option>
                    <?php } ?>
                </select>

                <button type="submit" name="issue_book">Issue Book</button>
            </form>

            <h2>Transaction History</h2>
            <table border="1" cellpadding="8">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Member</th>
                        <th>Book</th>
                        <th>Issue Date</th>
                        <th>Due Date</th>
                        <th>Return Date</th>
                        <th>Status</th>
                        <th>Fine (₹)</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($t = mysqli_fetch_assoc($transactionsResult)) { ?>
                        <tr>
                            <td><?php echo $t['transaction_id']; ?></td>
                            <td><?php echo $t['student_name']; ?></td>
                            <td><?php echo $t['title']; ?></td>
                            <td><?php echo $t['issue_date']; ?></td>
                            <td><?php echo $t['due_date']; ?></td>
                            <td><?php echo $t['return_date'] ?? 'N/A'; ?></td>
                            <td><?php echo $t['status']; ?></td>
                            <td><?php echo number_format($t['fine_amount'], 2); ?></td>
                            <td>
                                <?php if ($t['status'] == 'Issued') { ?>
                                    <a href="transactions.php?return_id=<?php echo $t['transaction_id']; ?>" onclick="return confirm('Return this book?')">Return</a>
                                <?php } else { ?>
                                    Returned
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </main>
    </div>

    <footer class="footer">
        <p>&copy; 2025 Library Management System. All rights reserved.</p>
    </footer>
</body>
</html>
