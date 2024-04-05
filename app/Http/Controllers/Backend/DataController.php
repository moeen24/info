<?php

namespace App\Http\Controllers\Backend;

use App\Models\Info;
use Dompdf\Dompdf;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DataController extends Controller
{

    // Single Data Print to txt
    public function txt($id)
    {

        $info = Info::findOrFail($id);

        $formattedData = '';

        $formattedData .= "Name: $info->firstName $info->lastName\n";
        $formattedData .= "Phone Number: $info->phoneNumber\n";
        $formattedData .= "Zip Code: $info->zipCode\n";
        $formattedData .= "Assress: $info->address\n";
        $formattedData .= "City: $info->city\n";
        $formattedData .= "Province: $info->provice\n";
        $formattedData .= "Secondary Phone Number: $info->secondaryPhone\n";
        $formattedData .= "Secondary Phone Number: $info->secondaryPhoneTwo\n";
        $formattedData .= "Daten Of Birth: $info->dob\n";
        $formattedData .= "Business: $info->business\n";
        $formattedData .= "Social Date: $info->socialDate\n";


        $directoryPath = public_path();
        $filePath = $directoryPath . '/data_' . $id . '.txt';
        
        if (!file_exists($directoryPath)) {
    mkdir($directoryPath, 0755, true);
}

file_put_contents($filePath, $formattedData);


        return response()->download($filePath, "data_{$id}.txt")->deleteFileAfterSend();
    }

    // All Data Print to txt
    public function allTxt()
    {

        $infos = Info::all();


        $formattedData = '';

        foreach ($infos as $info) {
            $formattedData .= "Name: $info->firstName $info->lastName\n";
            $formattedData .= "Phone Number: $info->phoneNumber\n";
            $formattedData .= "Zip Code: $info->zipCode\n";
            $formattedData .= "Assress: $info->address\n";
            $formattedData .= "City: $info->city\n";
            $formattedData .= "Province: $info->provice\n";
            $formattedData .= "Secondary Phone Number: $info->secondaryPhone\n";
            $formattedData .= "Secondary Phone Number: $info->secondaryPhoneTwo\n";
            $formattedData .= "Daten Of Birth: $info->dob\n";
            $formattedData .= "Business: $info->business\n";
            $formattedData .= "Social Date: $info->socialDate\n\n\n";

        }


        $filePath = public_path('data.txt');
        file_put_contents($filePath, $formattedData);


        return response()->download($filePath, 'data.txt')->deleteFileAfterSend();
    }



    // Single Data Print to Pdf
    public function pdf($id)
    {
        $info = Info::findOrFail($id);

        $htmlContent = '<h1>All Information</h1><br>';

        $htmlContent .= '<p><strong>Name:</strong> ' . $info->firstName . ' ' . $info->lastName . '</p>';
        $htmlContent .= '<p><strong>Phone Number:</strong> ' . $info->phoneNumber . '</p>';
        $htmlContent .= '<p><strong>Zip Code:</strong> ' . $info->zipCode . '</p>';
        $htmlContent .= '<p><strong>Address:</strong> ' . $info->address .  '</p>';
        $htmlContent .= '<p><strong>City:</strong> ' . $info->city .  '</p>';
        $htmlContent .= '<p><strong>Province:</strong> ' . $info->provice .  '</p>';
        $htmlContent .= '<p><strong>Secondary Phone Number:</strong> ' . $info->secondaryPhone .  '</p>';
        $htmlContent .= '<p><strong>Secondary Phone Number:</strong> ' . $info->secondaryPhoneTwo .  '</p>';
        $htmlContent .= '<p><strong>Date of Birth:</strong> ' . $info->dob . '</p>';
        $htmlContent .= '<p><strong>Business:</strong> ' . $info->business . '</p>';
        $htmlContent .= '<p><strong>Social Date:</strong> ' . $info->socialDate. '</p><br>';

        $dompdf = new Dompdf();

        $dompdf->loadHtml($htmlContent);

        $dompdf->setPaper('A4', 'portrait');

        $dompdf->render();

        return $dompdf->stream('generated_data.pdf');
    }

    public function ViewInfo($id)
    {
        $info = Info::findOrFail($id);
        return view('backend.home.view' ,compact('info'));
    }

    // All Data Print to PDF
    public function allPdf()
    {
        $infos = Info::all();

        $htmlContent = '<h1>All Information</h1><br>';

        foreach ($infos as $info) {
            $htmlContent .= '<p><strong>Name:</strong> ' . $info->firstName . ' ' . $info->lastName . '</p>';
            $htmlContent .= '<p><strong>Phone Number:</strong> ' . $info->phoneNumber . '</p>';
            $htmlContent .= '<p><strong>Zip Code:</strong> ' . $info->zipCode . '</p>';
            $htmlContent .= '<p><strong>Address:</strong> ' . $info->address .  '</p>';
            $htmlContent .= '<p><strong>City:</strong> ' . $info->city .  '</p>';
            $htmlContent .= '<p><strong>Province:</strong> ' . $info->province .  '</p>';
            $htmlContent .= '<p><strong>Secondary Phone Number:</strong> ' . $info->secondaryPhone .  '</p>';
            $htmlContent .= '<p><strong>Secondary Phone Number:</strong> ' . $info->secondaryPhoneTwo .  '</p>';
            $htmlContent .= '<p><strong>Date of Birth:</strong> ' . $info->dob . '</p>';
            $htmlContent .= '<p><strong>Business:</strong> ' . $info->business . '</p>';
            $htmlContent .= '<p><strong>Social Date:</strong> ' . $info->socialDate . '</p><hr>';
        }

        $dompdf = new Dompdf();

        $dompdf->loadHtml($htmlContent);

        $dompdf->setPaper('A4', 'portrait');

        $dompdf->render();

        return $dompdf->stream('generated_data.pdf');
    }

}
