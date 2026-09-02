<?php
include 'conn.php';
include 'session.php';

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header('Location: login.php');
    exit();
}

if(isset($_GET['id'])) {
    $donor_id = mysqli_real_escape_string($conn, $_GET['id']);
    
    // Get donor name for notification
    $name_sql = "SELECT donor_name FROM donor_details WHERE donor_id='{$donor_id}'";
    $name_result = mysqli_query($conn, $name_sql);
    $donor = mysqli_fetch_assoc($name_result);
    
    // Delete donor
    $sql = "DELETE FROM donor_details WHERE donor_id='{$donor_id}'";
    $result = mysqli_query($conn, $sql);
    
    // Redirect with success message
    header('Location: donor_list.php?deleted=1&name=' . urlencode($donor['donor_name']));
    exit();
} else {
    header('Location: donor_list.php');
    exit();
}

mysqli_close($conn);
?>