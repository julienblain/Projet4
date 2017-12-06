<div id="nav-container">
   <p>Chapitres précédents </p>
    <nav id="nav-public">
        <ul>
            <?php $i = 0;
            foreach($postsTitle as $postTitle):
            $i ++; ?>
                <li class="post-title nav-post-title">
                    <a href="?p=posts.<?= $postTitle->id ?>.selected">
                        <p><?=  $i . '.' ?></p>
                        <?=$postTitle->title ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>
</div>
