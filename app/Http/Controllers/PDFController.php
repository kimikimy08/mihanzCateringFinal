<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Reservation;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function generateSummaryPDF($reservationId)
    {
        $reservation = Reservation::with('premades.servicePackage', 'user')->findOrFail($reservationId);

        $data = [
            'reservations' => $reservation,
        ];

        // Load the view file into PDF
        $pdf = PDF::loadView('user.reservations.p_summary', $data)->setOptions(['no-images' => true]);

        // Use a relative path for the output file
        $pdfPath = 'pdf/' . uniqid('summary_') . '.pdf';

        // Save the PDF to the specified path
        $pdf->save($pdfPath);

        // Create a response and delete the file after sending
        return response()
            ->file($pdfPath, ['Content-Type' => 'application/pdf'])
            ->deleteFileAfterSend(true);
    }
}