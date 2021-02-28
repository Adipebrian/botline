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
                <div class="title"><strong>Data Blog</strong></div>
                <div class="table-responsive">

                    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Tag</th>
                                <th>Status</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($blog as $b) : ?>
                                <tr>
                                    <th scope="row"><?= $i; ?></th>
                                    <td><?= $b['title']; ?></td>
                                    <td><?= $b['category']; ?></td>
                                    <td><?= $b['tag']; ?></td>
                                    <?php if ($b['status'] == 0) : ?>
                                        <td> <i class="material-icons">save</i> Draft</td>
                                    <?php else : ?>
                                        <td><i class="material-icons">file_copy</i> Publish</td>
                                    <?php endif; ?>
                                    <?php if ($b['status'] == 1) : ?>
                                        <td>
                                            <a href="#" class="badge badge-warning" data-toggle="modal" data-target="#unpublishData<?= $b['id'] ?>">Unpublish</a>
                                            <a href="<?= base_url('blog/edit/'). $b['id']?>" class="badge badge-primary">Edit</a>
                                            <a href="#" class="badge badge-danger" data-toggle="modal" data-target="#deleteData<?= $b['id'] ?>">Delete</a>
                                        </td>

                                    <?php else : ?>
                                        <td>
                                            <a href="#" class="badge badge-success" data-toggle="modal" data-target="#publishData<?= $b['id'] ?>">Publish</a>
                                            <a href="<?= base_url('blog/edit/'). $b['id']?>" class="badge badge-primary">Edit</a>
                                            <a href="#" class="badge badge-danger" data-toggle="modal" data-target="#deleteData<?= $b['id'] ?>">Delete</a>
                                        </td>
                                    <?php endif; ?>
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

<?php foreach ($blog as $b) : ?>
    <div class="modal fade" id="publishData<?= $b['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="publishDataLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="publishDataLabel">Publish</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('blog/publish') ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" name="id" id="id" value="<?= $b['id'] ?>">
                            <p>Apakah Anda Ingin Mempublish Blog Berjudul <?= $b['title'] ?></p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Publish</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!--endpublish-->
<!--unpublish-->

<?php foreach ($blog as $b) : ?>
    <div class="modal fade" id="unpublishData<?= $b['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="unpublishDataLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="unpublishDataLabel">Unpublish</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('blog/unpublish') ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" name="id" id="id" value="<?= $b['id'] ?>">
                            <p>Apakah Anda Ingin Tidak Mempublikasikan Blog Berjudul <?= $b['title'] ?></p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Unpublish</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!--endunpublish-->
<!--delete-->

<?php foreach ($blog as $b) : ?>
    <div class="modal fade" id="deleteData<?= $b['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="deleteDataLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteDataLabel">Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('blog/delete') ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" name="id" id="id" value="<?= $b['id'] ?>">
                            <p>Apakah Anda Ingin Menghapus Blog Berjudul <?= $b['title'] ?></p>
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