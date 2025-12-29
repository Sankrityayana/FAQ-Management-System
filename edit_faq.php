<?php
require_once 'config.php';

$success_message = '';
$error_message = '';

// Get FAQ ID
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = intval($_GET['id']);

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $question = mysqli_real_escape_string($conn, $_POST['question']);
    $answer = mysqli_real_escape_string($conn, $_POST['answer']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);

    if (empty($question) || empty($answer)) {
        $error_message = "Question and Answer are required!";
    } else {
        $sql = "UPDATE faqs SET question='$question', answer='$answer', category='$category' WHERE id=$id";
        
        if (mysqli_query($conn, $sql)) {
            $success_message = "FAQ updated successfully!";
            header("Location: index.php");
            exit();
        } else {
            $error_message = "Error: " . mysqli_error($conn);
        }
    }
}

// Get FAQ data
$sql = "SELECT * FROM faqs WHERE id = $id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 0) {
    header("Location: index.php");
    exit();
}

$faq = mysqli_fetch_assoc($result);

// Get existing categories
$categories_sql = "SELECT DISTINCT category FROM faqs ORDER BY category";
$categories_result = mysqli_query($conn, $categories_sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit FAQ - FAQ Management System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>✏️ Edit FAQ</h1>
            <p class="subtitle">Update frequently asked question</p>
        </header>

        <div class="form-container">
            <a href="index.php" class="btn btn-back">← Back to FAQs</a>

            <?php if ($success_message): ?>
                <div class="alert alert-success"><?php echo $success_message; ?></div>
            <?php endif; ?>

            <?php if ($error_message): ?>
                <div class="alert alert-error"><?php echo $error_message; ?></div>
            <?php endif; ?>

            <form method="POST" action="edit_faq.php?id=<?php echo $id; ?>" class="faq-form">
                <div class="form-group">
                    <label for="question">Question *</label>
                    <input type="text" id="question" name="question" required 
                           value="<?php echo htmlspecialchars($faq['question']); ?>"
                           placeholder="Enter your question here...">
                </div>

                <div class="form-group">
                    <label for="answer">Answer *</label>
                    <textarea id="answer" name="answer" rows="6" required 
                              placeholder="Enter the answer here..."><?php echo htmlspecialchars($faq['answer']); ?></textarea>
                </div>

                <div class="form-group">
                    <label for="category">Category</label>
                    <input type="text" id="category" name="category" list="categories" 
                           value="<?php echo htmlspecialchars($faq['category']); ?>"
                           placeholder="Enter or select category...">
                    <datalist id="categories">
                        <?php while ($cat = mysqli_fetch_assoc($categories_result)): ?>
                            <option value="<?php echo htmlspecialchars($cat['category']); ?>">
                        <?php endwhile; ?>
                    </datalist>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-submit">💾 Update FAQ</button>
                    <a href="index.php" class="btn btn-cancel">Cancel</a>
                </div>
            </form>
        </div>

        <footer>
            <p>&copy; 2025 FAQ Management System. All rights reserved.</p>
        </footer>
    </div>
</body>
</html>
