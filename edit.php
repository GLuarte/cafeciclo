<?php
require 'db.php';
$id = $_GET['id'];
$sql = 'SELECT * FROM producto WHERE P_ID=:id';
$statement = $connection->prepare($sql);
$statement->execute([':id' => $id ]);
$producto = $statement->fetch(PDO::FETCH_OBJ);
if (isset ($_POST['nombre'])  && isset($_POST['cantidad']) && isset($_POST['precio']) ) {
  $nombre = $_POST['nombre'];
  $cantidad = $_POST['cantidad'];
  $precio = $_POST['precio'];
  $sql = 'UPDATE producto SET Prod_nombre=:nombre, Unid_disp=:cantidad Precio=:precio WHERE P_ID=:id';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':nombre' => $nombre, ':cantidad' => $cantidad, ':precio' => $precio, ':id' => $id])) {
    header("Location: index.php");
  }



}


 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Editar Producto</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
          <label for="nombre">Nombre</label>
          <input value="<?= $producto->Prod_nombre; ?>" type="text" name="nombre" id="nombre" class="form-control">
        </div>
        <div class="form-group">
          <label for="cantidad">Cantidad</label>
          <input value="<?= $producto->Unid_disp; ?>" type="text" name="cantidad" id="cantidad" class="form-control">
        </div>
        <div class="form-group">
          <label for="precio">Precio</label>
          <input value="<?= $producto->Precio; ?>" type="text" name="precio" id="precio" class="form-control">
        </div>  
        <div class="form-group">
          <button type="submit" class="btn btn-info">Editar</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
