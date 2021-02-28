
                <!-- main -->
	<main>
		<div class="container">
			<div class="row">
				<!-- ------ content ------ -->
				<div class="col-12 col-lg-8">
					<div class="card card-articel-content">
							<h2><?= $blog['title']?></h2>
							<!-- category articel -->
							<div class="category-articel">
                            <small class="px-2 pb-1 pt-2">
                                <img src="<?= base_url('assets/')?>frontend/images/ic-tag.png" class="img-ic-tag me-1" alt="ic-tag">
                                <a href="#" class="text-decoration-none text-spacing"><?= $blog['category']?></a>
                            </small>
							</div>
                            <?php $id = $blog['user_id'];
                        $author = $this->db->get_where('user',['id' => $id])->row_array();
                        ?>
							<!-- data author -->
							<div class="data-author d-flex align-items-center">
                            <img src="<?= base_url('assets/images/profile/') . $author['image']?>" class="img-author" alt="img-author">
								<div class="p-sub ms-3 me-1">
                                <?= $author['name']?>
								</div>
								<small>&#8226; <?= date('d F Y' ,$blog['date_created']);?></small>
							</div>
							<!-- img content -->
							<img src="<?= base_url('assets/images/blog/').$blog['image']?>" class="ratio-21x9" alt="img-content">
							<!-- ratio image 674*296 pixel -->
							<small class="text-center">
								<a href="#"  class="text-center text-decoration-none">Photo by <u>name</u> on <u>unsplash</u></a>
							</small>
							<!-- articel text content -->
							<p><?= $blog['content']?></p>
                        <p><small>Tag-> <a href="#"><?= $blog['tag']?></a></small></p>
					</div>
				</div>
