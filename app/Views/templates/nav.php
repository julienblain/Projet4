<div id="nav-container">
   <p>Chapitres précédents : </p>
    <nav>
        <ul> 
            <?php foreach($postsTitle as $postTitle): ?>
                <li class="post-title nav-post-title">
                    <a href="?p=posts.<?= $postTitle->id ?>.selected">
                        <?= $postTitle->title ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>
</div>


