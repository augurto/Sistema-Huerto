<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <title>Tabla de Precios</title>
</head>
<body>
  <div class="container mt-5">
    <h2>Tabla de Precios</h2>
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
          <td>Tostado Mix de 50g</td>
          <td>80</td>
          <td>S/.3,60</td>
          <td>S/.288,00</td>
        </tr>
        <tr>
          <td>Sumac Mix de 50g</td>
          <td>80</td>
          <td>S/.3,26</td>
          <td>S/.260,80</td>
        </tr>
        <!-- Agregar filas adicionales si es necesario -->
        <tr>
          <td colspan="3" class="text-right">Subtotal</td>
          <td>S/.548,80</td>
        </tr>
        <tr>
          <td colspan="3" class="text-right">IGV (18%)</td>
          <td>S/.98,99</td>
        </tr>
        <tr>
          <td colspan="3" class="text-right">Total</td>
          <td>S/.647,79</td>
        </tr>
      </tbody>
    </table>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
