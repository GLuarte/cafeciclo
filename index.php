<?php
require 'db.php';
$sql = 'SELECT * FROM producto';
$statement = $connection->prepare($sql);
$statement->execute();
$producto = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Productos</h2>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Cantidad</th>
          <th>Precio</th>
          <th>Accion</th>
        </tr>
        <?php foreach($producto as $producto): ?>
          <tr>
            <td><?= $producto->P_ID; ?></td>
            <td><?= $producto->Prod_nombre; ?></td>
            <td><?= $producto->Unid_disp; ?></td>
            <td><?= $producto->Precio; ?></td>
            <td>
              <a href="edit.php?id=<?= $producto->P_ID ?>" class="btn btn-info">Editar</a>
              <a onclick="return confirm('¿Está seguro que quiere eliminar este producto?')" href="delete.php?id=<?= $producto->P_ID ?>" class='btn btn-danger'>Eliminar</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
