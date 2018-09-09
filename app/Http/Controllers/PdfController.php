<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deuda;
class PdfController extends Controller
{
    public function invoice($id)
    {
        $deuda = Deuda::with('detalles')->find($id);
        $date = date('Y-m-d');
        $invoice = "2222";
        $view =  \View::make('pdf.ticket_deuda', compact('deuda', 'date', 'invoice'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('invoice');
    }

    public function getInvoice($id)
    {
        $data = Deuda::with('detalles')->find($id);
        return $data;
    }
}
