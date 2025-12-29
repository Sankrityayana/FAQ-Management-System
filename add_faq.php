<?php
require_once 'config.php';

$success_message = '';
$error_message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $question = mysqli_real_escape_string($conn, $_POST['question']);
    $answer = mysqli_real_escape_string($conn, $_POST['answer']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);

    if (empty($question) || empty($answer)) {
        $error_message = "Question and Answer are required!";
    } else {
        $sql = "INSERT INTO faqs (question, answer, category) VALUES ('$question', '$answer', '$category')";
        
        if (mysqli_query($conn, $sql)) {
            $success_message = "FAQ added successfully!";
            header("Location: index.php");
            exit();
        } else {
            $error_message = "Error: " . mysqli_error($conn);
        }
    }
}

// Get existing categories
$categories_sql = "SELECT DISTINCT category FROM faqs ORDER BY category";
$categories_result = mysqli_query($conn, $categories_sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New FAQ - FAQ Management System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>➕ Add New FAQ</h1>
            <p class="subtitle">Create a new frequently asked question</p>
        </header>

        <div class="form-container">
            <a href="index.php" class="btn btn-back">← Back to FAQs</a>

            <?php if ($success_message): ?>
                <div class="alert alert-success"><?php echo $success_message; ?></div>
            <?php endif; ?>

            <?php if ($error_message): ?>
                <div class="alert alert-error"><?php echo $error_message; ?></div>
            <?php endif; ?>

            <form method="POST" action="add_faq.php" class="faq-form">
                <div class="form-group">
                    <label for="question">Question *</label>
                    <input type="text" id="question" name="question" required 
                           placeholder="Enter your question here...">
                </div>

                <div class="form-group">
                    <label for="answer">Answer *</label>
                    <textarea id="answer" name="answer" rows="6" required 
                              placeholder="Enter the answer here..."></textarea>
                </div>

                <div class="form-group">
                    <label for="category">Category</label>
                    <input type="text" id="category" name="category" list="categories" 
                           placeholder="Enter or select category..." value="General">
                    <datalist id="categories">
                        <?php while ($cat = mysqli_fetch_assoc($categories_result)): ?>
                            <option value="<?php echo htmlspecialchars($cat['category']); ?>">
                        <?php endwhile; ?>
                    </datalist>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-submit">💾 Save FAQ</button>
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
