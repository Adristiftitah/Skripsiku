<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Mahasiswa Bimbingan</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabel Bimbingan</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIM Pengusul</th>
                        <th>Nama Pengusul</th>
                        <th>Nama Anggota 1</th>
                        <th>Nama Anggota 2</th>
                        <!-- <th>NIP Pembimbing</th>
                        <th>Nama Pembimbing</th> -->
                        <!-- <th>Status</th>
                        <th>File Pengajuan</th> -->
                        <th>Nama Perusahaan</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Berakhir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($pembimbing == null): ?>
                    <tr>
                        <td colspan="9">Data Kosong</td>
                    </tr>
                    <?php else: ?>
                    
                    <?php $no=1; foreach ($pembimbing as $mhs){ ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $mhs->nim; ?></td>
                        <td><?php echo $mhs->nama; ?></td>
                        <td><?php echo $mhs->namaAng1; ?></td>
                        <td><?php echo $mhs->namaAng2; ?></td>
                        <!-- <td><?php echo $mhs->nip; ?></td>
                        <td><?php echo $mhs->dosen; ?></td> -->
                        <!-- <td><?php if ($mhs-> status == "diproses" || $mhs->status == null) { ?>
                           <a href="<?=  base_url('index.php/DosenController/updateStatus/'). $mhs->id_pengajuan_pembimbing . '/' . '1' ?>">Setuju</a>
                           / <a href="<?=  base_url('index.php/DosenController/updateStatus/'). $mhs->id_pengajuan_pembimbing . '/' . '2' ?>">Tolak</a>
                       <?php }else{ echo $mhs->status; } ?></td>
                        <td><a href="<?= base_url('assets/balasan/'.$mhs->file_pengajuan) ?>"><?php echo $mhs->file_pengajuan; ?></a></td> -->
                        <td><?php echo $mhs->create_at; ?></td>
                    </tr>
                    <?php } ?> 
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>