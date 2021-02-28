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
                <a href="" class="btn btn-primary" data-toggle="modal" data-target="#addData">Add Tag</a>
                <div class="title"><strong>Data Tag</strong></div>
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
                            <?php foreach ($tag as $t) : ?>
                                <tr>
                                    <th scope="row"><?= $i; ?></th>
                                    <td><?= $t['name']; ?></td>
                                    <td>
                                        <a href="#" class="badge badge-warning" data-toggle="modal" data-target="#editData<?= $t['id'] ?>">Edit</a>
                                        <a href="#" class="badge badge-danger" data-toggle="modal" data-target="#deleteData<?= $t['id'] ?>">Delete</a>
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
                    <h5 class="modal-title" id="addDataLabel">Add Tag</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('blog/add_tag_form') ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control name_tag mb-3" name="name_tag"  placeholder="Tag Name..." required>
                            <input type="text" readonly class="form-control slug_tag" name="slug_tag" placeholder="Tag Slug..." >
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

<?php foreach ($tag as $t) : ?>
    <div class="modal fade" id="editData<?= $t['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editDataLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editDataLabel">Edit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('blog/edit_tag_form') ?>" method="post">
                    <div class="modal-body">
                    <div class="form-group">
                            <input type="hidden" name="id" value="<?= $t['id']?>" >
                            <input type="text" class="form-control name_tag mb-3" name="name_tag" value="<?= $t['name']?>" placeholder="Tag Name..." required>
                            <input type="text" readonly class="form-control slug_tag" name="slug_tag" value="<?= $t['slug']?>" placeholder="Tag Slug..." >
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

<?php foreach ($tag as $t) : ?>
    <div class="modal fade" id="deleteData<?= $t['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="deleteDataLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteDataLabel">Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('blog/delete_tag') ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" name="id" id="id" value="<?= $t['id'] ?>">
                            <p>Apakah Anda Ingin Menghapus Category <?= $t['name'] ?> ?</p>
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