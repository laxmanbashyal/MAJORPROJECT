<?php
include 'conn.php';
include 'session.php';

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header('Location: login.php');
    exit();
}

if(isset($_GET['id'])) {
    $query_id = mysqli_real_escape_string($conn, $_GET['id']);
    
    // Get query info for notification
    $name_sql = "SELECT query_name FROM contact_query WHERE query_id='{$query_id}'";
    $name_result = mysqli_query($conn, $name_sql);
    $query = mysqli_fetch_assoc($name_result);
    
    // Delete query
    $sql = "DELETE FROM contact_query WHERE query_id='{$query_id}'";
    $result = mysqli_query($conn, $sql);
    
    // Redirect with success message
    header('Location: query.php?deleted=1&name=' . urlencode($query['query_name']));
    exit();
} else {
    header('Location: query.php');
    exit();
}

mysqli_close($conn);
?>