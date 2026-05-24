<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    //  Descarga directa al navegador
    public function descargar()
    {
        $datos = [
            'titulo' => 'Listado de Alumnos',
            'alumnos' => [
                ['nombre' => 'Ana García', 'correo' => 'ana@mail.com'],
                ['nombre' => 'Luis Martínez', 'correo' => 'luis@mail.com'],
            ],
        ];

        $pdf = Pdf::loadView('pdf.reporte', $datos);

        return $pdf->download('reporte-alumnos.pdf');
    }

    //  Muestra el PDF en el navegador (inline)
    public function ver()
    {
        $datos = ['titulo' => 'Listado', 'alumnos' => []];

        return Pdf::loadView('pdf.reporte', $datos)->stream('reporte.pdf');
    }

    //  Guarda el PDF en storage/
    public function guardar()
    {
        $datos = ['titulo' => 'Reporte guardado', 'alumnos' => []];
        $pdf = Pdf::loadView('pdf.reporte', $datos);
        $ruta = 'pdfs/reporte-'.now()->format('Ymd-His').'.pdf';
        \Storage::put($ruta, $pdf->output());

        return response()->json(['ruta' => $ruta]);
    }
}
