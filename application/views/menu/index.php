
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

                   

                    <div class="row">
                        <div class="col-lg-6">
                        <?= form_error('menu', '<div class="alert alert-danger" role="alert">
                        Menu harus diisi.','</div>'); ?>
                        

                        <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahMenu">Tambah Menu Baru</a>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                <th scope="col">No</th>
                                <th scope="col">Menu</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach($menu as $m): ?>
                                <tr>
                                    <th scope="row"><?= $i; ?></th>
                                    <td><?= $m['menu']; ?></td>
                                    <td>
                                        <a href="" class="badge badge-success">edit</a>
                                        <a href="" class="badge badge-danger">delete</a>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->


                <!-- Modal -->
                <div class="modal fade" id="tambahMenu" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Menu</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('menu')?>" method="post">
                        <div class="modal-body">
                        <div class="form-group">
                            <label for="formGroupExampleInput"></label>
                            <input type="text" class="form-control" id="menu" name="menu" placeholder="Nama Menu">
                        </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </form>
                    </div>
                </div>
                </div>
            <!-- End Modal -->