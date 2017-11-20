
<p>Bonjour <?= $_SESSION['auth']?> !</p>
<button type="button" name="btn-logout">
    <a href="/Projet4/public/index.php?logout=true">Déconnexion
        <?php session_destroy();?>
        </a>
</button>
<buuton><a href="/Projet4/public/Forteroche/index.php?p=logged.connection">Accueil Admin</a></buuton>

<button>Créer</button>


<?php ?>
