<?php

namespace App\Http\Controllers;

use App\Http\Requests\SliderRequest;
use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sliders = Slider::orderBy('id', 'DESC')->paginate(5);
        return view('backend.admin.slider.slider', compact('sliders'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sliders = Slider::count();
        if ($sliders == 5)
            return redirect()->route('sliders.index')
                ->with('error', 'Tối Đa Chỉ Được 5 Slide');
        else
            return view('backend.admin.slider.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(SliderRequest $request)
    {
        $slider = new Slider();
        $slider->chuthich = $request->input('chuthich');
        if (strlen(trim($request->input('order'))) == 0)
            $slider->order = 1;
        else
            $slider->order = $request->input('order');
        $file = Input::file('anhslider');
        $directory = "images/slider/";
        $filename = get_filename_from_input($file);
        $file->move($directory, $filename);
        $slider->anhslider = $filename;
        $slider->display_name = $filename;
        $slider->user_id = Auth::user()->id;
        $slider->save();
        return redirect()->route('sliders.index')
            ->with('success', 'Slider store successfully');

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
        $slider = Slider::find($id);
        return view('backend.admin.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(SliderRequest $request, $id)
    {
        $slider = Slider::find($id);
        $slider->chuthich = $request->input('chuthich');
        if (strlen(trim($request->input('order'))) == 0)
            $slider->order = 1;
        else
            $slider->order = $request->input('order');
        $file = Input::file('anhslider');
        if ($file) {
            File::delete('images/slider/' . $slider->anhslider);
            $directory = "images/slider/";
            $filename = get_filename_from_input($file);
            $file->move($directory, $filename);
            $slider->anhslider = $filename;
            $slider->display_name = $filename;
        }
        $slider->user_id = Auth::user()->id;
        $slider->save();
        return redirect()->route('sliders.index')
            ->with('success', 'Slider store successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::find($id);
        File::delete('images/slider/' . $slider->anhslider);
        $slider->delete();
        return redirect()->route('sliders.index')
            ->with('success', 'Slider deleted successfully');
    }
}
