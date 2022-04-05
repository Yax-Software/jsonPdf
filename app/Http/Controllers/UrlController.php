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
        $pdf = PDF::loadView('invoice', ["src" => $request->src, "src1" => $request->src1, "src2" => $request->src2, "src3" => $request->src3,"colors" => $request->colors]);
        Storage::put('public/pdf/invoice.pdf', $pdf->output());
        $url = Storage::url('public/pdf/invoice.pdf');
        return response()->json(
            ['src' => $hostUrl.$url]);
    }

}
