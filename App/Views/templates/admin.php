<!-- Page Header-->
<header class="masthead" style="background-image: url('/OCR_Blog_P5/public/assets/img/register-image-2_large.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                <?php if($this->userIsConnected()== true):?>
                    <h1>Interface d'administration</h1>
                    <h2> C'est ici que ça se passe</h2>
                    <span class="subheading"><?= $adminMessages['message1'] ?></span>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Main Content-->
 <main class="h100">
 <!-- section -->
     <section class="conteneur row">
         <article class="text-center col-lg-4" data-sal="slide-right" data-sal-duration="1000">
             <a class="nav-link" href="#btn-info">
             <img class="rounded-circle" style="width: 50%" src="/OCR_Blog_P5/public/assets/img/galerie-item-5-frisco.jpg"></a>
                 <h3>Vos informations</h3>
                     <a href="#btn-info" title="Modifier vos informations"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
                     <div class="mb-4" style="text-align : left; padding-left: 20%;">
                            <?php foreach($userInfo as $value): ?>
                        Nom : <?= $value->lastName; ?><br>
                        Prénom : <?= $value->firstName; ?><br>
                        Email : <?= $value->email; ?><br>
                        <div name='idUser' style='display:none'>id : <?= $value->idUser; ?></div>
                    </div>
                    <div id="btn-info">
                    <button type="button" class="btn btn-dark" style="width: 50%;" data-bs-toggle="modal" data-bs-target="#ModalForm2">
                    <?= $adminMessages['message2']?>
                    </button>
                        <div class="modal fade" id="ModalForm2" tabindex="-1" aria-labelledby="ModalFormLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-body bg-dark">
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                            <div class="myform bg-dark">
                                                <form name="updateUser" method="post" action="/OCR_Blog_P5/public/index.php?page=admin&action=updateInfosUser" onsubmit="alert('Vos données ont bien été modifiées.'); return true;">
                                                    <div class="mb-3 mt-4">    
                                                        <label for="InputlastName" class="form-label">Nom</label>
                                                        <legend style="font-size: 12px"><i>*utiliser que des lettres et/ou des chiffres</i></legend> 
                                                        <input class="form-control" name="newLastName" type="text"  pattern="^[a-zA-ZÀ-ÿ-z0-9_]{1,15}$" value="<?= $value->lastName; ?>" list="names_pattern3_datalist"/>
                                                    </div>
                                                    <div class="mb-3">    
                                                        <label for="InputlastName" class="form-label">Prénom</label>
                                                        <legend style="font-size: 12px"><i>*utiliser que des lettres et/ou des chiffres</i></legend> 
                                                        <input class="form-control" name="newfirstName" type="text"  pattern="^[a-zA-ZÀ-ÿ-z0-9_]{1,15}$" value="<?= $value->firstName; ?>" list="names_pattern3_datalist"/>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="Inputemail" class="form-label">email address</label>
                                                        <legend style="font-size: 12px"><i>*écrire au format : username@ndd.domain</i></legend>
                                                        <input type="email" class="form-control" name="newEmail"aria-describedby="emailHelp" value="<?= $value->email; ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="InputPassword" class="form-label">Entrer le Password actuel si vous voulez le concerver ou entrer un nouveau Password</label>
                                                        <legend style="font-size: 12px"><i>*Au minimum : 8 caractères, un caractère spécial, une majuscule, un chiffre</i></legend>
                                                        <input type="password" class="form-control"  name="newPassword" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required="required" value="" list="passwords_pattern1_datalist">
                                                    </div>
                                                    <button type="submit" id="submitButton" class="btn btn-light mt-3" name="submit" value="modifier">CHANGE</button>
                                                </form>
                                                 <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
         </article>
         <article class="text-center col-lg-4" data-sal="slide-down" data-sal-duration="1000">
             <a class="nav-link txt-color-2" href="/OCR_Blog_P5/public/index.php?page=post&action=list">
             <img class="rounded-circle" style="width: 50%"  href="#btn-post" src="/OCR_Blog_P5/public/assets/img/galerie-item-1-boston.jpg"></a>
                 <h3>Ajouter-Modifier-Supprimer un post</h3>
                    <a href="#btn-post" title="Ajouter-Modifier-Supprimer un post"><i class="fa fa-info-circle" aria-hidden="true"></i></a>                               
                    <br></br>
                    <br></br>
                    <div id="btn-post">
                    <a type="button" class="btn btn-dark" style="width: 50%;" href="/OCR_Blog_P5/public/index.php?page=post&action=list">
                    C'est ici
                    </a>
         </article>
         <article class="text-center col-lg-4" data-sal="slide-down" data-sal-duration="1000">
             <a class="nav-link" href="#btn-comment">
             <img class="rounded-circle" style="width: 50%"  href="#btn-comment" src="/OCR_Blog_P5/public/assets/img/galerie-item-4.jpg"></a>
                 <h3>Valider-Supprimer un commentaire</h3>
                    <a href="#btn-comment" title="Ajouter-Modifier-Supprimer un post"><i class="fa fa-info-circle" aria-hidden="true"></i></a>                               
                    <br></br>
                    <br></br>
                    <div id="btn-comment">
                    <a type="button" class="btn btn-dark" style="width: 50%;"class="nav-item dropdown nav-link px-lg-3 py-3 py-lg-4 dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Retrouver les commentaires par post</a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <?php 
                                foreach($posts as $post):
                                ?>
                                <li><a class="dropdown-item" href="<?= $post->url?>"><?= $post->title; ?></a></li>
                                <?php endforeach; ?>
                            </ul>
         </article>
     </section>
        <?php else : ?>
            <div><h4>PERDU</h4></div>
        <?php endif; ?>
 </main>