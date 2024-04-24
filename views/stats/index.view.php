<?php view('partials/head.php'); ?>
<?php view('partials/nav.php'); ?>

<?php

    showMessage(['error']);
?>

<div class="container mx-auto px-4 py-8 mt-8">
    <h1 class="text-3xl font-bold text-center mb-8">Show Stats per Exercise</h1>

    <ul class="list-decimal list-inside">
        <?php foreach($exercises as $exercise) : ?>
            <li class="mb-2">
                <a href="stats/exercise?name=<?= $exercise["exercise_name"]; ?>" class="text-gray-700 hover:text-blue-700 transition duration-300 ease-in-out">
                    <?= $exercise["exercise_name"]; ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>



<?php view('partials/footer.php'); ?>