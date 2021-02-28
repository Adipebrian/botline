<!-- Main Content -->
<div class="main-content-container container-fluid px-4">
  <!-- Page Header -->
  <div class="page-header row no-gutters py-4">
    <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
      <h3 class="page-title"><?= $title ?></h3>
    </div>
  </div>
  <!-- End Page Header -->

  <div class="row">
    <?php foreach($blog as $b):?>
    <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
      <div class="card card-small card-post h-100">
        <div class="card-post__image" style="background-image: url('<?= base_url('assets/images/blog/'). $b['image']?>');"></div>
        <div class="card-body">
          <h5 class="card-title">
            <a class="text-fiord-blue" href="<?= base_url('blog/detail/'). $b['slug']?>"><?= $b['title']?></a>
          </h5>
          <p class="card-text"><?= $b['content']?></p>
        </div>
        <?php $user = $this->db->get_where('user',['id' => $b['user_id']])->row_array();?>
        <div class="card-footer text-muted border-top py-3">
          <span class="d-inline-block">By
            <a class="text-fiord-blue" href="#"><?= $user['name']?></a> in
            <a class="text-fiord-blue" href="#"><?= $b['category']?></a>
          </span>
        </div>
      </div>
    </div>
    <?php endforeach;?>
  </div>
  <?= $page?>
</div>