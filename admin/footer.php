<!-- Footer -->
<footer class="main-footer">
    <div class="footer-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 text-md-start text-center">
                    <strong>© <?php echo date('Y'); ?> Blood Bank & Donation Management System</strong>
                    <span class="text-muted">| All rights reserved</span>
                </div>
                <div class="col-md-6 text-md-end text-center">
                    <span class="text-muted">Built with <i class="fas fa-heart text-danger"></i> for humanity</span>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Styles for footer -->
<style>
.main-footer {
    background: white;
    padding: 20px 0;
    margin-top: 40px;
    border-top: 3px solid var(--primary-red);
    box-shadow: 0 -4px 20px rgba(0,0,0,0.05);
}
.footer-content {
    color: #2c3e50;
    font-size: 14px;
}
.footer-content .text-danger {
    color: var(--primary-red) !important;
}
@media (max-width: 768px) {
    .footer-content .col-md-6 {
        margin-bottom: 8px;
    }
}
</style>