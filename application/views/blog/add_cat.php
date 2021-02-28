<!-- Main Content -->
<div class="main-content-container container-fluid px-4">
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <h3 class="page-title"><?= $title ?></h3>
        </div>
    </div>
    <!-- End Page Header -->

    <!-- datatable -->
    <section class="no-padding-top">
        <div class="container-fluid">
            <?= $this->session->flashdata('message'); ?>
            <div class="block">
                <a href="" class="btn btn-primary" data-toggle="modal" data-target="#addData">Add Category</a>
                <div class="title"><strong>Data Category</strong></div>
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($cat as $c) : ?>
                                <tr>
                                    <th scope="row"><?= $i; ?></th>
                                    <td><?= $c['cat_name']; ?></td>
                                    <td>
                                        <a href="#" class="badge badge-warning" data-toggle="modal" data-target="#editData<?= $c['id'] ?>">Edit</a>
                                        <a href="#" class="badge badge-danger" data-toggle="modal" data-target="#deleteData<?= $c['id'] ?>">Delete</a>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </section>
    <!-- end datatable -->
</div>

<!--publish-->

    <div class="modal fade" id="addData" tabindex="-1" role="dialog" aria-labelledby="addDataLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addDataLabel">Add Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('blog/add_cat_form') ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control name_cat mb-3" name="name_cat"  placeholder="Category Name..." required>
                            <input type="text" readonly class="form-control cat_slug" name="cat_slug" placeholder="Category Slug..." >
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

<!--endpublish-->
<!--publish-->

<?php foreach ($cat as $c) : ?>
    <div class="modal fade" id="editData<?= $c['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editDataLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editDataLabel">Edit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('blog/edit_cat_form') ?>" method="post">
                    <div class="modal-body">
                    <div class="form-group">
                            <input type="hidden" name="id" value="<?= $c['id']?>" >
                            <input type="text" class="form-control name_cat mb-3" name="name_cat" value="<?= $c['cat_name']?>" placeholder="Category Name..." required>
                            <input type="text" readonly class="form-control cat_slug" name="cat_slug" value="<?= $c['cat_slug']?>" placeholder="Category Slug..." >
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!--endpublish-->

<!--delete-->

<?php foreach ($cat as $c) : ?>
    <div class="modal fade" id="deleteData<?= $c['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="deleteDataLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteDataLabel">Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('blog/delete_cat') ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" name="id" id="id" value="<?= $c['id'] ?>">
                            <p>Apakah Anda Ingin Menghapus Category <?= $c['cat_name'] ?> ?</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Delete</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!--enddelete-->