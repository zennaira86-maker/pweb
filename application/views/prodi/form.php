<div class="container-fluid px-4">
    <h1 class="mt-4">Program Studi</h1>

    <div class="card mb-4 mt-3 col-md-6">
        <div class="card-header bg-secondary text-white py-3">
            <span class="fs-5 fw-semibold"><?php echo $button; ?> Data Program Studi</span>
        </div>
        <div class="card-body py-4">
            <form action="<?php echo $action; ?>" method="POST">
                
                <div class="mb-3">
                    <label for="prodi_id" class="form-label fw-bold">ID Program Studi</label>
                    <input type="text" name="prodi_id" id="prodi_id" 
                           class="form-control <?php echo form_error('prodi_id') ? 'is-invalid' : (isset($_POST['prodi_id']) ? 'is-valid' : ''); ?>"
                           value="<?php echo set_value('prodi_id', isset($prodi['prodi_id']) ? $prodi['prodi_id'] : ''); ?>"
                           <?php echo ($button === 'Update') ? 'readonly class="form-control-plaintext bg-light px-2"' : ''; ?> placeholder="Contoh: 501">
                    <?php if (form_error('prodi_id')): ?>
                        <div class="invalid-feedback"><?php echo form_error('prodi_id'); ?></div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="fakultas_id" class="form-label fw-bold">Fakultas</label>
                    <select name="fakultas_id" id="fakultas_id" class="form-select <?php echo form_error('fakultas_id') ? 'is-invalid' : (isset($_POST['fakultas_id']) ? 'is-valid' : ''); ?>">
                        <option value="">-- Pilih Fakultas --</option>
                        <?php foreach ($fakultas as $f): ?>
                            <option value="<?php echo $f['fakultas_id']; ?>"
                                <?php echo set_select('fakultas_id', $f['fakultas_id'], (isset($prodi['fakultas_id']) && $prodi['fakultas_id'] == $f['fakultas_id'])); ?>>
                                <?php echo $f['fakultas_name']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <?php if (form_error('fakultas_id')): ?>
                        <div class="invalid-feedback"><?php echo form_error('fakultas_id'); ?></div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="prodi_name" class="form-label fw-bold">Nama Program Studi</label>
                    <input type="text" name="prodi_name" id="prodi_name" 
                           class="form-control <?php echo form_error('prodi_name') ? 'is-invalid' : (isset($_POST['prodi_name']) ? 'is-valid' : ''); ?>"
                           value="<?php echo set_value('prodi_name', isset($prodi['prodi_name']) ? $prodi['prodi_name'] : ''); ?>" placeholder="Masukkan Nama Program Studi">
                    <?php if (form_error('prodi_name')): ?>
                        <div class="invalid-feedback"><?php echo form_error('prodi_name'); ?></div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold d-block">Strata</label>
                    <div class="py-1">
                        <?php
                        $strata_options = ['D3', 'S1', 'S2'];
                        foreach ($strata_options as $s): ?>
                            <div class="form-check form-check-inline me-4">
                                <input class="form-check-input <?php echo form_error('prodi_strata') ? 'is-invalid' : (isset($_POST['prodi_strata']) ? 'is-valid' : ''); ?>"
                                    type="radio" name="prodi_strata" id="strata_<?php echo $s; ?>"
                                    value="<?php echo $s; ?>"
                                    <?php echo set_radio('prodi_strata', $s, (isset($prodi['prodi_strata']) && $prodi['prodi_strata'] === $s)); ?>>
                                <label class="form-check-label fst-normal" for="strata_<?php echo $s; ?>"><?php echo $s; ?></label>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <?php if (form_error('prodi_strata')): ?>
                        <div class="text-danger small mt-1"><?php echo form_error('prodi_strata'); ?></div>
                    <?php endif; ?>
                </div>

                <div class="mt-4 pt-2">
                    <button type="submit" class="btn btn-primary px-4 fw-bold"><?php echo $button; ?></button>
                    <a href="<?php echo base_url('index.php/prodi'); ?>" class="btn btn-outline-secondary px-4 ms-1">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>