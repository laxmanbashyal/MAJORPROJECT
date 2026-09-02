<?php 
include 'session.php';
$page_title = 'Donor List';
$active = 'list';
include 'conn.php';

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header('Location: login.php');
    exit();
}

// Check for success/deleted messages
$success_msg = '';
$deleted_msg = '';

if(isset($_GET['success'])) {
    $success_msg = 'Donor <strong>' . htmlspecialchars(urldecode($_GET['name'])) . '</strong> added successfully!';
}

if(isset($_GET['deleted'])) {
    $deleted_msg = 'Donor <strong>' . htmlspecialchars(urldecode($_GET['name'])) . '</strong> deleted successfully!';
}

$limit = 10;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $limit;
$count = $offset + 1;

$sql = "SELECT * FROM donor_details JOIN blood ON donor_details.donor_blood = blood.blood_id ORDER BY donor_id DESC LIMIT {$offset},{$limit}";
$result = mysqli_query($conn, $sql);

$total_records = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM donor_details"));
$total_page = ceil($total_records / $limit);
?>
<!DOCTYPE html>
<html>
<head>
    <?php include 'header.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
            <div>
                <h4 class="mb-0"><i class="fas fa-users me-2"></i>Donor List</h4>
                <small class="text-muted">Total <?php echo $total_records; ?> donors registered</small>
            </div>
            <div class="d-flex gap-2">
                <a href="export_donors.php" class="btn btn-success">
                    <i class="fas fa-file-export me-2"></i>Export CSV
                </a>
                <a href="add_donor.php" class="btn btn-primary">
                    <i class="fas fa-user-plus me-2"></i>Add New Donor
                </a>
            </div>
        </div>

        <!-- Success Messages -->
        <?php if($success_msg): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i> <?php echo $success_msg; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>
        
        <?php if($deleted_msg): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-trash me-2"></i> <?php echo $deleted_msg; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <!-- Search Bar -->
        <div class="card mb-4">
            <div class="card-body">
                <form method="get" class="row g-3">
                    <div class="col-md-10">
                        <input type="text" name="search" class="form-control" placeholder="Search donors by name, mobile, email or blood group..." value="<?php echo htmlspecialchars($_GET['search'] ?? ''); ?>">
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="fas fa-search me-2"></i>Search
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="table-container">
            <?php 
            // If search is performed
            if(isset($_GET['search']) && !empty($_GET['search'])) {
                $search = mysqli_real_escape_string($conn, $_GET['search']);
                $search_sql = "SELECT * FROM donor_details JOIN blood ON donor_details.donor_blood = blood.blood_id 
                              WHERE donor_name LIKE '%$search%' 
                              OR donor_number LIKE '%$search%' 
                              OR donor_mail LIKE '%$search%' 
                              OR blood_group LIKE '%$search%'
                              ORDER BY donor_id DESC";
                $result = mysqli_query($conn, $search_sql);
                $total_records = mysqli_num_rows($result);
            }
            ?>

            <?php if(mysqli_num_rows($result) > 0): ?>
            <div class="table-responsive">
                <table class="table" id="donorTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Blood Group</th>
                            <th>Mobile</th>
                            <th>Email</th>
                            <th>Age</th>
                            <th>Gender</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $i = 1;
                        while($row = mysqli_fetch_assoc($result)): 
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><strong><?php echo htmlspecialchars($row['donor_name']); ?></strong></td>
                            <td><span class="badge bg-danger"><?php echo $row['blood_group']; ?></span></td>
                            <td><?php echo htmlspecialchars($row['donor_number']); ?></td>
                            <td><?php echo htmlspecialchars($row['donor_mail'] ?: '-'); ?></td>
                            <td><?php echo $row['donor_age']; ?></td>
                            <td><?php echo $row['donor_gender']; ?></td>
                            <td><?php echo substr(htmlspecialchars($row['donor_address']), 0, 30) . '...'; ?></td>
                            <td>
                                <a href="javascript:void(0)" 
                                   onclick="confirmDelete(<?php echo $row['donor_id']; ?>, '<?php echo addslashes($row['donor_name']); ?>')" 
                                   class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>

            <?php if($total_records > $limit && !isset($_GET['search'])): ?>
            <!-- Pagination -->
            <nav class="mt-4">
                <ul class="pagination justify-content-center">
                    <?php if($page > 1): ?>
                        <li class="page-item"><a class="page-link" href="?page=<?php echo $page-1; ?>"><i class="fas fa-chevron-left"></i> Prev</a></li>
                    <?php endif; ?>
                    
                    <?php for($i = 1; $i <= $total_page; $i++): ?>
                        <li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>">
                            <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                        </li>
                    <?php endfor; ?>
                    
                    <?php if($page < $total_page): ?>
                        <li class="page-item"><a class="page-link" href="?page=<?php echo $page+1; ?>">Next <i class="fas fa-chevron-right"></i></a></li>
                    <?php endif; ?>
                </ul>
            </nav>
            <?php endif; ?>

            <?php else: ?>
                <div class="text-center py-5">
                    <i class="fas fa-users fa-3x text-muted mb-3"></i>
                    <p class="text-muted"><?php echo isset($_GET['search']) ? 'No donors found matching your search.' : 'No donors registered yet.'; ?></p>
                    <a href="add_donor.php" class="btn btn-primary">Add First Donor</a>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <script>
        function confirmDelete(id, name) {
            Swal.fire({
                title: 'Are you sure?',
                html: `You are about to delete donor <strong>${name}</strong>.<br>This action cannot be undone!`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: '<i class="fas fa-trash me-2"></i>Yes, delete!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'delete.php?id=' + id;
                }
            });
        }
    </script>
</body>
</html>