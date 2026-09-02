<?php 

include 'session.php';
$page_title = 'Dashboard';
$active = 'dashboard';
include 'conn.php';

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header('Location: login.php');
    exit();
}

// Fetch stats
$donors = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM donor_details"));
$queries = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM contact_query"));
$pending = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM contact_query WHERE query_status=2"));
$read = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM contact_query WHERE query_status=1"));

// Blood group distribution
$blood_groups = [];
$blood_sql = "SELECT b.blood_group, COUNT(d.donor_id) as count 
              FROM donor_details d 
              JOIN blood b ON d.donor_blood = b.blood_id 
              GROUP BY b.blood_group";
$blood_result = mysqli_query($conn, $blood_sql);
while($row = mysqli_fetch_assoc($blood_result)) {
    $blood_groups[$row['blood_group']] = $row['count'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <?php include 'header.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .blood-card { 
            background: white; 
            border-radius: 12px; 
            padding: 15px; 
            text-align: center;
            box-shadow: var(--shadow);
            transition: var(--transition);
        }
        .blood-card:hover { transform: scale(1.05); }
        .blood-card .blood-type { 
            font-size: 24px; 
            font-weight: 700; 
            color: var(--primary-red);
        }
        .blood-card .blood-count { 
            font-size: 18px; 
            color: #2c3e50;
        }
        .blood-dot {
            display: inline-block;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            margin-right: 8px;
        }
    </style>
</head>
<body>

    <div class="container-fluid">
        <!-- Welcome Banner -->
        <div class="card bg-danger text-white mb-4" style="background: var(--primary-gradient) !important;">
            <div class="card-body">
                <h2 class="mb-2"><i class="fas fa-heartbeat me-3"></i>Welcome to Blood Bank Admin</h2>
                <p class="mb-0">Manage donors, blood inventory, and user queries all from one dashboard.</p>
            </div>
        </div>

        <!-- Stats Row -->
        <div class="row g-4 mb-4">
            <div class="col-lg-3 col-md-6">
                <div class="stat-card">
                    <h3 class="stat-number"><?php echo $donors; ?></h3>
                    <p class="stat-label"><i class="fas fa-user me-2"></i>Total Donors</p>
                    <div class="stat-icon"><i class="fas fa-users"></i></div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stat-card" style="border-left-color: #2196F3;">
                    <h3 class="stat-number" style="color: #2196F3;"><?php echo $queries; ?></h3>
                    <p class="stat-label"><i class="fas fa-envelope me-2"></i>Total Queries</p>
                    <div class="stat-icon" style="color: #2196F3;"><i class="fas fa-envelope"></i></div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stat-card" style="border-left-color: #FF9800;">
                    <h3 class="stat-number" style="color: #FF9800;"><?php echo $pending; ?></h3>
                    <p class="stat-label"><i class="fas fa-clock me-2"></i>Pending Queries</p>
                    <div class="stat-icon" style="color: #FF9800;"><i class="fas fa-clock"></i></div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stat-card" style="border-left-color: #4CAF50;">
                    <h3 class="stat-number" style="color: #4CAF50;"><?php echo $read; ?></h3>
                    <p class="stat-label"><i class="fas fa-check-circle me-2"></i>Read Queries</p>
                    <div class="stat-icon" style="color: #4CAF50;"><i class="fas fa-check-circle"></i></div>
                </div>
            </div>
        </div>

        <!-- Blood Group Distribution & Chart -->
        <div class="row g-4">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-chart-bar me-2"></i>Blood Group Distribution
                    </div>
                    <div class="card-body">
                        <canvas id="bloodChart" height="200"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-tint me-2"></i>Blood Groups Available
                    </div>
                    <div class="card-body">
                        <?php if(!empty($blood_groups)): ?>
                            <?php foreach($blood_groups as $group => $count): ?>
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div>
                                        <span class="blood-dot" style="background: <?php echo $group == 'A+' ? '#D32F2F' : ($group == 'B+' ? '#1976D2' : ($group == 'AB+' ? '#388E3C' : '#F57C00')); ?>"></span>
                                        <strong><?php echo $group; ?></strong>
                                    </div>
                                    <span class="badge bg-danger rounded-pill"><?php echo $count; ?></span>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p class="text-muted text-center">No donors registered yet.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Donors -->
        <div class="card mt-4">
            <div class="card-header">
                <i class="fas fa-users me-2"></i>Recent Donors
                <a href="donor_list.php" class="btn btn-sm btn-light float-end">View All</a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Blood Group</th>
                                <th>Mobile</th>
                                <th>Gender</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $recent = mysqli_query($conn, "SELECT d.*, b.blood_group FROM donor_details d JOIN blood b ON d.donor_blood = b.blood_id ORDER BY d.donor_id DESC LIMIT 5");
                            $i = 1;
                            while($row = mysqli_fetch_assoc($recent)):
                            ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $row['donor_name']; ?></td>
                                <td><span class="badge bg-danger"><?php echo $row['blood_group']; ?></span></td>
                                <td><?php echo $row['donor_number']; ?></td>
                                <td><?php echo $row['donor_gender']; ?></td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Blood Group Chart
        const ctx = document.getElementById('bloodChart').getContext('2d');
        const bloodData = <?php echo json_encode(array_values($blood_groups)); ?>;
        const bloodLabels = <?php echo json_encode(array_keys($blood_groups)); ?>;
        
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: bloodLabels,
                datasets: [{
                    label: 'Donors',
                    data: bloodData,
                    backgroundColor: ['#D32F2F', '#1976D2', '#388E3C', '#F57C00', '#7B1FA2', '#00838F', '#C2185B', '#455A64'],
                    borderRadius: 8,
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    y: { beginAtZero: true, grid: { color: '#f0f0f0' } },
                    x: { grid: { display: false } }
                }
            }
        });
    </script>
</body>
</html>