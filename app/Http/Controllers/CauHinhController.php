<?php

namespace App\Http\Controllers;

use App\CauHinh;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;

class CauHinhController extends Controller
{
    public function getAllCauHinh()
    {
        $cauhinhs = CauHinh::all();
        return view('backend.admin.cauhinh.cauhinh', compact('cauhinhs'));
    }

    public function saveAllCauHinh(Request $request)
    {
        $fileLogo = Input::file('hinhLogo');
        $fileHinhMainTrai = Input::file('hinhMainTrai');
        $noidungLienHe = $request->input('noidungLienHe');


        //SaveLogo
        if ($fileLogo) {
            $filenameLogo = get_filename_from_input($fileLogo);
            $cauHinhLogo = CauHinh::where('order', '=', '1')->first();
            File::delete('images/logo/' . $cauHinhLogo->hinh);
            $cauHinhLogo->hinh = $filenameLogo;
            $directoryLogo = "images/logo/";
            $fileLogo->move($directoryLogo, $filenameLogo);
            $cauHinhLogo->save();
        }

        //Save MainTrai
        if ($fileHinhMainTrai) {
            $filenameHinhMainTrai = get_filename_from_input($fileHinhMainTrai);
            $cauHinhMainTrai = CauHinh::where('order', '=', '2')->first();
            File::delete('images/temp/' . $cauHinhMainTrai->hinh);
            $cauHinhMainTrai->hinh = $filenameHinhMainTrai;
            $directoryMainTrai = "images/temp/";
            $fileHinhMainTrai->move($directoryMainTrai, $filenameHinhMainTrai);
            $cauHinhMainTrai->save();
        }

        $cauHinhLienHe = CauHinh::where('order', '=', '3')->first();
        $cauHinhLienHe->noidung = $noidungLienHe;
        $cauHinhLienHe->save();

        return redirect()->route('cauhinhs.index')
            ->with('success', 'Cấu Hình store successfully');
    }
}
