<?php
session_start();
include 'conn.php';

// Check if user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header('Location: login.php');
    exit();
}

// Validate and sanitize inputs
$name = mysqli_real_escape_string($conn, trim($_POST['fullname']));
$number = mysqli_real_escape_string($conn, trim($_POST['mobileno']));
$email = mysqli_real_escape_string($conn, trim($_POST['emailid']));
$age = mysqli_real_escape_string($conn, trim($_POST['age']));
$gender = mysqli_real_escape_string($conn, trim($_POST['gender']));
$blood_group = mysqli_real_escape_string($conn, trim($_POST['blood']));
$address = mysqli_real_escape_string($conn, trim($_POST['address']));

// Validation
$errors = array();

if(empty($name)) {
    $errors[] = "Full name is required";
}
if(empty($number)) {
    $errors[] = "Mobile number is required";
} elseif(!preg_match('/^[0-9]{10}$/', $number)) {
    $errors[] = "Mobile number must be 10 digits";
}
if(!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email format";
}
if(empty($age)) {
    $errors[] = "Age is required";
} elseif(!is_numeric($age) || $age < 18 || $age > 65) {
    $errors[] = "Age must be between 18 and 65";
}
if(empty($gender) || !in_array($gender, ['Male', 'Female', 'Other'])) {
    $errors[] = "Valid gender is required";
}
if(empty($blood_group)) {
    $errors[] = "Blood group is required";
}
if(empty($address)) {
    $errors[] = "Address is required";
}

// Check for duplicate mobile number
if(empty($errors)) {
    $check_sql = "SELECT donor_id FROM donor_details WHERE donor_number='{$number}'";
    $check_result = mysqli_query($conn, $check_sql);
    if(mysqli_num_rows($check_result) > 0) {
        $errors[] = "Mobile number already registered!";
    }
}

// If errors exist, redirect back with errors
if(!empty($errors)) {
    $_SESSION['donor_errors'] = $errors;
    $_SESSION['donor_data'] = $_POST;
    header('Location: add_donor.php?error=1');
    exit();
}

// Insert donor
$sql = "INSERT INTO donor_details(donor_name, donor_number, donor_mail, donor_age, donor_gender, donor_blood, donor_address) 
        VALUES('{$name}', '{$number}', '{$email}', '{$age}', '{$gender}', '{$blood_group}', '{$address}')";

if(mysqli_query($conn, $sql)) {
    $donor_id = mysqli_insert_id($conn);
    header('Location: donor_list.php?success=1&name=' . urlencode($name));
} else {
    header('Location: add_donor.php?error=db');
}

mysqli_close($conn);
?>