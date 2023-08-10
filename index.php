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
    
    <div class="mb-3">
      <label for="descripcion" class="form-label">Descripción</label>
      <input type="text" class="form-control" id="descripcion">
    </div>
    <div class="mb-3">
      <label for="unidades" class="form-label">Unidades</label>
      <input type="number" class="form-control" id="unidades">
    </div>
    <div class="mb-3">
      <label for="precio" class="form-label">Precio por Unidad</label>
      <input type="number" class="form-control" id="precio">
    </div>
    <button class="btn btn-primary" onclick="agregarFila()">Agregar</button>

    <table class="table table-bordered mt-4">
      <thead>
        <tr>
          <th>Descripción</th>
          <th>Unidades</th>
          <th>Precio por Unidad</th>
          <th>Total</th>
        </tr>
      </thead>
      <tbody id="tablaBody">
        <!-- Las filas se agregarán aquí mediante JavaScript -->
      </tbody>
      <tfoot>
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
      </tfoot>
    </table>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    function agregarFila() {
      var descripcion = document.getElementById("descripcion").value;
      var unidades = parseInt(document.getElementById("unidades").value);
      var precio = parseFloat(document.getElementById("precio").value);
      var total = unidades * precio;

      var fila = `
        <tr>
          <td>${descripcion}</td>
          <td>${unidades}</td>
          <td>${precio.toFixed(2)}</td>
          <td>${total.toFixed(2)}</td>
        </tr>
      `;

      document.getElementById("tablaBody").innerHTML += fila;

      calcularTotales();
    }

    function calcularTotales() {
      var filas = document.querySelectorAll("#tablaBody tr");
      var subtotal = 0;

      filas.forEach(function(fila) {
        subtotal += parseFloat(fila.querySelector("td:nth-child(4)").textContent);
      });

      var igv = subtotal * 0.18;
      var total = subtotal + igv;

      document.getElementById("subtotal").textContent = subtotal.toFixed(2);
      document.getElementById("igv").textContent = igv.toFixed(2);
      document.getElementById("total").textContent = total.toFixed(2);
    }
  </script>
</body>
</html>
