


   <header>
      <div class="container-fluid container-all-page align-items-center text-center">
         <h2 class="text-white">Semua Artikel</h2>
      </div>
   </header>

   <!-- main -->
   <main>
      <div class="container">
         <section class="section-all-articel"> 
           <!-- articel latest -->
            <div class="container">
                <h5>Hasil Pencarian:<?= $result?></h5>
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                    <!-- card 1 -->
                    <?php foreach($blog as $b) :?>
                        <div class="col d-flex justify-content-center">
                            <div class="card card-articel">
                                <img src="<?= base_url('assets/images/blog/').$b['image']?>" class="card-img-top" alt="..." height="137" width="320">
                           <div class="card-body p-0 mt-4">
                              <a href="<?= base_url('blog/detail/').$b['slug']?>" class="text-decoration-none">
                              <h6 class="card-title m-0"><?= $b['title']?></h6>
                              </a>
                           </div>
                           <div class="card-footer bg-transparent border-0 p-0">
                              <small class="text-muted"><?= date('d F Y', $b['date_created'])?></small>
                           </div>
                        </div>
                  </div>
                  <?php endforeach;?>
                  <div class="row">
                      <div class="col">
                          <?= $page?>
                        </div>
                  </div>
                  
            </div>
      </section>
      </div>
   </main>


  