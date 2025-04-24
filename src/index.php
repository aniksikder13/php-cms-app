<?php 
    require_once "partials/header.php";
    include base_path("partials/nav.php");
    include base_path("partials/hero.php");

    $articles = new Article();
    $data = $articles->get_all();

?>
    <!-- Main Content -->
    <main class="container my-5">

        <?php if (!empty($data)): ?>
            <?php foreach($data as $article): ?>
                <!-- Blog Post -->
                <div class="row mb-4">
                    <div class="col-md-4">
                        <img
                            src="<?= htmlspecialchars($article->image) ?>"
                            class="img-fluid"
                            alt="<?= htmlspecialchars($article->title) ?>"
                        >
                    </div>
                    <div class="col-md-8">
                        <h2>
                        <?= htmlspecialchars($article->title) ?>
                        </h2>
                        <p>
                        <?= $articles->get_excerpt(htmlspecialchars($article->content)) ?>
                        </p>
                        <a href="/pages/article.php?id=<?= htmlspecialchars($article->id) ?>" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            <?php endforeach ?>
        <?php endif ?>

    </main>

    <!-- Footer -->
<?php 
    include base_path("partials/footer.php");
?>