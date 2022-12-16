

<!-- Page Header-->
<header class="masthead" style="background-image: url('assets/img/contact-bg.jpg')">
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
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <?php foreach($posts as $post): ?>
                <h2><a href="<?= $post->url?>"><?= $post->title; ?></a></h2>
                        <p><?= $post->date; ?></p>
                    <h4><?= $post->caption; ?></h4>
                        <p><?= $post->excerpt; ?></p>
                            <hr ALIGN="center" >
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</main>