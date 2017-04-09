<?php

namespace App\Http\Controllers;

use App\Http\Requests\TrangRequest;
use App\Trang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class TrangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $trangs = Trang::orderBy('id', 'DESC')->paginate(5);
        return view('backend.admin.trang.trang', compact('trangs'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.trang.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(TrangRequest $request)
    {
        $trang = new Trang();
        $trang->display_name = $request->input('display_name');
        $trang->noidung = $request->input('noidung');
        $path = trim($request->input('display_name'));
        $path = strtolower(vn_str_co_dau_thanh_khong_dau($path));
        $path = str_replace(' ', '-', $path);
        $trang->path = $path;
        $trang->user_id = Auth::user()->id;
        $trang->save();
        return redirect()->route('trangs.index')
            ->with('success', 'Trang store successfully');
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
        $trang = Trang::find($id);
        return view('backend.admin.trang.edit', compact('trang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(TrangRequest $request, $id)
    {
        $trang = Trang::find($id);
        $trang->display_name = $request->input('display_name');
        $trang->noidung = $request->input('noidung');
        $path = trim($request->input('display_name'));
        $path = strtolower(vn_str_co_dau_thanh_khong_dau($path));
        $path = str_replace(' ', '-', $path);
        $trang->path = $path;
        $trang->user_id = Auth::user()->id;
        $trang->save();
        return redirect()->route('trangs.index')
            ->with('success', 'Trang Upadte successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $trang = Trang::find($id);
        $trang->delete();
        return redirect()->route('trangs.index')
            ->with('success', 'Trang deleted successfully');
    }
}
