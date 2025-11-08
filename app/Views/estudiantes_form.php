<div class="container mt-5">
    <div class="card shadow-lg p-4"> 
        <div class="card-header bg-primary text-white text-center">
            <h3 class="mb-0"> <?= $title ?? 'Registrar Estudiante' ?></h3>
        </div>
        
        <div class="card-body">
            <?php if (session()->getFlashdata('errors')): ?>
                <div class="alert alert-danger">
                    <p>ERROR DE INGRESO: Por favor, corrige lo siguiente:</p>
                    <ul>
                        <?php foreach (session()->getFlashdata('errors') as $error): ?>
                            <li><?= $error ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form action="<?= $action ?>" method="POST">
                
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="mt-3 text-primary">Datos del Alumno</h5>
                        <hr>
                        
                        <div class="form-group mb-3">
                            <label for="nombre">Nombre(s) <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required 
                                value="<?= old('nombre') ?>">
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="apellido">Apellido(s) <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="apellido" name="apellido" required
                                value="<?= old('apellido') ?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                         <h5 class="mt-3 text-primary">Identificación y Familia</h5>
                        <hr>

                        <div class="form-group mb-3">
                            <label for="identificacion">No. Identificación <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="identificacion" name="num_identificacion" required
                                value="<?= old('num_identificacion') ?>">
                        </div>

                        <div class="form-group mb-3">
                            <label for="id_padre">Padre/Encargado Asignado <span class="text-danger">*</span></label>
                            <select id="id_padre" name="id_padre" class="form-control" required>
                                <option value="">-- Seleccione un Padre/Encargado --</option>
                                
                                <?php $selected_id = old('id_padre'); ?>
                                <?php foreach ($padres as $padre): ?>
                                    <option value="<?= $padre['usuario_id'] ?>" 
                                        <?= ($padre['usuario_id'] == $selected_id) ? 'selected' : '' ?>>
                                        <?= $padre['nombre_completo'] ?>
                                    </option>
                                <?php endforeach; ?>

                            </select>

                        </div>
                    </div>
                </div>
                
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-success btn-lg">
                        <i class="fas fa-save"></i> Registrar Estudiante
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>