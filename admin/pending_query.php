<?php 
include 'session.php';
$page_title = 'Pending Queries';
$active = 'pending';
include 'conn.php';

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header('Location: login.php');
    exit();
}

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    mysqli_query($conn, "UPDATE contact_query SET query_status='1' WHERE query_id={$id}");
    header('Location: pending_query.php?marked=1');
    exit();
}

$success_msg = '';
if(isset($_GET['marked'])) {
    $success_msg = 'Query marked as read successfully!';
}

$limit = 10;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $limit;
$count = $offset + 1;

$sql = "SELECT * FROM contact_query WHERE query_status=2 ORDER BY query_id DESC LIMIT {$offset},{$limit}";
$result = mysqli_query($conn, $sql);
$total_records = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM contact_query WHERE query_status=2"));
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
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="mb-0"><i class="fas fa-clock me-2"></i>Pending Queries</h4>
                <small class="text-muted"><?php echo $total_records; ?> queries pending review</small>
            </div>
            <a href="query.php" class="btn btn-outline-secondary">
                <i class="fas fa-envelope me-2"></i>All Queries
            </a>
        </div>

        <?php if($success_msg): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i> <?php echo $success_msg; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <div class="table-container">
            <?php if(mysqli_num_rows($result) > 0): ?>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Message</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?php echo $count++; ?></td>
                            <td><strong><?php echo htmlspecialchars($row['query_name']); ?></strong></td>
                            <td><?php echo htmlspecialchars($row['query_mail']); ?></td>
                            <td><?php echo htmlspecialchars($row['query_number']); ?></td>
                            <td><?php echo substr(htmlspecialchars($row['query_message']), 0, 50) . '...'; ?></td>
                            <td><?php echo date('d M Y', strtotime($row['query_date'])); ?></td>
                            <td><span class="badge-status pending"><i class="fas fa-clock me-1"></i>Pending</span></td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="?id=<?php echo $row['query_id']; ?>" class="btn btn-success"
                                       onclick="return confirmMark(<?php echo $row['query_id']; ?>, '<?php echo addslashes($row['query_name']); ?>')">
                                        <i class="fas fa-check"></i> Mark Read
                                    </a>
                                    <a href="javascript:void(0)" 
                                       onclick="confirmDeleteQuery(<?php echo $row['query_id']; ?>, '<?php echo addslashes($row['query_name']); ?>')" 
                                       class="btn btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
            <?php else: ?>
                <div class="text-center py-5">
                    <i class="fas fa-check-circle fa-3x text-success mb-3"></i>
                    <p class="text-muted">All queries have been read!</p>
                    <a href="query.php" class="btn btn-primary">View All Queries</a>
                </div>
            <?php endif; ?>

            <!-- Pagination -->
            <?php if($total_page > 1): ?>
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
        </div>
    </div>

    <script>
        function confirmMark(id, name) {
            Swal.fire({
                title: 'Mark as Read?',
                html: `Mark query from <strong>${name}</strong> as read?`,
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#28a745',
                cancelButtonColor: '#6c757d',
                confirmButtonText: '<i class="fas fa-check me-2"></i>Yes, mark as read'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '?id=' + id;
                }
            });
            return false;
        }

        function confirmDeleteQuery(id, name) {
            Swal.fire({
                title: 'Delete Query?',
                html: `Delete query from <strong>${name}</strong>?<br>This action cannot be undone!`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: '<i class="fas fa-trash me-2"></i>Yes, delete!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'delete_query.php?id=' + id;
                }
            });
            return false;
        }
    </script>
</body>
</html>