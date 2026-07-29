<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['fullname'] ?? '');
    $number = trim($_POST['mobileno'] ?? '');
    $email = trim($_POST['emailid'] ?? '');
    $age = trim($_POST['age'] ?? '');
    $gender = trim($_POST['gender'] ?? '');
    $blood_group = trim($_POST['blood'] ?? '');
    $address = trim($_POST['address'] ?? '');

    $conn = mysqli_connect("localhost", "root", "", "blood_donation") or die("Connection error");
    $sql = "INSERT INTO donor_details(donor_name, donor_number, donor_mail, donor_age, donor_gender, donor_blood, donor_address) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'sssssss', $name, $number, $email, $age, $gender, $blood_group, $address);
    mysqli_stmt_execute($stmt) or die("query unsuccessful.");
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    header("Location: home.php");
    exit;
}
?>
