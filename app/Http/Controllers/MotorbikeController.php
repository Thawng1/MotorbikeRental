<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Motorbike;
class MotorbikeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      
            $motorbike = Motorbike::all();
            return view('motorbikes.index', ['motorbikes' => $motorbike]);
      
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brand = Brand::all();
        return view('motorbikes.create', ['brands' => $brand]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Motorbike::create($request->all());

        return redirect()->route('motorbikes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $motorbike = Motorbike::find($id);
        return view('motorbikes.show',['motorbikes' => $motorbike]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $motorbike = Motorbike::find($id);
        return view('motorbikes.edit',['motorbikes' => $motorbike]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $motorbike = Motorbike::find($id);
        $motorbike->update($request->all());
        return redirect()->route('motorbikes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
            $motorbike = Motorbike::find($id);
        $motorbike->delete();
        return redirect()->route('motorbikes.index');
    }
}
