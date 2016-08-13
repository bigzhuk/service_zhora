<h1>Отзывы</h1>

<div class="container">
    <?php
        require_once('./classes/autoload.php');
        $new_controller = new News\Controller\News(new \News\Model\News(), new \News\Decorator\OtzivyFront());
        $new_controller->actionShowAllPublished();
    ?>
</div>