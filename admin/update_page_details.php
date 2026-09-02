<?php 
include 'session.php';
$page_title = 'Update Page';
$active = 'pages';
include 'conn.php';

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header('Location: login.php');
    exit();
}

$type = $_GET['type'];

if(isset($_POST['submit'])) {
    $data = mysqli_real_escape_string($conn, $_POST['data']);
    $sql = "UPDATE pages SET page_data='{$data}' WHERE page_type='{$type}'";
    mysqli_query($conn, $sql);
    $success = "Page updated successfully!";
}

// Get current data
$sql = "SELECT * FROM pages WHERE page_type='{$type}'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
    <?php include 'header.php'; ?>
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <i class="fas fa-edit me-2"></i>Edit Page: 
                <strong><?php echo ucwords(str_replace('_', ' ', $type)); ?></strong>
            </div>
            <div class="card-body">
                <?php if(isset($success)): ?>
                    <div class="alert alert-success"><?php echo $success; ?></div>
                <?php endif; ?>
                
                <form method="post">
                    <div class="mb-3">
                        <label class="form-label">Page Content</label>
                        <textarea name="data" id="editor" rows="10" class="form-control">
                            <?php echo htmlspecialchars($row['page_data'] ?? ''); ?>
                        </textarea>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Update Page
                    </button>
                    <a href="pages.php" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Back to Pages
                    </a>
                </form>
            </div>
        </div>
    </div>

    <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {
                toolbar: ['bold', 'italic', 'underline', 'strikethrough', '|', 
                         'bulletedList', 'numberedList', '|', 
                         'link', 'blockQuote', '|', 
                         'undo', 'redo']
            })
            .catch(error => {
                console.error(error);
            });
    </script>
</body>
</html>