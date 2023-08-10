<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <title>Calculadora de Precios</title>
</head>
<body>
  <div class="container mt-5">
    <h2>Calculadora de Precios</h2>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Descripción</th>
          <th>Unidades</th>
          <th>Precio por Unidad</th>
          <th>Total</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><input type="text" class="form-control" id="descripcion1"></td>
          <td><input type="number" class="form-control" id="unidades1" onchange="calcularTotal(1)"></td>
          <td><input type="number" class="form-control" id="precio1" onchange="calcularTotal(1)"></td>
          <td><span id="total1">0</span></td>
        </tr>
        <tr>
          <td><input type="text" class="form-control" id="descripcion2"></td>
          <td><input type="number" class="form-control" id="unidades2" onchange="calcularTotal(2)"></td>
          <td><input type="number" class="form-control" id="precio2" onchange="calcularTotal(2)"></td>
          <td><span id="total2">0</span></td>
        </tr>
        <!-- Agregar más filas si es necesario -->
        <tr>
          <td colspan="3" class="text-right">Subtotal</td>
          <td><span id="subtotal">0</span></td>
        </tr>
        <tr>
          <td colspan="3" class="text-right">IGV (18%)</td>
          <td><span id="igv">0</span></td>
        </tr>
        <tr>
          <td colspan="3" class="text-right">Total</td>
          <td><span id="total">0</span></td>
        </tr>
      </tbody>
    </table>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    function calcularTotal(row) {
      var unidades = parseInt(document.getElementById("unidades" + row).value);
      var precio = parseFloat(document.getElementById("precio" + row).value);
      var total = unidades * precio;

      document.getElementById("total" + row).textContent = total.toFixed(2);

      calcularSubtotal();
    }

    function calcularSubtotal() {
      var total1 = parseFloat(document.getElementById("total1").textContent);
      var total2 = parseFloat(document.getElementById("total2").textContent);

      var subtotal = total1 + total2;
      var igv = subtotal * 0.18;
      var total = subtotal + igv;

      document.getElementById("subtotal").textContent = subtotal.toFixed(2);
      document.getElementById("igv").textContent = igv.toFixed(2);
      document.getElementById("total").textContent = total.toFixed(2);
    }
  </script>
</body>
</html>
