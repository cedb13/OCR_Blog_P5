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
                <p>Want to get in touch? Fill out the form below to send me a message and I will get back to you as soon as possible!</p>
                <div class="my-5">
                    <!-- * * * * * * * * * * * * * * *-->
                    <!-- * * SB Forms Contact Form * *-->
                    <!-- * * * * * * * * * * * * * * *-->
                    <!-- This form is pre-integrated with SB Forms.-->
                    <!-- To make this form functional, sign up at-->
                    <!-- https://startbootstrap.com/solution/contact-forms-->
                    <!-- to get an API token!-->
                    <form id="contactForm" data-sb-form-api-token="API_TOKEN">
                        <div class="form-floating">
                            <input class="form-control" id="nave_user_idNaveUser" type="text" placeholder="Enter your name..." data-sb-validations="required" />
                            <label for="name">Name</label>
                            <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                        </div>
                        <div class="form-floating">
                            <input class="form-control" id="email" type="email" placeholder="Enter your email..." data-sb-validations="required,email" />
                            <label for="email">email address</label>
                            <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                            <div class="invalid-feedback" data-sb-feedback="email:email">email is not valid.</div>
                        </div>
                        <div class="form-floating">
                            <textarea class="form-control" id="content_omment" type="textarea" placeholder="Enter your message here..." style="height: 12rem" data-sb-validations="required"></textarea>
                            <label for="message">Commentaire</label>
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
                                To activate this form, sign up at
                                <br />
                                <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
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
                </div>
            </div>
        </div>
    </div>
</div>
