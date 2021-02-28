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
        <div class="col-lg-9 col-md-12">
            <form class="add-new-post" action="<?= base_url('blog/edit_post') ?>" method="post" enctype="multipart/form-data">
                <!-- Add New Post Form -->
                <div class="card card-small mb-3">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="hidden" name="id"value="<?= $blog['id']?>">
                            <input type="text" name="title" class="form-control title" placeholder="Title" value="<?= $blog['title']?>" required>
                        </div>
                        <div class="form-group">
                            <input readonly type="text" name="slug" class="form-control slug" placeholder="Permalink" value="<?= $blog['slug'] ?>" style="background-color: #F8F8F8;outline-color: none;border:0;color:blue;" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Contents</label>
                            <textarea name="contents" id="summernote"><?=$blog['content']?></textarea>
                        </div>
                    </div>
                </div>
                <!-- / Add New Post Form -->
        </div>
        <div class="col-lg-3 col-md-12">
            <!-- Post Overview -->
            <div class='card card-small mb-3'>
                <div class="card-header border-bottom">
                    <h6 class="m-0">Image</h6>
                </div>
                <div class='card-body p-0'>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item p-3">
                            <div class="col-sm-9">
                                <div div class="custom-file">
                                    <input type="file" class="custom-file-input" id="filefoto" name="filefoto">
                                    <label class="custom-file-label" for="filefoto">Choose file</label>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- / Post Overview -->
            <!-- Post Overview -->
            <div class='card card-small mb-3'>
                <div class="card-header border-bottom">
                    <h6 class="m-0">Category</h6>
                </div>
                <div class='card-body p-0'>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item px-3 pb-2">
                            <div class="custom-control custom-checkbox mb-1">
                                <select name="category" id="">
                                    <option value="">--Select Category--</option>
                                    <?php foreach ($cat as $t) : ?>
                                        <?php if($t['cat_name']==$blog['category']):?>
                                        <option value="<?= $t['cat_name'] ?>" selected><?= $t['cat_name'] ?>
                                       <?php else:?>
                                        <option value="<?= $t['cat_name'] ?>"><?= $t['cat_name'] ?>
                                       <?php endif;?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- / Post Overview -->
            <!-- Post Overview -->
            <div class='card card-small mb-3'>
                <div class="card-header border-bottom">
                    <h6 class="m-0">Tags</h6>
                </div>
                <div class='card-body p-0'>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item px-3 pb-2">
                            <div style="overflow-y:scroll;height:150px;margin-bottom:30px;">
                                <?php
                                $post_tag = $blog['tag'];
                                $strtag = explode(",", $post_tag);
                                for ($j = 0; $j < count($strtag); $j++) {
                                }
                                ?>
                                <?php foreach ($tag as $t) : ?>
                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" name="tag[]" value="<?= $t['name']; ?>" <?php if(in_array($t['name'], $strtag)) echo 'checked="checked"';?>> <?= $t['name']; ?>
                                        </label>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- / Post Overview -->

            <!-- Post Overview -->
            <div class='card card-small mb-3'>
                <div class="card-header border-bottom">
                    <h6 class="m-0">Actions</h6>
                </div>
                <div class='card-body p-0'>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item p-3">
                            <span class="d-flex mb-2">
                                <i class="material-icons mr-1">flag</i>
                                <?php
                                if ($blog['status'] == 1) {
                                    $sts = 'Publish';
                                } else {
                                    $sts = 'Draft';
                                }
                                ?>
                                <strong class="mr-1">Status:</strong> <?= $sts ?>
                            </span>
                        </li>
                        <li class="list-group-item d-flex px-3">
                            <button class="btn btn-sm btn-outline-accent" type="submit">
                                <i class="material-icons">file_copy</i> Edit</button>
                        </li>
                    </ul>
                </div>
            </div>
            </form>
            <!-- / Post Overview -->


        </div>
    </div>
</div>