<?php
require 'db.php';
$sql = 'SELECT * FROM producto ORDER BY Unid_disp DESC';
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
	<style>
button {
  border: solid black;
  border-width: 0 3px 3px 0;
  display: inline-block;
  padding: 3px;
}

.up {
    transform: rotate(-135deg);
    -webkit-transform: rotate(-135deg);
}

.down {
    transform: rotate(45deg);
    -webkit-transform: rotate(45deg);
}
</style>
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th><form name="form1" method="GET" action="Casc.php">
		<button type="submit" name="ascendente" value="ascendente" class="up"></button>
		</form>Cantidad<form name="form1" method="GET" action="Cdsc.php">
		<button type="submit" name="descendente" value="descendente" class="down"></button>
		</form></th>
          <th><form name="form1" method="GET" action="Pasc.php">
		<button type="submit" name="ascendente" value="ascendente" class="up"></button>
		</form>Precio<form name="form1" method="GET" action="Pdsc.php">
		<button type="submit" name="descendente" value="descendente" class="down"></button>
		</form></th>
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
