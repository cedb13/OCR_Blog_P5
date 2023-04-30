<?php
foreach($post as $value)
?>
<header class="masthead" style="background-image: url('/OCR_Blog_P5/public/assets/img/post-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="post-heading">
                    <h1><?= $value->title; ?></h1>
                    <h2 class="subheading"><?= $value->caption; ?></h2>
                    <span class="meta">
                        Posté par
                        <a href="#"><?= $value->firstName; ?> <?= $value->lastName; ?></a>
                        et mis à jour le <?= date('d-m-Y', strtotime($value->dateLastUpload)); ?>
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
                    <div class="col-md-10 col-lg-8 col-xl-7" style="text-align: center;">
                        <p style="white-space: pre-wrap; text-align : justify;"><?= $value->contentPost; ?></p>
                    </div>
                </div>
            </div>
</article>
<?php if($this->userIsConnected()== true):?>
    <div class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <h4 id="update" style="text-align: center;">Yes! Pour modifier un article c'est ici</h4>
                        <p>Si vous voulez modifier un article, remplissez les champs et cliquer sur envoyer! </p>
                            <div class="my-5">
                            <!-- * * * * * * * * * * * * * * *-->
                            <!-- * * SB Forms Comment Form * *-->
                            <!-- * * * * * * * * * * * * * * *-->
                                <form id="postForm" method="post" action="/OCR_Blog_P5/public/index.php?page=post&action=adminUpdatePost" onsubmit="alert('Votre article a bien été modifié.'); return true;">
                                    <div class="form-floating">
                                            <input type="hidden" class="form-control" name="idPost" type="text" required="required" pattern="^{1,15}$" value="<?= $value->idPost; ?>" list="names_pattern3_datalist" />
                                    </div>
                                    <div class="form-floating">
                                        <input class="form-control" id="title" name="title" type="title"  value="<?=$value->title; ?>" maxlength="80" />
                                        <label for="name">Titre</label>
                                    </div>
                                    
                                    <div class="form-floating">
                                        <div class="form-control" id="authorSelect" type="name"  value="" maxlength="80">
                                            <select name="authorSelect">
                                                <option value="">--Choisir un auteur merci--</option>
                                                <?php foreach($users as $user): ?>
                                                <option value="<?= $user->idUser?>"><?= $user->firstName.' '.$user->lastName; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <label for="statusSelect">Changer d'auteur</label>
                                    </div>
                                    
                                    <div class="form-floating">
                                        <input class="form-control" id="caption" name="caption" type="text" value="<?=$value->caption; ?>" spellcheck maxlength="180" />
                                        <label for="name">Phrase d'accroche</label>
                                    </div>
                                    <div class="form-floating">
                                        <textarea class="form-control" id="contentPost" name="contentPost" type="textarea"  style="height: 12rem" spellcheck value=""><?= $value->contentPost; ?></textarea>
                                        <label for="message">Contenu</label>
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
    <?php endif; ?>
