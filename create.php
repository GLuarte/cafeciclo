<?php
require 'db.php';
$message = '';
if (isset ($_POST['nombre'])  && isset($_POST['cantidad']) &&         (isset($_POST['precio']) )) {
  $nombre = $_POST['nombre'];
  $cantidad = $_POST['cantidad'];
  $precio = $_POST['precio'];
  $sql = 'INSERT INTO producto(Prod_nombre,Unid_disp,Precio) VALUES(:nombre, :cantidad, :precio)';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':nombre' => $nombre, ':cantidad' => $cantidad, ':precio' => $precio])) {
    $message = 'Producto Registrado Exitosamente';
  }



}


 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Registrar Producto</h2>
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
          <label for="email">Cantidad</label>
          <input type="name" name="cantidad" id="cantidad" class="form-control">
        </div>
        <div class="form-group">
          <label for="email">Precio</label>
          <input type="name" name="precio" id="precio" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Registrar Producto</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
