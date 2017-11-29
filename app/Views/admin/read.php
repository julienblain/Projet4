<?php include_once($this->viewPath."/admin/index.php"); ?>


<div id='postAndComments-index'>
    <div id="book">
    </div>
    <div id="book-box">

    </div>

    <div id="post-index-container">
           <div class="postTitle">
               
               
               
               <?= $post[0]->title?>
                Le
                <?php $date = DateTime::createFromFormat('Y-m-d H:i:s', $post[0]->datePost);
                        echo   $date->format('d.m.Y');
                    ?>
               
        </div>
        <div id="postContent"><p id="firstChild-bug-js"></p><!-- pour éviter les bug js sur le slide-->
               <?= $post[0]->content ?><p id="endChap">Fin du Chapitre.</p><!-- pour éviter les bug js sur le slide -->
        </div>

    </div>



    <div id="post-index-btn" class="btn">
        <!-- caractere special en html-->
        <button id="book-previous" class="btn-book">&lsaquo;</button>
        <button id="book-after" class="btn-book">&rsaquo;</button>



        

    </div>

</div>