<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\Storage;

class UrlController extends Controller
{
    public function jsonData(Request $request)
    {
        $hostUrl = $request->getSchemeAndHttpHost();
        $pdf = PDF::loadView('invoice', ["src" => $request->src, "colors" => $request->colors]);
        Storage::put('public/pdf/invoice.pdf', $pdf->output());

        $url = Storage::url('public/pdf/invoice.pdf');
        return response()->json(
            ['src' => $hostUrl.$url ]);
    }

}
