<?php
include_once 'admin/function/db_connect.php';
include_once 'admin/function/function.php';
include 'header.php'; // Include header

// Check if article ID is provided in the URL
if(isset($_GET['id'])) {
    $article_id = $_GET['id'];
    
    // Fetch article details from the database
    $query = "SELECT * FROM blog WHERE id = $article_id";
    $result = mysqli_query($con, $query);
    
    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $title = $row['title'];
        $content = $row['content'];
        $image_path = 'admin/' . $row['featimg'];
        $created_date = $row['crtdat'];
?>

    <!-- Article Content Section -->
    <section class="article-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Display Featured Image -->
                    <img src="<?php echo $image_path; ?>" alt="Featured Image" class="img-fluid mb-4">
                    <!-- Display Article Title -->
                    <h1 class="article-title"><?php echo $title; ?></h1>
                    <!-- Display Article Content -->
                    <div class="article-content">
                        <?php echo $content; ?>
                    </div>
                    <!-- Display Created Date -->
                    <p class="text-muted">Published on: <?php echo $created_date; ?></p>
                </div>
            </div>
        </div>
    </section>

<?php
    } else {
        echo "Article not found.";
    }
} else {
    echo "Article ID not provided.";
}

include 'footer.php'; // Include footer
?>
