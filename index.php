<?php
session_start();
if (isset($_SESSION['user_role'])) {
    switch ($_SESSION['user_role']) {
        case 'student': header("Location: student/dashboard.php"); break;
        case 'faculty': header("Location: faculty/dashboard.php"); break;
        case 'admin':   header("Location: admin/dashboard.php");   break;
    }
    exit;
}
header("Location: login.html");
exit;
?>
