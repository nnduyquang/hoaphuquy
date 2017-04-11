<?php

namespace App\Http\Controllers;

use App\DanhMuc;
use App\Http\Requests\DanhMucRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

class DanhMucController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $danhmucs = DanhMuc::orderBy('id', 'DESC')->paginate(5);
        return view('backend.admin.danhmuc.danhmuc', compact('danhmucs'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.danhmuc.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(DanhMucRequest $request)
    {
        $danhmuc = new DanhMuc();
        $display_name = $request->input('display_name');
        $danhmuc->display_name = $display_name;
        $path = vn_str_co_dau_thanh_khong_dau($display_name);
        $path = preg_replace('/\W/', ' ', $path);
        $path = preg_replace('/\s+/', ' ', $path);
        $path = str_replace(' ', '-', $path);
        $danhmuc->path = $path;
        $danhmuc->user_id = Auth::user()->id;
        $danhmuc->save();
        return redirect()->route('danhmucs.index')
            ->with('success', 'Danh Mục store successfully');

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
        $danhmuc = DanhMuc::find($id);
        return view('backend.admin.danhmuc.edit', compact('danhmuc'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(DanhMucRequest $request, $id)
    {
        $danhmuc = DanhMuc::find($id);
        $display_name = $request->input('display_name');
        $danhmuc->display_name = $display_name;
        $path = vn_str_co_dau_thanh_khong_dau($display_name);
        $path = preg_replace('/\W/', ' ', $path);
        $path = preg_replace('/\s+/', ' ', $path);
        $path = str_replace(' ', '-', $path);
        $danhmuc->path = $path;
        $danhmuc->user_id = Auth::user()->id;
        $danhmuc->save();
        return redirect()->route('danhmucs.index')
            ->with('success', 'Danh Mục update successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DanhMuc::find($id)->delete();
        return redirect()->route('danhmucs.index')
            ->with('success', 'Danh Mục deleted successfully');
    }

    public function checkIfExistValue($value)
    {
        if (DanhMuc::where('path', '=', $value)->exists()) {
            return 1 == 1;
        } else {
            return 0 == 1;
        }
    }
}
