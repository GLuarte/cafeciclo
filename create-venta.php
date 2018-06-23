<?php
require 'db.php';
$message = '';
$is_valid = isset ($_POST['fecha']) && isset($_POST['hora']) &&  isset($_POST['pago']) && isset ($_POST['dscto'])  && isset($_POST['rutemple']) &&  isset($_POST['rutclie']);
if ($is_valid) {
  // tabla ventas
  $fecha = $_POST['fecha'];
  $hora = $_POST['hora'];
  $pago = $_POST['pago'];
  $dscto = $_POST['dscto'];
  $rutemple = $_POST['rutemple'];
  $rutclie = $_POST['rutclie'];
  $sql = 'INSERT INTO Venta(V_fecha,V_hora,Mont_total,Mont_pagado,Dscto,E_rut,C_rut) VALUES(:fecha, :hora, :pago, :dscto, :rutemple, :rutclie)';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':fecha' => $fecha, ':hora' => $hora, ':pago' => $pago, ':dscto' => $dscto, ':rutemple' => $rutemple, ':rutclie' => $rutclie])) {
    $id_venta = $connection->lastInsertId();
    $message = 'Venta creada con Id ' . $id_venta;
    // tabla producto_venta
    $sql = 'INSERT INTO prod_vent(V_ID,P_ID,Unid_vend) VALUES(:id_venta,:id_producto,:cant_producto)';
    $statement = $connection->prepare($sql);
    if ($statement->execute([':id_venta' => $id_venta, ':id_producto' => 1, ':cant_producto' => 1])) {
      $message = 'asdasd';
      echo $message;
    }
    echo $message;
  }

}


 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Registrar Venta</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
          <label for="fecha">Fecha</label>
          <input type="text" name="fecha" id="fecha" class="form-control">
        </div>
        <div class="form-group">
          <label for="hora">Hora</label>
          <input type="time" name="hora" id="hora" class="form-control">
        </div>
        <div class="form-group">
          <label for="pago">Monto Cancelado</label>
          <input type="number" name="pago" id="pago" class="form-control">
        </div>
        <div class="form-group">
          <label for="pago">Descuento</label>
          <input type="number" name="dscto" id="dscto" class="form-control" value="0">
        </div>
        <div class="form-group">
          <label for="pago">Rut Empleado</label>
          <input type="text" name="rutemple" id="rutemple" class="form-control">
        </div>
        <div class="form-group">
          <label for="pago">Rut Cliente</label>
          <input type="text" name="rutclie" id="rutclie" class="form-control">
        </div>
        <h3>Productos vendidos</h3>
        <div class="row">
          <div class="col col-md-4">
            <div class="form-group">
              <label for="productId1">ID producto</label>
              <input type="number" name="productId1" id="productId1" class="form-control">
            </div>
            <div class="form-group">
              <label for="productId2">ID producto</label>
              <input type="number" name="productId2" id="productId2" class="form-control">
            </div>
            <div class="form-group">
              <label for="productId3">ID producto</label>
              <input type="number" name="productId3" id="productId3" class="form-control">
            </div>
            <div class="form-group">
              <label for="productId4">ID producto</label>
              <input type="number" name="productId4" id="productId4" class="form-control">
            </div>
            <div class="form-group">
              <label for="productId5">ID producto</label>
              <input type="number" name="productId5" id="productId5" class="form-control">
            </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Registrar Venta</button>
        </div>


      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
