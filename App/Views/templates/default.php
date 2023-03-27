<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="Blog CV mais aussi qui parle du développement informatique" />
        <meta name="author" content="" />
        <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/blog/">
        <title>Mon CV en ligne</title>
        <!-- Favicons -->
        <link rel="icon" type="image/x-icon" href="http://localhost/OCR_Blog_P5/public/assets/favicon.ico" />
        <link rel="shortcut icon" type="image/x-icon" href="http://localhost/OCR_Blog_P5/public/assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="http://localhost/OCR_Blog_P5/public/css/styles.css" rel="stylesheet" />
        <script src="https://code.jquery.com/jquery-3.6.3.min.js" type="text/javascript"></script>
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="http://localhost/OCR_Blog_P5/public/index.php/home#cv">Curriculum Vitae</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="http://localhost/OCR_Blog_P5/public/index.php?page=home">Home</a></li>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="http://localhost/OCR_Blog_P5/public/index.php?page=post&action=list">consulter nos posts</a></li>
                        <li class="nav-item dropdown"><a class="nav-link px-lg-3 py-3 py-lg-4 dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Last Posts</a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <?php 
                                foreach($posts as $post):
                                ?>
                                <li><a class="dropdown-item" href="<?= $post->url?>"><?= $post->title; ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="http://localhost/OCR_Blog_P5/public/index.php?page=home#contact">Contact</a></li>
                        <?php if($this->userIsConnected()== true):?>
                            <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="http://localhost/OCR_Blog_P5/public/index.php?page=admin">Administration</a></li>
                    </ul>
                </div>
                <div>
                    <button type="button" class="btn btn-dark" type="submit" name="decoAuth" >
                        <a href="http://localhost/OCR_Blog_P5/public/index.php?page=login&action=logout" style="color:white;"> DECONEXION </a>
                    </button>
                        <?php else: ?>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="http://localhost/OCR_Blog_P5/public/index.php?page=register">Nous rejoindre</a></li>
                    </ul>
                </div>
                <div>
                    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#ModalForm">
                        LOGIN
                    </button>
                    <div class="modal fade" id="ModalForm" tabindex="-1" aria-labelledby="ModalFormLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body bg-dark">
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                    <div class="myform bg-dark">
                                        <form name="auth" method="post" action="http://localhost/OCR_Blog_P5/public/index.php?page=login&action=login">
                                            <div class="mb-3 mt-4">
                                                <label for="Inputemail" class="form-label">email address</label>
                                                <input type="email" class="form-control" name="email"aria-describedby="emailHelp" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="InputPassword" class="form-label">Password</label>
                                                <input type="password" class="form-control"  name="password" required>
                                            </div>
                                            <button type="submit" class="btn btn-light mt-3" name="submit" value="1">LOGIN</button>
                                            <p>Not a member?  
                                                <button type="submit" class="btn bg-dark" data-bs-dismiss="modal" aria-label="Close">
                                                    <a href="http://localhost/OCR_Blog_P5/public/index.php?page=register">Rejoignez nous</a>
                                                </button>
                                            </p>
                                        </form>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
       

<?= $content_layout; ?>



<!-- Footer-->
<footer class="border-top">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <ul class="list-inline text-center">
                            <li class="list-inline-item">
                                <a href="#!">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#!">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#!">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <div class="small text-center text-muted fst-italic">Copyright &copy; Website Ced Blog 2022</div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="http://localhost/OCR_Blog_P5/public/js/scripts.js"></script>
    </body>
</html>