<!-- Page Header-->
<header class="masthead" style="background-image: url('http://localhost/OCR_Blog_P5/public/assets/img/register-image-2_large.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>Interface d'administration</h1>
                    <h2> C'est ici que ça se passe</h2>
                    <span class="subheading"><?= $adminMessages['message1'] ?></span>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Main Content-->
<main class="container mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <h4>Vos informations</h4>
                </br>
            </div>
            <div>
            <?php if($this->userIsConnected()== true):?>
                <?php foreach($userInfo as $value): ?>
                    Nom : <?= $value->last_name; ?><br>
                    Prénom : <?= $value->first_name; ?><br>
                    Email : <?= $value->email; ?><br>
                    <div name='idUser' style='display:none'>id : <?= $value->idUser; ?></div>
                <?php endforeach ?>
            <?php endif; ?>
            </div>
            <div>
                <br></br>
                <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#ModalForm2">
                <?= $adminMessages['message2']?>
                </button>
                    <div class="modal fade" id="ModalForm2" tabindex="-1" aria-labelledby="ModalFormLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body bg-dark">
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                        <div class="myform bg-dark">
                                            <form name="auth" method="post" action="http://localhost/OCR_Blog_P5/public/index.php?page=admin&action=changeInfosUser">
                                                <div class="mb-3 mt-4">    
                                                    <label for="InputlastName" class="form-label">Nom</label>
                                                    <input class="form-control" name="newLastName" type="text"  pattern="^[A-Za-z0-9_]{1,15}$" value="" list="names_pattern3_datalist"/>
                                                </div>
                                                <div class="mb-3">    
                                                    <label for="InputlastName" class="form-label">Prénom</label>
                                                    <input class="form-control" name="newfirstName" type="text"  pattern="^[A-Za-z0-9_]{1,15}$" value="" list="names_pattern3_datalist"/>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="Inputemail" class="form-label">email address</label>
                                                    <input type="email" class="form-control" name="newEmail"aria-describedby="emailHelp" value="">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="InputPassword" class="form-label">Password</label>
                                                    <input type="password" class="form-control"  name="newPassword" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" value="" list="passwords_pattern1_datalist">
                                                </div>
                                                <button type="submit" class="btn btn-light mt-3" name="newSuubmit" value="1">CHANGE</button>
                                            </form>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</main>