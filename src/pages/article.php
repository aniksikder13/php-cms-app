<?php 
    require_once "../partials/header.php";
    include base_path("partials/nav.php");

    $id = isset($_GET['id']) ? intval($_GET['id']) : null;

    $article = new Article();
    $data =$article->get_by_id($id);
?>

    <!-- Article Header -->
    <header class="bg-dark text-white py-5">
        <div class="container">
            <h1 class="display-4"><?= htmlspecialchars($data->title ?? "") ?></h1>
            <p class="lead">
            <?= $article->get_excerpt(htmlspecialchars($data->content ?? "")) ?>
            </p>
            <p>
                <small>
                    By <a href="#" class="text-white text-decoration-underline"><?= htmlspecialchars($data->first_name . " " . $data->last_name) ?></a> <!-- Add Author Name Here -->
                    |
                    <span>Published on <?= date("F j, Y", strtotime(htmlspecialchars($data->created_at ?? ""))); ?></span> <!-- Example: January 1, 2045 -->
                </small>
            </p>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container my-5">
        <!-- Featured Image -->
        <div class="mb-4">
            <img
                src="<?= htmlspecialchars($data->image ?? "") ?>"
                class="img-fluid w-100"
                alt="Featured Image"
            >
        </div>
        <!-- Article Content -->
        <article>
        <?= htmlspecialchars($data->content ?? "") ?>
        </article>

        <!-- Comments Section Placeholder -->
        <section class="mt-5">
            <h3>Comments</h3>
            <p>
                <!-- Placeholder for comments -->
                Comments functionality will be implemented here.
            </p>
        </section>

        <!-- Back to Home Button -->
        <div class="mt-4">
            <a href="/index.php" class="btn btn-secondary">← Back to Home</a>
        </div>
    </main>

<?php 
    include base_path("partials/footer.php");
?>