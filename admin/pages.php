<?php 
include 'session.php';
$page_title = 'Manage Pages';
$active = 'pages';
include 'conn.php';

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header('Location: login.php');
    exit();
}

$limit = 5;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $limit;
$count = $offset + 1;

$sql = "SELECT * FROM pages LIMIT {$offset},{$limit}";
$result = mysqli_query($conn, $sql);
$total_records = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM pages"));
$total_page = ceil($total_records / $limit);
?>
<!DOCTYPE html>
<html>
<head>
    <?php include 'header.php'; ?>
</head>
<body>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <i class="fas fa-file-alt me-2"></i>Manage Page Content
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Page Name</th>
                                <th>Type</th>
                                <th>Content Preview</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row = mysqli_fetch_assoc($result)): ?>
                            <tr>
                                <td><?php echo $count++; ?></td>
                                <td><strong><?php echo ucwords(str_replace('_', ' ', $row['page_name'])); ?></strong></td>
                                <td><span class="badge bg-info"><?php echo $row['page_type']; ?></span></td>
                                <td><?php echo substr(strip_tags($row['page_data']), 0, 100) . '...'; ?></td>
                                <td>
                                    <a href="update_page_details.php?type=<?php echo $row['page_type']; ?>" 
                                       class="btn btn-primary btn-sm">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <?php if($total_page > 1): ?>
        <nav class="mt-4">
            <ul class="pagination justify-content-center">
                <?php if($page > 1): ?>
                    <li class="page-item"><a class="page-link" href="?page=<?php echo $page-1; ?>">Prev</a></li>
                <?php endif; ?>
                <?php for($i = 1; $i <= $total_page; $i++): ?>
                    <li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>">
                        <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                    </li>
                <?php endfor; ?>
                <?php if($page < $total_page): ?>
                    <li class="page-item"><a class="page-link" href="?page=<?php echo $page+1; ?>">Next</a></li>
                <?php endif; ?>
            </ul>
        </nav>
        <?php endif; ?>
    </div>
</body>
</html>