<?php
require 'db.php';
$message = '';
if (isset ($_POST['nombre'])  && isset($_POST['rut']) &&         (isset($_POST['correo']) 	&&	 	isset($_POST['telefono']) )) {
  $nombre = $_POST['nombre'];
  $rut = $_POST['rut'];
  $correo = $_POST['correo'];
  $telefono = $_POST['telefono'];
  $sql = 'INSERT INTO cliente(C_nombre,C_rut,C_correo,C_fono) VALUES(:nombre, :rut, :correo, :telefono)';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':nombre' => $nombre, ':rut' => $rut, ':correo' => $correo, ':telefono' => $telefono])) {
    $message = 'Cliente Registrado Exitosamente';
  }



}


 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Registrar Cliente</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
          <label for="name">Nombre</label>
          <input type="text" name="nombre" id="nombre" class="form-control">
        </div>
        <div class="form-group">
          <label for="email">Rut</label>
          <input type="text" name="rut" id="rut" class="form-control">
        </div>
        <div class="form-group">
          <label for="email">Correo</label>
          <input type="email" name="correo" id="correo" class="form-control">
        </div>
		<div class="form-group">
          <label for="email">Telefono</label>
          <input type="tel" name="telefono" id="telefono" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Registrar Cliente</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
