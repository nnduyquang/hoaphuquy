<?php

namespace App\Http\Controllers;

use App\CauHinh;
use App\DanhMuc;
use App\Http\Requests\SanPhamRequest;
use App\SanPham;
use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;

class SanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
//        $sanphams = SanPham::orderBy('danhmuc_id', 'DESC')->paginate(5);
//        $sanphams = SanPham::orderBy('danhmuc_id', 'DESC')->get();
        $sanphams = SanPham::select('sanphams.display_name','sanphams.id', 'sanphams.path', 'danhmucs.display_name as tendanhmuc', 'danhmucs.path as pathdanhmuc', 'sanphams.anhsanpham', 'sanphams.price', 'sanphams.lienhegia')->join('danhmucs', 'sanphams.danhmuc_id', '=', 'danhmucs.id')->orderby('sanphams.danhmuc_id')->get();
        return view('backend.admin.sanpham.sanpham', compact('sanphams'));
//            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $danhmucs = DanhMuc::all()->sortBy('id');
        $cauhinhs=CauHinh::select('noidung')->where('id',3)->first();
        return view('backend.admin.sanpham.create', compact(['roles', 'danhmucs','cauhinhs']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(SanPhamRequest $request)
    {
        $sanpham = new SanPham();
        $display_name = $request->input('display_name');
        $sanpham->display_name = $display_name;
        $path = vn_str_co_dau_thanh_khong_dau($display_name);
        $path = preg_replace('/\W/', ' ', $path);
        $path = preg_replace('/\s+/', ' ', $path);
        $path = str_replace(' ', '-', trim($path));
        $sanpham->path = $path;
        $sanpham->noidung = $request->input('noidung');
        $file = Input::file('anhsanpham');
        $directory = "images/sanpham/";/////////////////////Be carefull không có public
        $ran = round(microtime(true) * 1000);
        $filename = $file->getClientOriginalName();
        $filename = str_replace('.' . $file->getClientOriginalExtension(), '', $filename);
        $filename = str_replace(' ', '-', $filename);
        $filename = preg_replace('/[^A-Za-z0-9\-]/', '', $filename);
        $filename = preg_replace('/-+/', '', $filename);
        if (strlen($filename) > 15) {
            $filename = substr($filename, 0, 15);
        }
        $filename = $filename . '_' . $ran . '.' . $file->getClientOriginalExtension();
        $file->move($directory, $filename);
        $sanpham->anhsanpham = $filename;
        if ($request->has('lienhegia')) {
            $sanpham->lienhegia = $request->input('lienhegia');
            $sanpham->price = '';
        } else {
            $sanpham->lienhegia = 0;
            $sanpham->price = $request->input('price');
        }
        $sanpham->danhmuc_id = $request->input('cbbDanhMuc');
        $sanpham->user_id = Auth::user()->id;
        $sanpham->save();
        return redirect()->route('sanphams.index')
            ->with('success', 'Sản Phẩm store successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sanpham = SanPham::find($id);
        $danhmucs = DanhMuc::all()->sortBy('id');
        return view('backend.admin.sanpham.edit', compact(['sanpham', 'danhmucs']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(SanPhamRequest $request, $id)
    {
        $sanpham = SanPham::find($id);
        $display_name = $request->input('display_name');
        $sanpham->display_name = $display_name;
        $path = vn_str_co_dau_thanh_khong_dau($display_name);
        $path = preg_replace('/\W/', ' ', $path);
        $path = preg_replace('/\s+/', ' ', $path);
        $path = str_replace(' ', '-', trim($path));
        $sanpham->path = $path;
        $sanpham->noidung = $request->input('noidung');
        $file = Input::file('anhsanpham');
        if ($file) {
            File::delete('images/sanpham/' . $sanpham->anhsanpham);
            $directory = "images/sanpham/";/////////////////////Be carefull không có public
            $ran = round(microtime(true) * 1000);
            $filename = $file->getClientOriginalName();
            $filename = str_replace('.' . $file->getClientOriginalExtension(), '', $filename);
            $filename = str_replace(' ', '-', $filename);
            $filename = preg_replace('/[^A-Za-z0-9\-]/', '', $filename);
            $filename = preg_replace('/-+/', '', $filename);
            if (strlen($filename) > 15) {
                $filename = substr($filename, 0, 15);
            }
            $filename = $filename . '_' . $ran . '.' . $file->getClientOriginalExtension();
            $file->move($directory, $filename);
            $sanpham->anhsanpham = $filename;
        }
        if ($request->has('lienhegia')) {
            $sanpham->lienhegia = $request->input('lienhegia');
            $sanpham->price = '';
        } else {
            $sanpham->lienhegia = 0;
            $sanpham->price = $request->input('price');
        }
        $sanpham->danhmuc_id = $request->input('cbbDanhMuc');
        $sanpham->user_id = Auth::user()->id;
        $sanpham->save();
        return redirect()->route('sanphams.index')
            ->with('success', 'Sản Phẩm store successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sanpham = SanPham::find($id);
        File::delete('images/sanpham/' . $sanpham->anhsanpham);
        $sanpham->delete();
        return redirect()->route('sanphams.index')
            ->with('success', 'Sản Phẩm deleted successfully');
    }

    public function getAllSanPhamByDanhMuc($path)
    {
        $sanphams = SanPham::select('sanphams.display_name', 'sanphams.path', 'danhmucs.display_name as tendanhmuc', 'danhmucs.path as pathdanhmuc', 'sanphams.anhsanpham')->join('danhmucs', 'sanphams.danhmuc_id', '=', 'danhmucs.id')
            ->where('danhmucs.path', 'like', $path)->get();
        return view('frontend.sanpham.danhsachsanpham', compact('sanphams'));
    }

    public function getSanPhamByPathSanPham($path1, $path2)
    {
        $sanpham = SanPham::select('sanphams.display_name', 'sanphams.id', 'sanphams.path', 'sanphams.lienhegia', 'sanphams.noidung', 'sanphams.price', 'danhmucs.path as pathdanhmuc', 'danhmucs.display_name as tendanhmuc', 'sanphams.anhsanpham')->join('danhmucs', 'sanphams.danhmuc_id', '=', 'danhmucs.id')->where('sanphams.path', $path2)->first();
//       dd($sanpham);
        $sanphamlienquans = Sanpham::select('sanphams.id', 'sanphams.display_name', 'sanphams.path', 'sanphams.lienhegia', 'sanphams.noidung', 'sanphams.price', 'danhmucs.path as pathdanhmuc', 'danhmucs.display_name as tendanhmuc', 'sanphams.anhsanpham')->join('danhmucs', 'sanphams.danhmuc_id', '=', 'danhmucs.id')->where('danhmucs.path',$path1)->where('sanphams.id', '<>', $sanpham->id)->get();
//        dd($sanphamlienquans);
        return view('frontend.sanpham.chitietsanpham', compact(['sanpham', 'sanphamlienquans']));
    }

    public function getSanPhamTrangChu()
    {
        $sanphammois = SanPham::select('sanphams.display_name', 'sanphams.path', 'danhmucs.path as pathdanhmuc', 'sanphams.anhsanpham')->join('danhmucs', 'sanphams.danhmuc_id', '=', 'danhmucs.id')->whereIn('sanphams.id',[1,9,59,34,74,73,36,52,43,50,42,55])->get();
        $danhmucs = DanhMuc::orderBy('id', 'DESC')->whereIn('id',[6,9,15])->get();
        $sanphamtheodanhmucs = [];
        foreach ($danhmucs as $key => $danhmuc) {
            $sanphams = SanPham::select('sanphams.display_name', 'sanphams.path', 'danhmucs.path as pathdanhmuc', 'sanphams.anhsanpham')->join('danhmucs', 'sanphams.danhmuc_id', '=', 'danhmucs.id')
                ->where('danhmucs.path', 'like', $danhmuc->path)->get();
            $sanphamtheodanhmucs[] = ['tendanhmuc' => $danhmuc->display_name, 'listsanpham' => $sanphams];
        }
        $slides = Slider::all()->sortBy('order');
        return view('frontend.trangchu.index', compact(['sanphammois', 'sanphamtheodanhmucs', 'slides']));
    }
}
