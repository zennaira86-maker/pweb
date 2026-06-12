<div class="container-fluid px-4">
    
    <div class="card mb-4 mt-3">
        <div class="card-header d-flex justify-content-between align-items-center bg-secondary text-white py-3">
            <span class="fs-5 fw-semibold"><i class="bi bi-table me-1"></i> Data Program Studi</span>
            <a href="<?php echo base_url('index.php/prodi/tambah'); ?>" class="btn btn-primary px-4 fw-bold">
                <i class="bi bi-plus-lg"></i> Tambah
            </a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                
            <table id="datatable" class="table table-bordered table-striped table-hover align-middle" style="width:100%">
                <thead class="table-dark text-white">
                    <tr>
                        <th width="8%" class="text-center">No.</th>
                        <th width="12%">ID Prodi</th>
                        <th>Nama Program Studi</th>
                        <th width="15%" class="text-center">Strata</th>
                        <th width="30%">Fakultas</th>
                        <th width="15%" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    foreach ($prodi as $p): ?>
                        <tr>
                            <td class="text-center"><?php echo $no++; ?>.</td>
                            <td><strong><?php echo $p['prodi_id']; ?></strong></td>
                            <td><?php echo $p['prodi_name']; ?></td>
                            <td class="text-center"><span class="badge bg-info text-dark fw-bold"><?php echo $p['prodi_strata']; ?></span></td>
                            <td><?php echo $p['fakultas_name']; ?></td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-1">
                                    <a href="<?php echo base_url('index.php/prodi/ubah/' . $p['prodi_id']); ?>" class="btn btn-warning btn-sm text-dark px-2">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <a href="<?php echo base_url('index.php/prodi/hapus/' . $p['prodi_id']); ?>" class="btn btn-danger btn-sm btn-hapus px-2">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>