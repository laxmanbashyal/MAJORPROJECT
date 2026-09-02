<?php
include 'conn.php';
include 'session.php';

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header('Location: login.php');
    exit();
}

// Set headers for CSV download
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="donors_list_' . date('Y-m-d') . '.csv"');

// Open output stream
$output = fopen('php://output', 'w');

// Add CSV headers
fputcsv($output, ['Donor ID', 'Name', 'Mobile', 'Email', 'Age', 'Gender', 'Blood Group', 'Address', 'Registered Date']);

// Fetch all donors
$sql = "SELECT d.*, b.blood_group FROM donor_details d JOIN blood b ON d.donor_blood = b.blood_id ORDER BY d.donor_id DESC";
$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($result)) {
    fputcsv($output, [
        $row['donor_id'],
        $row['donor_name'],
        $row['donor_number'],
        $row['donor_mail'],
        $row['donor_age'],
        $row['donor_gender'],
        $row['blood_group'],
        $row['donor_address'],
        date('Y-m-d', strtotime($row['donor_date'] ?? date('Y-m-d')))
    ]);
}

fclose($output);
mysqli_close($conn);
exit();
?>