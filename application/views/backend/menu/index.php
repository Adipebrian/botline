<!-- Main Content -->
<div class="main-content-container container-fluid px-4">
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <h3 class="page-title"><?= $title?></h3>
              </div>
            </div>
            <!-- End Page Header -->
    <!-- datatable -->
    <div class="container-fluid">
        <?= $this->session->flashdata('message'); ?>
        <div class="block">
            <div class="title"><strong>Data Role</strong></div>
            <div class="table-responsive">
                <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newMenuModal">Add New Menu</a>
                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Menu</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($menu as $m) : ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $m['menu']; ?></td>
                                <td>
                                    <a href="#" class="badge badge-success" data-toggle="modal" data-target="#updateData<?= $m['id'] ?>">Edit</a>
                                    <a href="#" class="badge badge-danger" data-toggle="modal" data-target="#deleteData<?= $m['id'] ?>">Delete</a>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--end datatable -->
    <!-- Modal -->
    <div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newMenuModalLabel">Add New Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('backend/menu'); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="menu" name="menu" placeholder="Menu name">
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
    <!--end add-->
    <!--update-->
    <?php foreach ($menu as $m) : ?>
        <div class="modal fade" id="updateData<?= $m['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="updateDataLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateDataLabel">Update Data </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('backend/menu/updatedata') ?>" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="hidden" name="id" id="id" value="<?= $m['id'] ?>">
                                <input type="text" class="form-control" id="update" name="update" value="<?= $m['menu'] ?>" placeholder="Role">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <!--end update-->
    <!--delete data-->
    <?php foreach ($menu as $m) : ?>
        <div class="modal fade" id="deleteData<?= $m['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="addNewDataLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addNewDataLabel">Hapus Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Anda yakin ingin menghapus Data <?= $m['menu']; ?> ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a href="<?= base_url('backend/menu/deletedata/') . $m['id']?>" class="btn btn-primary">Hapus</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <!--end delete data-->