
<ul>Liste de chapitre :
    <?php foreach($postsTitle as $postTitle): ?>
        <li class="post-title">
            <a href="?p=posts.<?= $postTitle->id ?>.selected">
                <?= $postTitle->title ?>
            </a>
            <a href="?p=posts.<?= $postTitle->id ?>.selected"><button>Lire</button></a>
            <a href=""><button>Modifer</button></a>
            <a href=""><button>Supprimer</button></a>
        </li>
    <?php endforeach; ?>
</ul>
