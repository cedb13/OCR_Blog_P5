<!-- Page Header-->
<header class="masthead" style="background-image: url('http://localhost/OCR_Blog_P5/public/assets/img/register-image-2_large.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>Vous souhaitez nous rejoindre?</h1>
                    <h2> C'est ici que ça se passe</h2>
                    <span class="subheading"><?= $test['message1'] ?></span>
                </div>
            </div>
        </div>
    </div>
</header>
<main class="container mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <h4 id="contact" class="signup-heading">Enregistrement</h4>
                    <p>Veuillez remplir tous les champs merci</p>
                        <div class="my-5">
                            <form id="sign-up" method="post" action="http://localhost/OCR_Blog_P5/public/index.php?page=register&action=register" onsubmit="alert('Submitted.'); return true;" >
                            <div class="error-msg" id="error-msg"></div>
                                <div class="form-floating">
                                    <input class="form-control" id="lastName" name="last_name" type="text" placeholder="Entrer votre nom..." required="required" pattern="^[A-Za-z0-9_]{1,15}$" value="" list="names_pattern3_datalist"/>
                                    <label for="lastName">Nom</label>
                                    <span name="last_name_empty"></span>
                                    <br>
                                    <span name="last_name"></span>
                                </div>
                                <div class="form-floating">
                                    <input class="form-control" id="firstName" name="first_name" type="text" placeholder="Entrer votre prénom..." required="required" pattern="^[A-Za-z0-9_]{1,15}$" value="" list="names_pattern3_datalist"/>
                                    <label for="firstName">Prénom</label>
                                    <span name="first_name_empty"></span>
                                    <span name="first_name"></span>
                                </div>
                                <div class="form-floating">
                                    <input class="form-control" id="email" name="email" type="email" placeholder="Entrer votre email..." value="" required/>
                                    <label for="email">Email address</label>
                                </div>
                                <div class="form-floating">
                                    <input class="form-control" id="signup-password" name="password" type="password" placeholder="Entrer un mot de pass..." required="required" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" value="" list="passwords_pattern1_datalist"/>
                                    <label for="password">Password</label>
                                    <span name="password_empty"></span>
                                    <span name="password"></span>
                                </div>
                                <br />
                                <!-- Submit Button-->
                                <button class="btn btn-primary text-uppercase " id="submitButton" name="submit" type="submit" value="enregistrer">Enregistrer</button>
                            </form>
                            <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
                        </div>
                </div>
            </div>
        </div>
    </main>