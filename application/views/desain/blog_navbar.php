
   <!-- Navigasi -->
   <nav class="navbar navbar-expand-lg navbar-light bg-white">
      <div class="container">
         <a class="navbar-brand" href="index.html">
            <img src="<?= base_url('assets/')?>frontend/images/logo-nt.png" alt="img-logo">
         </a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                     <a class="nav-link px-0" href="<?= base_url('home')?>">Home</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link px-0" href="<?= base_url('blog')?>">Artikel</a>
                  </li>
                  <li>
                     <a href="#" class="nav-link px-0" data-bs-toggle="modal" data-bs-target="#exampleModal">Newsletter</a>
                  </li>
            </ul>
            <form class="d-flex">
                  <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn ic-search" type="submit">
                     <img src="<?= base_url('assets/')?>frontend/images/ic-search.png" alt="search-icon">
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