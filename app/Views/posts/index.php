<div class="">
    <?php  var_dump($variables);

    foreach ($posts as $post):
    ?>
    <p><?= $post->title ?></p>
    <p><?= $post->content ?></p>
<?php endforeach; ?>
</div>
<?php var_dump($comments[1]); ?>
