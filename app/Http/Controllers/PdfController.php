<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function generate_pdf()
    {
        $data = 'webjourney.dev';
        $pdf = Pdf::loadView('Users.sales.invoice',compact('data'));
        return $pdf->stream('billing-invoice');
    }

    public function download_pdf()
    {
        $data = 'webjourney.dev';
        $pdf = Pdf::loadView('billing_invoice',compact('data'));
        return $pdf->download('billing-invoice.pdf');
    }
}
