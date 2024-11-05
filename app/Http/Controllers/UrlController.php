<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class UrlController extends Controller
{
    public function jsonData(Request $request)
    {
        $hostUrl = $request->getSchemeAndHttpHost();
        $flag = true;
        if (@getimagesize($request->src1 )|| @getimagesize($request->src2 )|| @getimagesize($request->src3)) $flag = false;

        $pdf = PDF::loadView('invoice', ["src" => $request->src, "src1" => $request->src1, "src2" => $request->src2, "src3" => $request->src3,"colors" => $request->colors, "textPdf" => $request->textPdf, 'flag' => $flag]);
        $random = Str::random(12);
        $random = 'lynka-visualisation-'.$random;
        Storage::put('public/pdf/'.$random.'.pdf', $pdf->output());
        if($_SERVER["HTTP_HOST"] == "127.0.0.1:8001")
        {
            $url = Storage::url('public/pdf/' . $random . '.pdf');
        }else
        {
            $url = ('/jsonPdf/public/storage/pdf/'.$random.'.pdf');
        }
        return response()->json(
            ['src' => $hostUrl.$url]);
    }

}
