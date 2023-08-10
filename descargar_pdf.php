<?php
require 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;

if (isset($_POST['tablaData'])) {
  $tablaData = json_decode($_POST['tablaData'], true);

  $html = '<table border="1" cellpadding="5" cellspacing="0">
            <thead>
              <tr>
                <th>Descripción</th>
                <th>Unidades</th>
                <th>Precio por Unidad</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody>';
            
  foreach ($tablaData as $fila) {
    $html .= '<tr>
               <td>' . $fila['descripcion'] . '</td>
               <td>' . $fila['unidades'] . '</td>
               <td>' . $fila['precio'] . '</td>
               <td>' . $fila['total'] . '</td>
             </tr>';
  }

  $html .= '</tbody></table>';

  $dompdf = new Dompdf();
  $dompdf->loadHtml($html);
  $dompdf->setPaper('A4', 'portrait');
  $dompdf->render();
  $dompdf->stream("tabla.pdf", array("Attachment" => false));
}
?>
