<!-- Page Header-->
<header class="masthead" style="background-image: url('/OCR_Blog_P5/public/assets/img/contact-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>Nos articles</h1>
                    <span class="subheading">Extraits</span>
                </div>
            </div>
        </div>
    </div>
</header>
<main class="container mb-4">
    <?php if($this->userIsConnected()== true):?>
    <div class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <h4 id="comment" style="text-align: center;">Yes! Pour faire un article c'est ici</h4>
                        <p>Si vous voulez faire un article, remplissez les champs requis et cliquer sur envoyer! </p>
                            <div class="my-5">
                            <!-- * * * * * * * * * * * * * * *-->
                            <!-- * * SB Forms Comment Form * *-->
                            <!-- * * * * * * * * * * * * * * *-->
                                <form id="postForm" method="post" action="/OCR_Blog_P5/public/index.php?page=post&action=registerPost" onsubmit="alert('Votre article a bien été publié.'); return true;">
                                    <div class="form-floating">
                                        <input class="form-control" id="title" name="title" type="title" placeholder="Entrer un titre..." required="required"  value="" maxlength="80" />
                                        <label for="name">Titre</label>
                                    </div>
                                    <div class="form-floating">
                                        <input class="form-control" id="caption" name="caption" type="text" placeholder="Phrase d'accroche..." required="required"  value="" spellcheck maxlength="180" />
                                        <label for="name">Phrase d'accroche</label>
                                    </div>
                                    <div class="form-floating">
                                        <textarea class="form-control" id="contentPost" name="contentPost" type="textarea" placeholder="Entrer votre contenu ici..." style="height: 12rem" required="required" spellcheck ></textarea>
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
    <hr ALIGN="center" >
    <br></br>
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <?php foreach($posts as $post): ?>
                <h2 style="text-align: center;"><a href="<?= $post->url?>"><?= $post->title; ?></a></h2>
                        <p><p>date de dernière mise à jour : <?= $post->date; ?></p>
                    <h4 style="text-align: center;"><?= $post->caption; ?></h4>
                        <p><?= $post->excerpt; ?> ...</p>
                        <p><a href="<?= $post->url?>">Voir la suite</a></p>
                        <?php if($this->userIsConnected()== true):?>
                            <div style="padding: 15px; background-color: grey;border-radius: 30px;">
                                <form style="text-align: center; color: white" id="statusCommentForm" method="post" action="/OCR_Blog_P5/public/index.php?page=post&action=adminPost" onsubmit="alert('Votre choix a bien été pris en compte.'); return true;">
                                    <fieldset>
                                        <legend>Que voulez-vous faire de cet article :</legend>
                                            <div class="form-floating">
                                                <input type="hidden" class="form-control" name="idPost" type="text" required="required" value="<?= $post->idPost; ?>" />
                                            </div>
                                            <div style="text-align: center">
                                                <label for="statusSelect">Le modifier ou le supprimer ?</label>
                                                <br></br>   
                                                    <button class="btn btn-primary text-uppercase" name="statusSelect"  type="submit" value="update">modifier</button>
                                                    <button class="btn btn-primary text-uppercase" name="statusSelect" type="submit" value="delete">Supprimer</button>
                                                <br></br>
                                            </div>
                                    </fieldset>
                                </form>
                                </div>
                        <?php endif; ?>
                        <br></br>
                        <hr ALIGN="center" >
                        <br></br>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</main>