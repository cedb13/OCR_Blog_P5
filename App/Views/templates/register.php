<!-- Page Header-->
<header class="masthead" style="background-image: url('/OCR_Blog_P5/public/assets/img/register-image-2_large.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>Vous souhaitez nous rejoindre?</h1>
                    <h2> C'est ici que ça se passe</h2>
                    <span class="subheading" style="color: red"><strong><?= $message['message1'] ?></strong></span>
                </div>
            </div>
        </div>
    </div>
</header>
<main class="container mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <h4 id="enregistrement" class="signup-heading">Enregistrement</h4>
                    <p>Veuillez vous munir de la clé qui vous a été envoyé et remplir tous les champs merci</p>
                        <div class="my-5">
                            <form id="sign-up" method="post" action="/OCR_Blog_P5/public/index.php?page=register&action=register" onsubmit="alert('les informations ont été envoyé.');">
                                <div class="form-floating">
                                    <legend style="font-size: 12px"><i>*entrez la clé ici</i></legend>
                                    <input class="form-control" id="key" name="key" type="text" placeholder="Entrer la clé..." required="required"  value=""/>
                                    <label for="lastName">Votre clé d'enregistrement</label>
                                </div>
                                <div class="form-floating">
                                    <legend style="font-size: 12px"><i>*utiliser que des lettres et des chiffres</i></legend>
                                    <input class="form-control" id="lastName" name="lastName" type="text" placeholder="Entrer votre nom..." required="required" pattern="^[a-zA-ZÀ-ÿ-z0-9_]{1,15}$" value="" list="names_pattern3_datalist"/>
                                    <label for="lastName">Nom</label>
                                </div>
                                <div class="form-floating">
                                    <legend style="font-size: 12px"><i>*utiliser que des lettres et des chiffres</i></legend>
                                    <input class="form-control" id="firstName" name="firstName" type="text" placeholder="Entrer votre prénom..." required="required" pattern="^[a-zA-ZÀ-ÿ-z0-9_]{1,15}$" value="" list="names_pattern3_datalist"/>
                                    <label for="firstName">Prénom</label>
                                </div>
                                <div class="form-floating">
                                    <legend style="font-size: 12px"><i>*écrire au format : username@ndd.domain</i></legend>
                                    <input class="form-control" id="email" name="email" type="email" placeholder="Entrer votre email..." value="" required/>
                                    <label for="email">Email</label>
                                </div>
                                <div class="form-floating">
                                    <legend style="font-size: 12px"><i>*Au minimum : 8 caractères, un caractère spécial, une majuscule, un chiffre</i></legend>
                                    <input class="form-control" id="signup-password" name="password" type="password" placeholder="Entrer un mot de pass..." required="required" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" value="" list="passwords_pattern1_datalist"/>
                                    <label for="password">Password</label>
                                </div>
                                <br />
                                <!-- Submit Button-->
                                <button class="btn btn-primary text-uppercase " id="submitButton" name="submit" type="submit" value="enregistrer">Enregistrer</button>
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </main>