<?php
require 'vendor/autoload.php'; // Asegúrate de incluir la ruta correcta al archivo autoload de DOMPDF

use Dompdf\Dompdf;

// Crear una instancia de Dompdf
$dompdf = new Dompdf();

// HTML con solo la tabla que deseas imprimir
$html = '
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <title>Tabla a Imprimir</title>
</head>
<body>
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

  <script>
    // ... (Aquí va el código JavaScript que agregaste antes)
  </script>
</body>
</html>
';

// Cargar el contenido HTML en DOMPDF
$dompdf->loadHtml($html);

// Renderizar el PDF (puedes configurar tamaños de página y orientación aquí si es necesario)
$dompdf->setPaper('A4', 'portrait');

// Renderizar el contenido HTML a PDF
$dompdf->render();

// Generar la salida del PDF en el navegador
$dompdf->stream("tabla_impresa.pdf", array("Attachment" => false));
?>