<div class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7" style="text-align: center;">
                <a href="#comment"><img class="img-fluid" src="/OCR_Blog_P5/public/assets/img/post-sample-image.jpg" alt="..." /></a>
                <span class="caption text-muted">To go places and do things that have never been done before – that’s what living is all about.</span>
                    <h1 id="comment">Les commentaires :</h1>
                        <br></br>       
                            <?php foreach($comments as $comment):?>
                            <h2>"<?= $comment->title; ?>"</h2>
                                <p><em>De <?= $comment->lastName; ?> <?= $comment->firstName; ?></em></p>
                                <p style="white-space: pre-wrap; text-align : justify;"><?= $comment->content; ?></p>
                                <p><em>Commentaire fait le :  <?= date('d-m-Y', strtotime($comment->date)); ?></em></p>
                                <?php if($this->userIsConnected()== true):?>
                                <div style="padding: 15px; background-color: grey;border-radius: 30px;">
                                    <form style="text-align: left; color: white" id="statusCommentForm" method="post" action="/OCR_Blog_P5/public/index.php?page=post&action=adminComment">
                                        Etat du commentaire : <?php if(($comment->validate)==0): ?> non validé
                                        <br></br>
                                        <fieldset style="text-align: center">
                                        <legend>Que voulez-vous faire de ce commentaire?</legend>
                                        <div class="form-floating">
                                            <input type="hidden" class="form-control" name="idPost" type="text" required="required" pattern="^{1,15}$" value="<?= $value->idPost; ?>" list="names_pattern3_datalist" />
                                        </div>
                                        <div class="form-floating">
                                            <input type="hidden" class="form-control" name="idComment" type="text"  required="required" pattern="^{1,15}$" value="<?= $comment->idComment; ?>" list="names_pattern3_datalist" />
                                        </div>
                                        <div>
                                            <label for="statusSelect">Valider ou supprimer le commentaire s'il vous plait:</label>
                                        <br></br>
                                            <div>
                                                <button type="submit" class="btn btn-primary text-uppercase" name="statusSelect" value="validate">Valider</button>
                                                <button type="submit" class="btn btn-primary text-uppercase" name="statusSelect" value="delete">Supprimer</button>
                                            </div>
                                        </div>
                                        <br>
                                        </fieldset>
                                        <?php else: ?>
                                         validé
                                            <br></br>
                                        <fieldset style="text-align: center">
                                        <legend>Que voulez-vous faire de ce commentaire?</legend>
                                        <div class="form-floating">
                                            <input type="hidden" class="form-control" name="idPost" type="text" required="required" value="<?= $value->idPost; ?>"/>
                                        </div>
                                        <div class="form-floating">
                                            <input type="hidden" class="form-control" name="idComment" type="text"  required="required" value="<?= $comment->idComment; ?>"/>
                                        </div>
                                        <div>
                                            <button type="submit" class="btn btn-primary text-uppercase" name="statusSelect" value="delete">Supprimer</button>
                                        </div>
                                        </fieldset>
                                        <?php endif; ?>
                                    </form>
                                </div>
                                <?php endif; ?>
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
                <h4 id="comment" style="text-align: center;">Yes! comment it's here</h4>
                    <p>Si vous voulez laisser un commentaire, remplissez les champs requis et cliquer sur envoyer! </p>
                        <div class="my-5">
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- * * SB Forms Comment Form * *-->
                        <!-- * * * * * * * * * * * * * * *-->
                            <form id="commentForm" method="post" action="/OCR_Blog_P5/public/index.php?page=post&action=registerComment" onsubmit="alert('Votre commentaire a bien été envoyer, nous allons le traiter.'); return true;">
                                <div class="form-floating">
                                    <input type="hidden" class="form-control" name="idPost" required="required" value="<?= $value->idPost; ?>"/>
                                </div>
                                <div class="form-floating">
                                    <legend style="font-size: 12px"><i>*utiliser que des lettres et/ou des chiffres</i></legend> 
                                    <input class="form-control" id="lastName" name="lastName" type="text" placeholder="Entrer votre nom..." required="required" pattern="^[A-Za-z0-9_]{1,15}$" value="" list="names_pattern3_datalist" />
                                    <label for="lastName">Nom</label>
                                </div>
                                <div class="form-floating">
                                    <legend style="font-size: 12px"><i>*utiliser que des lettres et/ou des chiffres</i></legend> 
                                    <input class="form-control" id="firstName" name="firstName" type="text" placeholder="Entrer votre prénom..." required="required" pattern="^[A-Za-z0-9_]{1,15}$" value="" list="names_pattern3_datalist" />
                                    <label for="firstName">Prénom</label>
                                </div>
                                <div class="form-floating">
                                    <legend style="font-size: 12px"><i>*écrire au format : username@ndd.domain</i></legend>
                                    <input class="form-control" id="email" name="email" type="email" placeholder="Entrer votre email..." value="" required />
                                    <label for="email">email</label>
                                </div>
                                <div class="form-floating">
                                    <input class="form-control" id="title" name="title" type="title" placeholder="Entrer un titre..." required="required"  value="" maxlength="80" />
                                    <label for="title">Titre</label>
                                </div>
                                <div class="form-floating">
                                    <textarea class="form-control" id="contentComment" name="contentComment" type="textarea" placeholder="Entrer votre message ici..." style="height: 12rem" required="required" spellcheck maxlength="600"></textarea>
                                    <label for="contentComment">Commentaire</label>
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

