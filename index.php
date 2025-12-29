<?php
require_once 'config.php';

// Get all FAQs with optional category filter
$category_filter = isset($_GET['category']) ? $_GET['category'] : '';
$search_query = isset($_GET['search']) ? $_GET['search'] : '';

$sql = "SELECT * FROM faqs WHERE 1=1";
if ($category_filter) {
    $sql .= " AND category = '" . mysqli_real_escape_string($conn, $category_filter) . "'";
}
if ($search_query) {
    $sql .= " AND (question LIKE '%" . mysqli_real_escape_string($conn, $search_query) . "%' OR answer LIKE '%" . mysqli_real_escape_string($conn, $search_query) . "%')";
}
$sql .= " ORDER BY created_at DESC";

$result = mysqli_query($conn, $sql);

// Get all categories
$categories_sql = "SELECT DISTINCT category FROM faqs ORDER BY category";
$categories_result = mysqli_query($conn, $categories_sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ Management System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>📚 FAQ Management System</h1>
            <p class="subtitle">Manage your frequently asked questions efficiently</p>
        </header>

        <div class="controls">
            <a href="add_faq.php" class="btn btn-add">+ Add New FAQ</a>
            
            <div class="filters">
                <form method="GET" action="index.php" class="filter-form">
                    <input type="text" name="search" placeholder="🔍 Search FAQs..." value="<?php echo htmlspecialchars($search_query); ?>" class="search-input">
                    
                    <select name="category" class="category-select" onchange="this.form.submit()">
                        <option value="">All Categories</option>
                        <?php while ($cat = mysqli_fetch_assoc($categories_result)): ?>
                            <option value="<?php echo htmlspecialchars($cat['category']); ?>" 
                                <?php echo $category_filter == $cat['category'] ? 'selected' : ''; ?>>
                                <?php echo htmlspecialchars($cat['category']); ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                    
                    <button type="submit" class="btn btn-filter">Filter</button>
                    <?php if ($category_filter || $search_query): ?>
                        <a href="index.php" class="btn btn-reset">Clear</a>
                    <?php endif; ?>
                </form>
            </div>
        </div>

        <div class="faq-list">
            <?php if (mysqli_num_rows($result) > 0): ?>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <div class="faq-item">
                        <div class="faq-header">
                            <span class="category-badge"><?php echo htmlspecialchars($row['category']); ?></span>
                            <div class="faq-actions">
                                <a href="edit_faq.php?id=<?php echo $row['id']; ?>" class="btn btn-edit">✏️ Edit</a>
                                <a href="delete_faq.php?id=<?php echo $row['id']; ?>" 
                                   class="btn btn-delete" 
                                   onclick="return confirm('Are you sure you want to delete this FAQ?')">🗑️ Delete</a>
                            </div>
                        </div>
                        <div class="faq-content">
                            <h3 class="question">Q: <?php echo htmlspecialchars($row['question']); ?></h3>
                            <p class="answer">A: <?php echo nl2br(htmlspecialchars($row['answer'])); ?></p>
                            <div class="faq-meta">
                                <small>Created: <?php echo date('M d, Y', strtotime($row['created_at'])); ?></small>
                                <?php if ($row['updated_at'] != $row['created_at']): ?>
                                    <small>Updated: <?php echo date('M d, Y', strtotime($row['updated_at'])); ?></small>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <div class="no-results">
                    <p>📭 No FAQs found. Start by adding your first FAQ!</p>
                </div>
            <?php endif; ?>
        </div>

        <footer>
            <p>&copy; 2025 FAQ Management System. All rights reserved.</p>
        </footer>
    </div>

    <script>
        // Add smooth scrolling
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
</body>
</html>
