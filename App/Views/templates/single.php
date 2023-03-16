<?php
foreach($post as $value)
?>
<header class="masthead" style="background-image: url('http://localhost/OCR_Blog_P5/public/assets/img/post-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="post-heading">
                    <h1><?= $value->title; ?></h1>
                    <h2 class="subheading"><?= $value->caption; ?></h2>
                    <span class="meta">
                        Posté par
                        <a href="#"><?= $value->first_name; ?> <?= $value->last_name; ?></a>
                        le <?= $value->date_last_upload; ?>
                    </span>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Post Content-->
<article class="mb-4">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <p><?= $value->content_post; ?></p>
                    </div>
                </div>
            </div>
</article>
<div class="mb-4">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
        <a href="#comment"><img class="img-fluid" src="http://localhost/OCR_Blog_P5/public/assets/img/post-sample-image.jpg" alt="..." /></a>
        <span class="caption text-muted">To go places and do things that have never been done before – that’s what living is all about.</span>
        <h1 id="comment">Les commentaires :</h1>       

                        <?php 
                        foreach($comments as $comment):
                        ?>

                        <h2>"<?= $comment->title; ?>"</h2>

                        <p><em>De <?= $comment->last_name; ?> <?= $comment->first_name; ?></em></p>

                        <p><?= $comment->content; ?></p>

                        <p><em>Commentaire fait le :  <?= $comment->date; ?></em></p>

                        <hr ALIGN="center" >
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
</div>
<div class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <h4 id="comment">Yes! comment it's here</h4>
                <p>Si vous voulez laisser un commentaire, remplissez les champs requis et cliquer sur envoyer! </p>
                <div class="my-5">
                    <!-- * * * * * * * * * * * * * * *-->
                    <!-- * * SB Forms Comment Form * *-->
                    <!-- * * * * * * * * * * * * * * *-->
                    <form id="commentForm" method="post" action="http://localhost/OCR_Blog_P5/public/index.php?page=post&action=registerComment" onsubmit="alert('Votre commentaire a bien été envoyer, nous allons le traiter.'); return true;">
                        <div class="form-floating">
                            <input type="hidden" class="form-control" id="idpost" name="idpost" type="text" placeholder="Entrer votre nom..." required="required" pattern="^{1,15}$" value="<?= $value->idpost; ?>" list="names_pattern3_datalist" />
                        </div>
                        <div class="form-floating">
                            <input class="form-control" id="last_name" name="last_name" type="text" placeholder="Entrer votre nom..." required="required" pattern="^[A-Za-z0-9_]{1,15}$" value="" list="names_pattern3_datalist" />
                            <label for="name">Nom</label>
                        </div>
                        <div class="form-floating">
                            <input class="form-control" id="first_name" name="first_name" type="text" placeholder="Entrer votre prénom..." required="required" pattern="^[A-Za-z0-9_]{1,15}$" value="" list="names_pattern3_datalist" />
                            <label for="name">Prénom</label>
                        </div>
                        <div class="form-floating">
                            <input class="form-control" id="email" name="email" type="email" placeholder="Entrer votre email..." value="" required />
                            <label for="email">email</label>
                        </div>
                        <div class="form-floating">
                            <input class="form-control" id="title" name="title" type="title" placeholder="Entrer un titre..." required="required"  value="" maxlength="80" />
                            <label for="name">Titre</label>
                        </div>
                        <div class="form-floating">
                            <textarea class="form-control" id="content_comment" name="content_comment" type="textarea" placeholder="Entrer votre message ici..." style="height: 12rem" required="required" spellcheck maxlength="600"></textarea>
                            <label for="message">Commentaire</label>
                        </div>
                        <br />
                        <!-- Submit Button-->
                        <button class="btn btn-primary text-uppercase" id="submitButton" type="submit" value="envoyer">envoyer</button>
                    </form>
                    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
                </div>
            </div>
        </div>
    </div>
</div>

