<div class="">
    <?php  var_dump($variables);

    foreach ($variables as $post):
    ?>
    <p><?= $post->title ?></p>
    <p><?= $post->content ?></p>
<?php endforeach; ?>
</div>
