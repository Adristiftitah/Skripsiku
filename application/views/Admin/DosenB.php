<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Data Diri Dosen Pembimbing</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Dosen</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pembimbing</th>
                                            <th>Prodi Pengusul</th>
                                            <th>Jumlah Mahasiswa Bimbingan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; 
                                        foreach ($dosen as $dsn) { ?>
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $dsn->nama; ?></td>
                                            <td><?php echo $dsn->kodeprodi; ?></td>
                                            <td><?php echo $dsn->jumlah; ?></td>
                                        </tr>
                                        <?php } ?> 
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
 <!-- /.container-fluid -->