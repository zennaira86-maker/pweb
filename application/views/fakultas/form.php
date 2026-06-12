<div class="container-fluid px-4">
    <h1 class="mt-4">Fakultas</h1>

    <div class="card mb-4 mt-3 col-md-6">
        <div class="card-header bg-secondary text-white py-3">
            <span class="fs-5 fw-semibold"><?php echo $button; ?> Data Fakultas</span>
        </div>
        <div class="card-body py-4">
            <form action="<?php echo $action; ?>" method="POST">
                
                <div class="mb-3">
                    <label for="fakultas_id" class="form-label fw-bold">ID Fakultas</label>
                    <input type="text" name="fakultas_id" id="fakultas_id" 
                           class="form-control <?php echo form_error('fakultas_id') ? 'is-invalid' : (isset($_POST['fakultas_id']) ? 'is-valid' : ''); ?>"
                           value="<?php echo set_value('fakultas_id', isset($fakultas['fakultas_id']) ? $fakultas['fakultas_id'] : ''); ?>"
                           <?php echo ($button === 'Update') ? 'readonly class="form-control-plaintext bg-light px-2"' : ''; ?> placeholder="Contoh: 101">
                    <?php if (form_error('fakultas_id')): ?>
                        <div class="invalid-feedback"><?php echo form_error('fakultas_id'); ?></div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="fakultas_name" class="form-label fw-bold">Nama Fakultas</label>
                    <input type="text" name="fakultas_name" id="fakultas_name" 
                           class="form-control <?php echo form_error('fakultas_name') ? 'is-invalid' : (isset($_POST['fakultas_name']) ? 'is-valid' : ''); ?>"
                           value="<?php echo set_value('fakultas_name', isset($fakultas['fakultas_name']) ? $fakultas['fakultas_name'] : ''); ?>" placeholder="Masukkan Nama Fakultas">
                    <?php if (form_error('fakultas_name')): ?>
                        <div class="invalid-feedback"><?php echo form_error('fakultas_name'); ?></div>
                    <?php endif; ?>
                </div>

                <div class="mt-4 pt-2">
                    <button type="submit" class="btn btn-primary px-4 fw-bold"><?php echo $button; ?></button>
                    <a href="<?php echo base_url('index.php/fakultas'); ?>" class="btn btn-outline-secondary px-4 ms-1">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>