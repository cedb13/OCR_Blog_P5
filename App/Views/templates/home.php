<!-- Page Header-->
<header class="masthead" style="background-image: url('http://localhost/OCR_Blog_P5/public/assets/img/home-bg.jpg')">
      <div class="container position-relative px-4 px-lg-5">
          <div class="row gx-4 gx-lg-5 justify-content-center">
              <div class="col-md-10 col-lg-8 col-xl-7">
                  <div class="site-heading">
                      <h1><?= $com['com1']?></h1>
                      
                      <span class="subheading"><?= $com['com2']?></span>
                      <!-- Avatar -->
                      <img class="subheading profile-avatar" src="http://localhost/OCR_Blog_P5/public/assets/img/Cedric_Bonche.jpg" alt="Avatar de Cédric Bonche">
                  </div>
              </div>
          </div>
      </div>
  </header>
  <main class="container mb-4">
  <?php if($this->userIsConnected()== true):?>
        <h4 class="fst-italic">Hello <?= $_SESSION['user']; ?></h4>
    <?php endif; ?>
    <div class="container p-4 p-md-5 mb-4 rounded text-bg-dark">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <h1 class="col-md-10 col-lg-8 col-xl-7 display-6 fst-italic">Bienvenue sur le Blog Dev de <?= $cv['prenom'].' '.$cv['nom']; ?></h1>
            <p class="col-md-10 col-lg-8 col-xl-7 lead my-3">Ce site à pour objet de vous présenter mon expérience mais aussi de partager des articles écrits par des contributeurs issus des métiers de l'informatique</p>
            <p class="col-md-10 col-lg-8 col-xl-7 lead mb-0"><a href="#" class="text-white fw-bold">Continue reading...</a></p>
        </div>
    </div>
  </main>
  <header class="masthead" style="background-image: url('http://localhost/OCR_Blog_P5/public/assets/img/about-bg.jpg')">
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
              <p>J'ai commencé dans l'animation socio-culturel :</p>
              <p>J’ai pu travailler avec divers publics (âges, profils sociologiques variés…), J’ai organisé, planifié, géré, budgétisé et évalué tout au long de mon activité professionnelle</p>
              <p>Et comme tout métier en relation avec un public, il faut communiquer ... Et dans le social, à l'époque, à part faire des collages et ou au mieux des montages pour imprimer des flyers, peu d'outils de communications étaient à notre portée... Mais internet commençait à ce démocratiser, les foyers commençaient à s'informatiser. Alors l'utilisation de blog en ligne c'est avéré une bonne solution pour diffuser de l'information auprès de nos publics. Ce qui était bien c'est que l'on pouvait traficotter le html de ces blogs, en tous cas ils proposaient d'entrer notre contenu soit en mode texte soit en mode html c'est là que j'ai fait mes premières armes côté front. Oui par le passé, à la fac, j'ai eu fait du code coté back pour mettre en place des fonctions mathématiques, me demandez pas qu'elle langage on utilisait je m'en rappel plus et c'était sur une courte durée.</p>
              <p>Vous l'aurez compris, l'informatique au niveau codage m'a toujours titillé et pourtant je n'osais passer le cap, n'étant pas d'une génération ou l'ordianteur était de mise à la maison, c'est au travers de mes études puis de mes lieux de travails que j'ai pu accéder a cet outil.</p>
              <p>Mes premiers ordinateurs : <br> Lorsque j'ai pu acquérir pour la première fois un ordianteur, les programmes étaient sur disquette... je vous fait pas de dessin, récupérer des logiciels étaient digne d'Indiana Jones, mon premier logiciel, donc sur disquette (Je rappel qu'à cette époque on parlait en ko) était un logiciel pour faire de la musique, vous vous rendez compte un logiciel qui dépaçait à peine les 2 Mo et ça marchait ... </p>
              <p>L'arrivé du CD Rom dans nos foyers :</p>
              <p>Ce qu'il faut bien comprendre c'est qu'entre le moment ou une évolution technologique apparaissait, ce mettait en place dans l'industrie et arrive chez nous, c'est en dizaines d'années qu'il fallait compter.<br>Ah! mes premiers logiciels craqués( PAS BIEN!), faut dire qu'à l'époque c'était pas aussi coriace qu'aujourd'hui, une clef pouvait être partagé par tous, les fabricants n'étaient pas connectés et ou reliés à tous comme aujourd'hui pour tracer leur produits, par contre il fallait ce trouver un cdrom compatible selon là ou vous deviez le graver, on parlait en Mo, le système de défense des fabriquants étaient entre autre le poid de leur logiciel... De nos jours, dans tous les cas, selon vos besoins, l'open source est de règle ou bien des abonnements pas excessif sont possibles, alors évitons de nous mettre hors la loi.</p>
              <p>C'est pourquoi j'ai toujours réver de créer mes propres programmes, applications pour répondre aux besoins des uns et des autres.</p>
              <br><br />
              <div id="cv">
                <p>Si vous voulez en savoir plus, mon cv est à votre disposition : </p>
                <embed src="http://localhost/OCR_Blog_P5/public/assets/media/CV-Cedric_Bonche_2021.pdf" width="800" height="500" type="application/pdf"/>
              </div>
              <p>J'espère que cette petite balade dans ma vie vous aura plus. maintenant si nous allions consulter quelques <a href="http://localhost/OCR_Blog_P5/public/index.php?page=post&action=list">articles</a></p>
              <br />
              <p>Si vous voulez me contacter pour plus d'informations ou encore mieux : participer à ce blog, alors ça ce passe en dessous.<br/>
                Oui! juste après la grosse image qui est là juste pour faire <a href="#contact">joli </a>... </p>
          </div>
      </div>
  </div>

  <!-- Page Header-->
  <header class="masthead" style="background-image: url('http://localhost/OCR_Blog_P5/public/assets/img/contact-bg.jpg')">
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
                        <p>Vous voulez me contacter ? Remplissez le formulaire ci-dessous et je vous répondrai dans les plus brefs délais !</p>
                        <div class="my-5">
                            <form id="contactForm" data-sb-form-api-token="2dbdbb04-da03-4b9f-be70-b87f8e769d87" method="post" action="http://localhost/OCR_Blog_P5/public/index.php?page=home&action=contactForm">
                                <div class="form-floating">
                                    <input class="form-control" id="lastName" name="lastName" type="text" placeholder="Entrer votre nom..." required="required" pattern="^[A-Za-z0-9_]{1,15}$" value="" list="names_pattern3_datalist"/>
                                    <label for="lastName">Nom</label>
                                </div>
                                <div class="form-floating">
                                    <input class="form-control" id="firstName" name="firstName" type="text" placeholder="Entrer votre prénom..." required="required" pattern="^[A-Za-z0-9_]{1,15}$" value="" list="names_pattern3_datalist"/>
                                    <label for="firstName">Prénom</label>
                                </div>
                                <div class="form-floating">
                                    <input class="form-control" id="email" name="email" type="email" placeholder="Entrer votre email..." value="" required/>
                                    <label for="email">Email</label>
                                </div>
                                <div class="form-floating">
                                    <input class="form-control" id="phone" name="phone" type="tel" placeholder="Entrer votre téléphone..." />
                                    <label for="phone">Numéro de téléphone</label>
                                </div>
                                <div class="form-floating">
                                    <input class="form-control" id="subject" name="subject" type="subject" placeholder="Sujet..." required="required" pattern="^[A-Za-z0-9_]{1,15}$" value="" list="names_pattern3_datalist"/>
                                    <label for="subject">Sujet</label>
                                </div>
                                <div class="form-floating">
                                    <textarea class="form-control" id="message" name="message" placeholder="Entrer votre message ici..." style="height: 12rem" required="required"></textarea>
                                    <label for="message">Message</label>
                                </div>
                                <br />
                                <!-- Submit Button-->
                                <button class="btn btn-primary text-uppercase " id="submitButton" name="send" type="submit" value= "Envoyer">Envoyer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>