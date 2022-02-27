<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    public function print()
    {
        $invoiceItems = [
            ['item' => 'Website Design', 'amount' => 50.50],
            ['item' => 'Hosting (3 months)', 'amount' => 80.50],
            ['item' => 'Domain (1 year)', 'amount' => 10.50]
        ];
        $invoiceData = [
            'invoice_id' => 123,
            'transaction_id' => 1234567,
            'payment_method' => 'Paypal',
            'creation_date' => date('M d, Y'),
            'total_amount' => 141.50
        ];
        $pdf = PDF::loadView('invoice', compact('invoiceItems', 'invoiceData'));
        return $pdf->download('invoice.pdf');
    }
}
