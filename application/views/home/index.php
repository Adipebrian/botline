<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <!-- local css -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>frontend/styles/main.css">

    <title>Neovasi</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container">
            <a class="navbar-brand" href="index.html">
                <img src="<?= base_url('assets/') ?>frontend/images/logo-nt.png" alt="img-logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link px-0" href="<?= base_url('home') ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-0" href="<?= base_url('blog')?>">Artikel</a>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-0" data-bs-toggle="modal" data-bs-target="#exampleModal">Newsletter</a>
                    </li>
                </ul>
                <form class="d-flex" action="<?= base_url('search')?>" method="post">
                    <input class="form-control" type="search" name="result" placeholder="Search" aria-label="Search">
                    <button class="btn ic-search" type="submit">
                        <img src="<?= base_url('assets/') ?>frontend/images/ic-search.png" alt="search-icon">
                    </button>
                </form>
            </div>
        </div>
    </nav>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <!-- <h4 class="modal-title" id="exampleModalLabel">Join Newsletter Now!</h4> -->
                <img src="<?= base_url('assets/') ?>frontend/images/logo nt footer.png" alt="logo Neovasi" class="d-block">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('home/add_subs')?>" class="mb-4" method="post">
                        <label for="inputEmail" class="form-label p-sub mt-3">Dapatkan informasi terbaru dari kami!</label>
                        <div class="d-flex">
                            <input type="email" class="form-control" id="inputEmail" name="email" aria-describedby="emailHelp" placeholder="Masukkan email anda">
                            <button type="submit" class="btn btn-newsletter text-spacing ms-2">Daftar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <header>
        <div class="container container-header">
            <div class="row align-items-center">
                <?= $this->session->flashdata('message'); ?>
                <div class="col-sm-12 col-lg-6 d-none d-sm-block d-sm-none d-md-block">
                    <!-- desktop layout-->
                    <h1>Neosa Inovasion</h1>
                    <div class="p-sub">
                        Lorem ipsum dolor <strong>sit amet</strong> consectetur adipiscingb <br>elit amet sit <strong>eros</strong> pulvinar
                    </div>

                    <a href="<?= base_url('blog')?>" class="btn btn-red-primary px-5">Get Started</a>
                </div>
                <div class="col-sm-12 col-lg-6 text-center d-sm-block d-md-none ">
                    <!-- mobile layout-->
                    <h1>Neosa Inovasion</h1>
                    <div class="p-sub">
                        Lorem ipsum dolor <strong>sit amet</strong> consectetur adipiscingb <br>elit amet sit <strong>eros</strong> pulvinar
                    </div>
                    <div class="btn btn-red-primary px-5">Get Started</div>
                </div>
                <div class="col-sm-12 col-lg-6 d-flex  justify-content-end d-none d-sm-block d-sm-none d-md-block d-md-none d-lg-block">
                    <img src="<?= base_url('assets/') ?>frontend/images/image-header.png" alt="image-header">
                </div>
            </div>
        </div>
    </header>


    <main>
        <section class="section-articel-popular" id="articel-popular">
            <!-- articel popular -->
            <div class="container">
                <h3>Artikel Populer</h3>
                <div class="p-sub">Lorem ipsum dolor sit amet consectetur</div>
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                    <?php foreach ($pop as $p) : ?>
                        <div class="col d-flex justify-content-center">
                            <div class="card card-articel">
                                <img src="<?= base_url('assets/images/blog/') . $p['image'] ?>" class="card-img-top" alt="<?= $p['image'] ?>" width="320" height="140">
                                <div class="card-body p-0 mt-4">
                                    <a href="<?= base_url('blog/detail/') . $p['slug'] ?>" class="text-decoration-none">
                                        <h6 class="card-title m-0"> <strong><?= $p['title'] ?></strong></h6>
                                    </a>
                                </div>
                                <div class="card-footer bg-transparent border-0 p-0">
                                    <small class="text-muted"><?= date('d F Y', $p['date_created']) ?></small>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <a href="<?= base_url('blog')?>" class="d-flex justify-content-center see-articel">Lihat semua artikel &#8599;</a>
            </div>
        </section>

        <section class="section-articel-latest">
            <!-- articel latest -->
            <div class="container">
                <h3>Artikel Terbaru</h3>
                <div class="p-sub">Lorem ipsum dolor sit amet consectetur</div>
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                    <?php foreach($new as $n) : ?>
                    <div class="col d-flex justify-content-center">
                        <div class="card card-articel">
                            <img src="<?= base_url('assets/images/blog/') . $n['image']?>" class="card-img-top" alt="<?= $n['image']?>"  width="320" height="140">
                            <div class="card-body p-0 mt-4">
                                <a href="<?= base_url('blog/detail/'). $n['slug']?>" class="text-decoration-none">
                                    <h6 class="card-title m-0"><strong><?= $n['title']?></strong></h6>
                                </a>
                            </div>
                            <div class="card-footer bg-transparent border-0 p-0">
                                <small class="text-muted"><?= date('d F Y', $n['date_created']) ?></small>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
                <a href="<?= base_url('blog')?>" class="d-flex justify-content-center see-articel">Lihat semua artikel &#8599;</a>
            </div>
        </section>
    </main>


    <footer>
        <div class="container-fluid">
            <div class="row d-flex justif">
                <div class="col-sm-12 col-lg-4 px-4 mb-5">
                    <form action="#">
                        <img src="<?= base_url('assets/') ?>frontend/images/logo nt footer.png" alt="logo Neovasi" class="d-block">
                        <label for="inputEmail" class="form-label p-sub mt-3">Dapatkan informasi terbaru dari kami!</label>
                        <div class="d-flex">
                            <input type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" placeholder="Masukkan email anda">
                            <button type="submit" class="btn btn-newsletter text-spacing ms-2">Daftar</button>
                        </div>
                    </form>
                </div>
                <div class="col-6 col-lg-2 mt-1 ps-4">
                    <h5>Tag</h5>
                    <ul class="list-unstyled">

                    <?php foreach($tag_pop as $c):?>
                            <li><a href="#" class="text-decoration-none text-secondary"><?= $c['name']?></a></li>
                       <?php endforeach;?>
                    </ul>
                </div>
                <div class="col-6 col-lg-2 mt-1 ps-4">
                    <h5>Kategori</h5>
                    <ul class="list-unstyled">
                    <?php foreach($cat_pop as $c):?>
                            <li><a href="#" class="text-decoration-none text-secondary"><?= $c['cat_name']?></a></li>
                       <?php endforeach;?>
                    </ul>
                </div>
                <div class="col-6 col-lg-2 mt-1 ps-4">
                    <h5>Sosial media</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-decoration-none text-secondary">Instagram</a></li>
                        <li><a href="#" class="text-decoration-none text-secondary">Facebbok</a></li>
                        <li><a href="#" class="text-decoration-none text-secondary">Twitter</a></li>
                        <li><a href="#" class="text-decoration-none text-secondary">Github</a></li>
                    </ul>
                </div>
                <div class="col-6 col-lg-2 mt-1 ps-4">
                    <h5>About Us</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-decoration-none text-secondary">Author</a></li>
                        <li><a href="#" class="text-decoration-none text-secondary">neovasi.team@gmail.com</a></li>
                        <li><a href="#" class="text-decoration-none text-secondary">0888 8243 1233</a></li>
                    </ul>
                </div>
            </div>
            <div class="text-center pt-5 pb-3 ">
                <span>© 2021 Neosa Inovasion • Indonesia</span>
            </div>
        </div>
    </footer>

    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <!-- local js -->
    <script src="<?= base_url('assets/') ?>frontend/script/main.js"></script>
</body>

</html>