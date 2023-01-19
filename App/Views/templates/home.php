
 <!-- Page Header-->
 <header class="masthead" style="background-image: url('assets/img/home-bg.jpg')">
      <div class="container position-relative px-4 px-lg-5">
          <div class="row gx-4 gx-lg-5 justify-content-center">
              <div class="col-md-10 col-lg-8 col-xl-7">
                  <div class="site-heading">
                      <h1>Le blog Dev de Cédric</h1>
                      <span class="subheading">A Blog Theme by Start Bootstrap</span>
                      <!-- Avatar -->
                      <img class="subheading profile-avatar" src="../public/assets/img/Cedric_Bonche.jpg" alt="Avatar de Cédric Bonche">
                  </div>
              </div>
          </div>
      </div>
  </header>
  <main class="container mb-4">
            <?php if(!empty($log)): ?>
            <h4 class="fst-italic"><?= $message ?></h4>
            <?php endif ?>
    <div class="container p-4 p-md-5 mb-4 rounded text-bg-dark">
    <div class="row gx-4 gx-lg-5 justify-content-center">
      <h1 class="col-md-10 col-lg-8 col-xl-7 display-6 fst-italic">Bienvenue sur le Blog Dev de <?= $cv['prenom'].' '.$cv['nom']; ?></h1>
      <p class="col-md-10 col-lg-8 col-xl-7 lead my-3">Ce site à pour objet de vous présenter mon expérience mais aussi de partager des articles écrits par des contributeurs issus des métier de l'informatique</p>
      <p class="col-md-10 col-lg-8 col-xl-7 lead mb-0"><a href="#" class="text-white fw-bold">Continue reading...</a></p>
    </div>
  </div>
  <header class="masthead" style="background-image: url('assets/img/about-bg.jpg')">
      <div class="container position-relative px-4 px-lg-5">
          <div class="row gx-4 gx-lg-5 justify-content-center">
              <div class="col-md-10 col-lg-8 col-xl-7">
                  <div class="page-heading">
                      <h1>About Me</h1>
                      <span class="subheading">This is what I do.</span>
                  </div>
              </div>
          </div>
      </div>
  </header>
  <div class="container px-4 px-lg-5">
      <div class="row gx-4 gx-lg-5 justify-content-center">
          <div class="col-md-10 col-lg-8 col-xl-7">
              <h4>Mon expérience : </h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius praesentium recusandae illo eaque architecto error, repellendus iusto reprehenderit, doloribus, minus sunt. Numquam at quae voluptatum in officia voluptas voluptatibus, minus!</p>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut consequuntur magnam, excepturi aliquid ex itaque esse est vero natus quae optio aperiam soluta voluptatibus corporis atque iste neque sit tempora!</p>
              <br><br />
              <div id="cv">
                <p>Si vous voulez en savoir plus, mon cv est à votre disposition : </p>
                <embed src="assets/media/CV-Cedric_Bonche_2021.pdf" width="800" height="500" type="application/pdf"/>
              </div>
              <p>J'espère que cette petite balade dans ma vie vous aura plus. maintenant si nous allions consulter quelques <a href="http://localhost/blogCedP5/public/index.php?page=posts">articles</a></p>
              <br />
              <p>Si vous voulez me contacter pour plus d'informations ou encore mieux participer à ce blog alors ça ce passe en dessous.<br/>
                Oui! juste après la grosse image qui est là juste pour faire <a href="#contact">joli </a>... </p>
          </div>
      </div>
  </div>

  <!-- Page Header-->
  <header class="masthead" style="background-image: url('assets/img/contact-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="page-heading">
                            <h1>Contact Me</h1>
                            <span class="subheading">Have questions? I have answers.</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main Content-->
        <main class="mb-4">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                      <h4 id="contact">Yes contact it's here</h4>
                        <p>Want to get in touch? Fill out the form below to send me a message and I will get back to you as soon as possible!</p>
                        <div class="my-5">
                            <!-- * * * * * * * * * * * * * * *-->
                            <!-- * * SB Forms Contact Form * *-->
                            <!-- * * * * * * * * * * * * * * *-->
                            <!-- This form is pre-integrated with SB Forms.-->
                            <!-- To make this form functional, sign up at-->
                            <!-- https://startbootstrap.com/solution/contact-forms-->
                            <!-- to get an API token!-->
                            <form id="contactForm" data-sb-form-api-token="API_TOKEN" method="post" action="">
                                <div class="form-floating">
                                    <input class="form-control" id="name" type="text" placeholder="Enter your name..." data-sb-validations="required" />
                                    <label for="name">Name</label>
                                    <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                                </div>
                                <div class="form-floating">
                                    <input class="form-control" id="email" type="email" placeholder="Enter your email..." data-sb-validations="required,email" />
                                    <label for="email">Email address</label>
                                    <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                                    <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                                </div>
                                <div class="form-floating">
                                    <input class="form-control" id="phone" type="tel" placeholder="Enter your phone number..." data-sb-validations="" />
                                    <label for="phone">Phone Number</label>
                                    <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
                                </div>
                                <div class="form-floating">
                                    <textarea class="form-control" id="message" placeholder="Enter your message here..." style="height: 12rem" data-sb-validations="required"></textarea>
                                    <label for="message">Message</label>
                                    <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                                </div>
                                <br />
                                <!-- Submit success message-->
                                <!---->
                                <!-- This is what your users will see when the form-->
                                <!-- has successfully submitted-->
                                <div class="d-none" id="submitSuccessMessage">
                                    <div class="text-center mb-3">
                                        <div class="fw-bolder">Form submission successful!</div>
                                        Rejoindre l'accueil, c'est par ici --->
                                        <br />
                                        <a href="http://localhost/blogCedP5/public/index.php?page=home">merci de vous intéressez à notre blog</a>
                                    </div>
                                </div>
                                <!-- Submit error message-->
                                <!---->
                                <!-- This is what your users will see when there is-->
                                <!-- an error submitting the form-->
                                <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                                <!-- Submit Button-->
                                <button class="btn btn-primary text-uppercase disabled" id="submitButton" type="submit">Send</button>
                            </form>
                            <?php
                                if (isset($_POST['message'])) {
                                    $retour = mail('cedric.bonch@gmail.com', 'Envoi depuis le formulaire de Contact', $_POST['message'], 'From:cedric.bonche@gmail.com' . "\r\n" . 'Reply-to: ' . $_POST['email']);
                                    if($retour)
                                        echo '<p>Votre message a bien été envoyé.</p>';
                                }
                            ?>
                            <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
                        </div>
                    </div>
                </div>
            </div>
        </main>