<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Constant;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $sliders = Slider::paginate(Constant::COUNT_PER_PAGE);
        return view('admin.sliders.index')->with('sliders', $sliders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'description1' => 'required',
            'description2' => 'required',
            'image' => 'image | mimes:jpeg,png,jpg,svg | nullable | max:2048'
        ]);

        $image_url = $this->uploadImage($request);
        $test = 1;
        $slider = Slider::create([
            'description1' => $request->description1,
            'description2' => $request->description2,
            'status' => $test,
            'image_url' => $image_url
        ]);

        session()->flash('success', 'Saved');

        return redirect()->route('sliders.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        return view('admin.sliders.edit')->with('slider', $slider);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'description1' => 'required',
            'description2' => 'required',
            'image' => 'image | mimes:jpeg,png,jpg,svg | nullable | max:2048'
        ]);

        $slider = Slider::findOrFail($id);
        $slider->description1 =  $request->description1;
        $slider->description2 =  $request->description2;

        if ($request->hasFile('image')) {
            $oldImagePath = $slider->image_url;
            $this->removeImage($oldImagePath);
            $image_url = $this->uploadImage($request);
            $slider->image_url =  $image_url;
        }
        $slider->save();

        session()->flash('success', 'Updated');

        return redirect()->route('sliders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);

        $imagePath = $slider->image_url;
        if ($imagePath != null) {
            $this->removeImage($imagePath);
        }

        $slider->delete();

        session()->flash('success', 'Deleted');

        return redirect()->back();
    }

    public function uploadImage($request)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $destinationPath = 'images/sliders';
            return $file->storeAs($destinationPath, $fileName, 'public');
        }
        return null;
    }

    public function removeImage($path)
    {
        if (file_exists(storage_path('app/public/' . $path))) {
            unlink(storage_path('app/public/' . $path));
        }
    }

    public function activateSlider($id)
    {
        $slider = Slider::findOrFail($id);
        $slider->status = 1;
        $slider->save();

        session()->flash('success', 'Updated');

        return redirect()->back();
    }

    public function inactivateSlider($id)
    {
        $slider = Slider::findOrFail($id);
        $slider->status = 0;
        $slider->save();

        session()->flash('success', 'Updated');

        return redirect()->back();
    }
}
