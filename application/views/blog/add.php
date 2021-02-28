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
            <form class="add-new-post" action="<?= base_url('blog/add_draft') ?>" method="post" enctype="multipart/form-data">
                <!-- Add New Post Form -->
                <div class="card card-small mb-3">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control title" placeholder="Title" required>
                        </div>
                        <div class="form-group">
                            <input readonly type="text" name="slug" class="form-control slug" placeholder="Permalink" style="background-color: #F8F8F8;outline-color: none;border:0;color:blue;" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Contents</label>
                            <textarea name="contents" id="summernote"></textarea>
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
                                    <input type="file" class="custom-file-input" id="filefoto" name="filefoto" required>
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
                                        <option value="<?= $t['cat_name'] ?>"><?= $t['cat_name'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </li>
                        <a href="<?= base_url('blog/add_cat') ?>" class="btn btn-primary">Add Category</a>
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
                                <?php foreach ($tag as $t) : ?>
                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" name="tag[]" value="<?= $t['name']; ?>" > <?= $t['name']; ?>
                                        </label>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </li>
                        <a href="<?= base_url('blog/add_tag') ?>" class="btn btn-primary">Add Tag</a>
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
                                <strong class="mr-1">Status:</strong> Draft
                            </span>
                        </li>
                        <li class="list-group-item d-flex px-3">
                            <button class="btn btn-sm btn-outline-accent" type="submit">
                                <i class="material-icons">save</i> Save Draft</button>
                        </li>
                    </ul>
                </div>
            </div>
            </form>
            <!-- / Post Overview -->


        </div>
    </div>
</div>