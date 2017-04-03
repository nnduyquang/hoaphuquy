<?php

namespace App\Http\Controllers;

use App\Http\Requests\SanPhamRequest;
use App\SanPham;
use Illuminate\Http\Request;

class SanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $danhmucs = DanhMuc::orderBy('id', 'DESC')->paginate(5);
        return view('backend.admin.sanpham.sanpham', compact('sanphams'))
            ->with('i', ($request->input('page', 1) - 1) * 5
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.sanpham.create', compact('roles'));
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
        $path = preg_replace('/\s+/', ' ', $path);
        $path = str_replace(' ', '-', $path);
        $sanpham->path = $path;
        $sanpham->noidung = $request->input('noidung');
        $file = Input::file('hinhchude');
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
        $sanpham->lienhegia = input('lienhegia');
        $sanpham->danhmuc_id = input('cbbDanhMuc');
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
        $danhmuc = DanhMuc::all(['id', 'display_name']);
        return view('backend.admin.sanpham.edit', compact(['sanpham', 'danhmuc']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sanpham = SanPham::find($id);
        $display_name = $request->input('display_name');
        $sanpham->display_name = $display_name;
        $path = vn_str_co_dau_thanh_khong_dau($display_name);
        $path = preg_replace('/\s+/', ' ', $path);
        $path = str_replace(' ', '-', $path);
        $sanpham->path = $path;
        $sanpham->noidung = $request->input('noidung');
        $file = Input::file('hinhchude');
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
        $sanpham->lienhegia = input('lienhegia');
        $sanpham->danhmuc_id = input('cbbDanhMuc');
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
        SanPham::find($id)->delete();
        return redirect()->route('sanphams.index')
            ->with('success', 'Sản Phẩm deleted successfully');
    }
}
