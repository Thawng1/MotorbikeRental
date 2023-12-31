<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Motorbike;
use App\Models\Color;
use App\Models\Owner;
class MotorbikeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!auth()->check()) {
            return redirect('/login');
        }
            $motorbike = Motorbike::all();
            return view('motorbikes.index', ['motorbikes' => $motorbike]);
      
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!auth()->check()) {
            return redirect('/login');
        }
        $color = Color::all();
        $owner = Owner::all();
        $brand = Brand::all();
        return view('motorbikes.create', ['brands' => $brand, 'colors' => $color, 'owners' =>$owner]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $motorbike = new Motorbike();
        $motorbike->brand_id=$request->brand_id;
        $motorbike->owner_id=$request->owner_id;
        $motorbike->year=$request->year;
        $motorbike->plate=$request->plate;
        $motorbike->save();
        $motorbike->colors()->attach($request->colors);
        return redirect()->route('motorbikes.index');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (!auth()->check()) {
            return redirect('/login');
        }
        $motorbike = Motorbike::find($id);
        return view('motorbikes.show',['motorbikes' => $motorbike]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (!auth()->check()) {
            return redirect('/login');
        }
        $color = Color::all();
        $owner = Owner::all();
        $brand = Brand::all();
        $motorbike = Motorbike::find($id);
        return view('motorbikes.edit',['motorbikes' => $motorbike,'brands' => $brand, 'colors' => $color, 'owners' =>$owner]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $motorbike = Motorbike::find($id);
        $motorbike->brand_id=$request->brand_id;
        $motorbike->owner_id=$request->owner_id;
        $motorbike->year=$request->year;
        $motorbike->plate=$request->plate;
        $motorbike->save();
        $motorbike->colors()->sync($request->colors);
        return redirect()->route('motorbikes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!auth()->check()) {
            return redirect('/login');
        }
            $motorbike = Motorbike::find($id);
        $motorbike->delete();
        return redirect()->route('motorbikes.index');
    }

}
