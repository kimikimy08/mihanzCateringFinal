<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class PDFController extends Controller
{
    public function generatePDF($reservationId)
    {
        // Fetch the reservation data
        $reservation = Reservation::findOrFail($reservationId);

        // Load the PDF view with the reservation data
        $pdf = PDF::loadView('pdf.document', compact('reservation'));

        // Generate a response and set headers to force opening in a new tab
        $response = Response::make($pdf->output(), 200);
        $response->header('Content-Type', 'application/pdf');
        $response->header('Content-Disposition', 'inline; filename=document.pdf');

        return $response;
    }
}