<!-- Page Header-->
<header class="masthead" style="background-image: url('http://localhost/OCR_Blog_P5/public/assets/img/register-image-2_large.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h2> C'est ici que ça se passe, tentez de vous connectez à nouveau</h2><br>
                    <h4><?= $errorMessage ?></h4><br></br>
                    <span class="subheading"><a href="#login" style= "color:white">Par ici le Login</a></span>
                </div>
            </div>
        </div>
    </div>
</header>
<main>
    <div class="myform bg-dark">
        <form name="auth" method="post" action="http://localhost/OCR_Blog_P5/public/index.php?page=login&action=login">
            <div id='login' class="mb-3 mt-4">
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
    </div>
</main>