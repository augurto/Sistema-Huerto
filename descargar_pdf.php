<?php
require 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['tablaData'])) {
    $tablaData = json_decode($_POST['tablaData'], true);

    $html = '<html><body><table border="1" cellpadding="5" cellspacing="0">
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

    $html .= '</tbody></table></body></html>';

    $dompdf = new Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();

    // Generar nombre único para el archivo PDF
    $pdfFileName = 'tabla_' . date('YmdHis') . '.pdf';

    // Guardar el archivo PDF en el servidor
    file_put_contents($pdfFileName, $dompdf->output());

    // Descargar el archivo PDF
    header('Content-Type: application/pdf');
    header('Content-Disposition: inline; filename="' . $pdfFileName . '"');
    readfile($pdfFileName);

    // Eliminar el archivo temporal
    unlink($pdfFileName);
} else {
    echo 'No se recibieron datos de la tabla.';
}
?>
