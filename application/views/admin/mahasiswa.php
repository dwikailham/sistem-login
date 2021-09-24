                <!-- Begin Page Content -->
                <div class="container-fluid">


                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
                    <div class="row">
                        <div class="col-lg-11">

                        <?php if(validation_errors()) : ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= validation_errors(); ?>
                                </div>
                        <?php endif; ?>
                        <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahMahasiswa">Tambah Mahasiswa Baru</a>
                        
                        <?= $this->session->flashdata('message'); ?>
                        <?= $this->session->unset_userdata('message'); ?>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">NIM</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Jurusan</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach($mahasiswa as $m): ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $m['nama']; ?></td>
                                        <td><?= $m['nim']; ?></td>
                                        <td><?= $m['email']; ?></td>
                                        <td><?= $m['jurusan']; ?></td>
                                        <td>
                                            <a id="detail_mhs" href="" class="badge badge-warning" 
                                                data-toggle="modal" 
                                                data-target="#detailMahasiswa"
                                               
                                                >detail</a>
                                            <a href="" class="badge badge-success">edit</a>
                                            <a href="<?= base_url(); ?>admin/hapusMahasiswa/<?= $m['id']; ?>" class="badge badge-danger">delete</a>
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

            <!-- Modal Tambah Mahasiswa -->
            <div class="modal fade" id="tambahMahasiswa" tabindex="-1" aria-labelledby="tambahMahasiswa" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tambahMahasiswa">Tambah Data Mahasiswa</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('admin/tambahMahasiswa')?>" method="post">
                        <div class="modal-body">
                            
                        <div class="form-group">
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="nim" name="nim" placeholder="Masukkan NIM">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="email" name="email" placeholder="Masukkan Email">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="jurusan" name="jurusan" placeholder="Masukkan Jurusan">
                        </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            <!-- End Modal -->

            <!-- Modal Detail Mahasiswa -->
            <div class="modal fade" id="detailMahasiswa" tabindex="-1" aria-labelledby="detailMahasiswa" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="detailMahasiswa">Detail Mahasiswa</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('admin/tambahMahasiswa')?>" method="post">
                        <div class="modal-body">
                            
                        <div class="form-group">
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="nim" name="nim" placeholder="Masukkan NIM">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="email" name="email" placeholder="Masukkan Email">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="jurusan" name="jurusan" placeholder="Masukkan Jurusan">
                        </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            <!-- End Modal -->
