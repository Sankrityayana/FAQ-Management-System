        <footer>
            <p>&copy; <?php echo date('Y'); ?> FAQ Management System. All rights reserved.</p>
            <p class="footer-links">
                <a href="index.php">Home</a> | 
                <a href="https://github.com/Sankrityayana/FAQ-Management-System" target="_blank">GitHub</a>
            </p>
        </footer>
    </div>

    <script>
        // Add smooth scrolling
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Add confirmation dialog for delete actions
        document.querySelectorAll('.btn-delete').forEach(button => {
            button.addEventListener('click', function(e) {
                if (!confirm('Are you sure you want to delete this FAQ? This action cannot be undone.')) {
                    e.preventDefault();
                }
            });
        });
    </script>
</body>
</html>
