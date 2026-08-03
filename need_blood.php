<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Blood Availability">
    <meta name="author" content="">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Inter Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    </script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js">
    </script>

    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js">
    </script>

    <style>
        :root {
            /* Main Colors */
            --main-red: #E30613;
            --dark-red: #BD0510;
            --hero-red: #D6000F;

            /* Text Colors */
            --main-dark: #0B1F3A;
            --secondary-dark: #172033;
            --muted-grey: #667085;
            --muted-grey-light: #61718A;

            /* Background and Border */
            --light-grey: #F8FAFC;
            --border-grey: #E5E7EB;
            --white: #FFFFFF;

            /* Accent Colors */
            --green: #22C55E;
            --amber: #D97706;
            --blue: #0759FF;
            --purple: #9A16FF;
        }

        /* Main Body */
        body {
            font-family: 'Inter', Arial, sans-serif;
            color: var(--main-dark);
            background: var(--white);
        }

        /* Page Title */
        .page-title {
            color: var(--main-dark);
            font-size: 34px;
            font-weight: 800;
        }

        /* Summary Section - Simple Style */
        .summary-simple {
            display: flex;
            gap: 20px;
            margin-bottom: 30px;
            flex-wrap: wrap;
        }

        .summary-item {
            background: var(--white);
            border: 1px solid var(--border-grey);
            border-radius: 12px;
            padding: 15px 25px;
            text-align: center;
            min-width: 120px;
            flex: 1;
            box-shadow: 0 2px 8px rgba(11, 31, 58, 0.06);
            transition: all 0.3s ease;
        }

        .summary-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 16px rgba(11, 31, 58, 0.1);
        }

        .summary-item .blood-icon {
            font-size: 28px;
            margin-bottom: 5px;
        }

        .summary-item .count {
            font-size: 32px;
            font-weight: 800;
            line-height: 1.2;
        }

        .summary-item .label {
            color: var(--muted-grey);
            font-size: 13px;
            font-weight: 500;
        }

        /* Available - Green */
        .summary-item.available .blood-icon {
            color: var(--green);
        }
        .summary-item.available .count {
            color: var(--green);
        }

        /* Low Stock - Amber */
        .summary-item.low .blood-icon {
            color: var(--amber);
        }
        .summary-item.low .count {
            color: var(--amber);
        }

        /* Critical - Red */
        .summary-item.critical .blood-icon {
            color: var(--main-red);
        }
        .summary-item.critical .count {
            color: var(--main-red);
        }

        /* Blood Stock Section */
        .blood-stock-section {
            background: var(--light-grey);
            border: 1px solid var(--border-grey);
            border-radius: 18px;
            padding: 30px;
        }

        /* Section Heading */
        .blood-section-title {
            color: var(--main-dark);
            font-size: 25px;
            font-weight: 800;
        }

        /* Blood Card */
        .blood-stock-card {
            height: 100%;
            background: var(--white);
            border: 1px solid var(--border-grey);
            border-radius: 16px;
            padding: 25px 20px;
            text-align: center;
            box-shadow: 0 5px 18px rgba(11, 31, 58, 0.06);
            transition: all 0.3s ease;
        }

        /* Card Hover */
        .blood-stock-card:hover {
            transform: translateY(-6px);
            border-color: var(--main-red);
            box-shadow: 0 12px 28px rgba(227, 6, 19, 0.12);
        }

        /* Blood Group Circle */
        .blood-group {
            width: 76px;
            height: 76px;
            margin: 0 auto 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #FFF1F2;
            color: var(--main-red);
            border-radius: 50%;
            font-size: 27px;
            font-weight: 800;
        }

        /* Blood Units */
        .stock-units {
            color: var(--main-dark);
            font-size: 32px;
            font-weight: 800;
            line-height: 1.2;
            margin-bottom: 5px;
        }

        /* Available Units Text */
        .stock-label {
            color: var(--muted-grey);
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 18px;
        }

        /* Status Badge */
        .stock-status {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 8px 16px;
            border-radius: 50px;
            font-size: 13px;
            font-weight: 700;
        }

        /* Available Status */
        .status-available {
            color: #15803D;
            background: #DCFCE7;
        }

        .status-available::before {
            content: "●";
            color: var(--green);
            font-size: 11px;
            margin-right: 7px;
        }

        /* Low Stock Status */
        .status-low {
            color: #B45309;
            background: #FEF3C7;
        }

        .status-low::before {
            content: "●";
            color: var(--amber);
            font-size: 11px;
            margin-right: 7px;
        }

        /* Critical Status */
        .status-critical {
            color: var(--main-red);
            background: #FFF1F2;
        }

        .status-critical::before {
            content: "●";
            color: var(--main-red);
            font-size: 11px;
            margin-right: 7px;
        }

        /* Unavailable Status */
        .status-unavailable {
            color: var(--muted-grey-light);
            background: #F1F5F9;
        }

        .status-unavailable::before {
            content: "●";
            color: var(--purple);
            font-size: 11px;
            margin-right: 7px;
        }

        /* Search Section */
        .search-section {
            background: var(--white);
            border: 1px solid var(--border-grey);
            border-radius: 18px;
            padding: 30px;
            box-shadow: 0 5px 18px rgba(11, 31, 58, 0.05);
        }

        /* Form Labels */
        .form-label-custom {
            color: var(--secondary-dark);
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        /* Form Controls */
        .form-control {
            height: 46px;
            border: 1px solid var(--border-grey);
            border-radius: 9px;
            color: var(--secondary-dark);
            font-family: 'Inter', Arial, sans-serif;
        }

        textarea.form-control {
            height: 100px;
            resize: vertical;
        }

        .form-control:focus {
            border-color: var(--main-red);
            box-shadow: 0 0 0 0.15rem rgba(227, 6, 19, 0.12);
        }

        /* Search Button */
        .search-button {
            background: var(--main-red);
            border: 1px solid var(--main-red);
            color: var(--white);
            padding: 11px 28px;
            border-radius: 9px;
            font-size: 14px;
            font-weight: 700;
            transition: all 0.3s ease;
        }

        .search-button:hover {
            background: var(--dark-red);
            border-color: var(--dark-red);
            color: var(--white);
        }

        /* Blood Result Card — used for search results */
        .blood-result-card {
            height: 100%;
            border: 1px solid var(--border-grey);
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 18px rgba(11, 31, 58, 0.06);
            transition: all 0.3s ease;
            background: var(--white);
            padding: 25px 20px;
            text-align: center;
        }

        .blood-result-card:hover {
            transform: translateY(-5px);
            border-color: var(--main-red);
        }

        .blood-result-group {
            font-size: 28px;
            font-weight: 800;
            color: var(--main-red);
            background: #FFF1F2;
            display: inline-block;
            padding: 8px 24px;
            border-radius: 50px;
            margin-bottom: 18px;
        }

        .blood-result-units {
            font-size: 42px;
            font-weight: 800;
            color: var(--main-dark);
        }

        .blood-result-label {
            color: var(--muted-grey);
            font-size: 15px;
            font-weight: 500;
        }

        .blood-result-location {
            font-size: 15px;
            color: var(--secondary-dark);
            background: var(--light-grey);
            padding: 8px 16px;
            border-radius: 50px;
            display: inline-block;
            margin-top: 8px;
        }

        /* Responsive */
        @media (max-width: 576px) {
            .blood-stock-section {
                padding: 20px;
            }

            .search-section {
                padding: 20px;
            }

            .page-title {
                font-size: 28px;
            }

            .summary-item {
                min-width: 80px;
                padding: 12px 15px;
            }

            .summary-item .count {
                font-size: 24px;
            }
        }
    </style>
</head>

<body>
    <?php
    $active = 'need';
    include('head.php');
    ?>

    <div id="page-container" style="margin-top:50px; position:relative; min-height:84vh;">
        <div class="container">
            <div id="content-wrap" style="padding-bottom:50px;">

                <!-- Page Title -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-title mt-4 mb-4">Blood Availability</h1>
                    </div>
                </div>

                <?php
                // Include database connection
                include 'conn.php';
                
                // Initialize summary variables
                $total_available = 0;
                $total_low = 0;
                $total_critical = 0;

                // Calculate summary statistics
                if (isset($conn) && $conn) {
                    $stock_sql = "
                        SELECT
                            b.blood_id,
                            b.blood_group,
                            COUNT(d.donor_id) AS available_units
                        FROM blood b
                        LEFT JOIN donor_details d
                            ON b.blood_id = d.donor_blood
                        GROUP BY b.blood_id
                    ";

                    $stock_result = mysqli_query($conn, $stock_sql);

                    if ($stock_result && mysqli_num_rows($stock_result) > 0) {
                        while ($stock_row = mysqli_fetch_assoc($stock_result)) {
                            $units = $stock_row['available_units'];
                            
                            if ($units >= 10) {
                                $total_available++;
                            } elseif ($units >= 5) {
                                $total_low++;
                            } elseif ($units > 0) {
                                $total_critical++;
                            }
                        }
                    }
                }
                ?>

                <!-- Simple Summary Section -->
                <div class="summary-simple">
                    <!-- Available -->
                    <div class="summary-item available">
                        <div class="blood-icon">
                            <i class="fas fa-tint"></i>
                        </div>
                        <div class="count"><?php echo $total_available; ?></div>
                        <div class="label">Available</div>
                    </div>

                    <!-- Low Stock -->
                    <div class="summary-item low">
                        <div class="blood-icon">
                            <i class="fas fa-tint"></i>
                        </div>
                        <div class="count"><?php echo $total_low; ?></div>
                        <div class="label">Low Stock</div>
                    </div>

                    <!-- Critical -->
                    <div class="summary-item critical">
                        <div class="blood-icon">
                            <i class="fas fa-tint"></i>
                        </div>
                        <div class="count"><?php echo $total_critical; ?></div>
                        <div class="label">Critical</div>
                    </div>
                </div>

                <!-- Blood Stock -->
                <div class="row mb-5">
                    <div class="col-lg-12">
                        <div class="blood-stock-section">
                            <h3 class="blood-section-title mb-4">Current Blood Stock</h3>
                            <div class="row">
                                <?php
                                // Reset the result pointer or re-run the query for blood stock display
                                if (isset($conn) && $conn) {
                                    $stock_sql = "
                                        SELECT
                                            b.blood_group,
                                            COUNT(d.donor_id) AS available_units
                                        FROM blood b
                                        LEFT JOIN donor_details d
                                            ON b.blood_id = d.donor_blood
                                        GROUP BY b.blood_id
                                    ";

                                    $stock_result = mysqli_query($conn, $stock_sql);

                                    if ($stock_result && mysqli_num_rows($stock_result) > 0) {
                                        while ($stock_row = mysqli_fetch_assoc($stock_result)) {
                                            $units = $stock_row['available_units'];

                                            /* 
                                             * 10 or more = Available
                                             * 5 to 9 = Low Stock
                                             * 1 to 4 = Critical
                                             * 0 = Unavailable
                                             */
                                            if ($units >= 10) {
                                                $status_text = 'Available';
                                                $status_class = 'status-available';
                                            } elseif ($units >= 5) {
                                                $status_text = 'Low Stock';
                                                $status_class = 'status-low';
                                            } elseif ($units > 0) {
                                                $status_text = 'Critical';
                                                $status_class = 'status-critical';
                                            } else {
                                                $status_text = 'Unavailable';
                                                $status_class = 'status-unavailable';
                                            }
                                ?>
                                        <!-- Blood Card -->
                                        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                                            <div class="blood-stock-card">
                                                <div class="blood-group">
                                                    <?php echo htmlspecialchars($stock_row['blood_group']); ?>
                                                </div>
                                                <div class="stock-units">
                                                    <?php echo $units; ?>
                                                </div>
                                                <div class="stock-label">Available Units</div>
                                                <span class="stock-status <?php echo $status_class; ?>">
                                                    <?php echo $status_text; ?>
                                                </span>
                                            </div>
                                        </div>
                                <?php
                                        }
                                    } else {
                                        echo '
                                            <div class="col-12">
                                                <div class="alert alert-info text-center">
                                                    No blood stock information available
                                                </div>
                                            </div>
                                        ';
                                    }
                                } else {
                                    echo '
                                        <div class="col-12">
                                            <div class="alert alert-danger text-center">
                                                Database connection error. Please try again later.
                                            </div>
                                        </div>
                                    ';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Search for Blood -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="search-section">
                            <h3 class="blood-section-title mb-4">Search for Blood</h3>
                            <form name="searchBlood" action="" method="post">
                                <div class="row">
                                    <!-- Blood Group -->
                                    <div class="col-lg-4 mb-4">
                                        <label class="form-label-custom">
                                            Blood Group
                                            <span style="color:#E30613;">*</span>
                                        </label>
                                        <select name="blood_group" class="form-control" required>
                                            <option value="" selected disabled>Select Blood Group</option>
                                            <?php
                                            if (isset($conn) && $conn) {
                                                $sql = "SELECT * FROM blood";
                                                $result = mysqli_query($conn, $sql);

                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                            ?>
                                                        <option value="<?php echo $row['blood_id']; ?>">
                                                            <?php echo htmlspecialchars($row['blood_group']); ?>
                                                        </option>
                                            <?php
                                                    }
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <!-- Location (optional) -->
                                    <div class="col-lg-4 mb-4">
                                        <label class="form-label-custom">
                                            Location (City / Area)
                                            <span style="color:#E30613;">*</span>
                                        </label>
                                        <input type="text" class="form-control" name="location" placeholder="e.g Butwal-12-tamnager" required>
                                    </div>

                                    <!-- Reason / note (optional) -->
                                    <div class="col-lg-4 mb-4">
                                        <label class="form-label-custom">
                                            Reason (optional)
                                        </label>
                                        <input type="text" class="form-control" name="reason" placeholder="Why do you need blood?">
                                    </div>
                                </div>

                                <!-- Search Button -->
                                <div class="row">
                                    <div class="col-lg-4">
                                        <input type="submit" name="search_blood" class="btn search-button" value="Search Blood" style="cursor:pointer">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Blood Search Results -->
                <div class="row mt-5">
                    <?php
                    if (isset($_POST['search_blood'])) {
                        // Check connection
                        if (isset($conn) && $conn) {
                            $blood_id = mysqli_real_escape_string($conn, $_POST['blood_group']);
                            $location = mysqli_real_escape_string($conn, $_POST['location']);

                            // Query to get blood availability for the selected group
                            $sql = "
                                SELECT 
                                    b.blood_group,
                                    COUNT(d.donor_id) AS available_units,
                                    b.blood_id
                                FROM blood b
                                LEFT JOIN donor_details d 
                                    ON b.blood_id = d.donor_blood
                                WHERE b.blood_id = '{$blood_id}'
                                GROUP BY b.blood_id
                            ";

                            $result = mysqli_query($conn, $sql);

                            if ($result && mysqli_num_rows($result) > 0) {
                                $row = mysqli_fetch_assoc($result);
                                $units = $row['available_units'];
                                $group = htmlspecialchars($row['blood_group']);

                                // Determine status
                                if ($units >= 10) {
                                    $status_text = 'Available';
                                    $status_class = 'status-available';
                                } elseif ($units >= 5) {
                                    $status_text = 'Low Stock';
                                    $status_class = 'status-low';
                                } elseif ($units > 0) {
                                    $status_text = 'Critical';
                                    $status_class = 'status-critical';
                                } else {
                                    $status_text = 'Unavailable';
                                    $status_class = 'status-unavailable';
                                }
                    ?>
                                <!-- Single Result Card -->
                                <div class="col-lg-4 col-md-6 mb-4">
                                    <div class="blood-result-card">
                                        <div class="blood-result-group"><?php echo $group; ?></div>
                                        <div class="blood-result-units"><?php echo $units; ?></div>
                                        <div class="blood-result-label">Available Units</div>
                                        <div style="margin: 12px 0;">
                                            <span class="stock-status <?php echo $status_class; ?>">
                                                <?php echo $status_text; ?>
                                            </span>
                                        </div>
                                        <div class="blood-result-location">
                                            <i class="fas fa-map-marker-alt" style="margin-right:6px;color:var(--main-red);"></i>
                                            <?php echo htmlspecialchars($location); ?>
                                        </div>
                                        <?php if (!empty($_POST['reason'])): ?>
                                            <div style="margin-top:14px;font-size:14px;color:var(--muted-grey);">
                                                <i class="fas fa-comment" style="margin-right:6px;"></i>
                                                <?php echo htmlspecialchars($_POST['reason']); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                    <?php
                            } else {
                                echo '
                                    <div class="col-12">
                                        <div class="alert alert-danger text-center">
                                            No blood available for the selected group.
                                        </div>
                                    </div>
                                ';
                            }
                        } else {
                            echo '
                                <div class="col-12">
                                    <div class="alert alert-danger text-center">
                                        Database connection error. Please try again later.
                                    </div>
                                </div>
                            ';
                        }
                    }
                    ?>
                </div>

            </div>
        </div>
        <?php include 'footer.php'; ?>
    </div>

</body>

</html>