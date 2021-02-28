<footer>
        <div class="container-fluid">
            <div class="row d-flex justif">
                <div class="col-sm-12 col-lg-4 px-4 mb-5">
                    <form action="#">
                        <img src="<?= base_url('assets/')?>frontend/images/logo nt footer.png" alt="logo Neovasi" class="d-block">
                        <label for="inputEmail" class="form-label p-sub-secondary mt-3">Dapatkan informasi terbaru dari kami!</label>
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
                            <li><a href="<?= base_url('search/tag/').$c['slug']?>" class="text-decoration-none text-secondary"><?= $c['name']?></a></li>
                       <?php endforeach;?>
                        </ul>
                    </div>
                    <div class="col-6 col-lg-2 mt-1 ps-4">
                        <h5>Kategori</h5>
                        <ul class="list-unstyled">
                            <?php foreach($cat_pop as $c):?>
                            <li><a href="<?= base_url('search/cat/').$c['cat_slug']?>" class="text-decoration-none text-secondary"><?= $c['cat_name']?></a></li>
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
    <script src="<?= base_url('assets/')?>frontend/script/main.js"></script>
</body>
</html>