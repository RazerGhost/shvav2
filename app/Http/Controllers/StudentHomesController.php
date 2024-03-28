<?php

namespace App\Http\Controllers;

use Storage;
use App\Models\StudentHomes;
use Illuminate\Http\Request;

class StudentHomesController extends Controller
{
    public function index()
    {
        return view('studenthomes.index')->with('studenthomes', StudentHomes::all());
    }

    public function create()
    {
        return view('studenthomes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
        ]);

        $path = $request->file('image')->store('public/images');
        $url = Storage::url($path); // Generate a URL for the stored file

        StudentHomes::create([
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'zip' => $request->zip,
            'description' => $request->description,
            'image' => $url,
        ]);

        return redirect('/studenthomes')->with('success', 'Student Home saved!');
    }

    public function edit(StudentHomes $studenthome)
    {
        return view('studenthomes.edit')->with('studenthome', $studenthome);
    }

    public function update(Request $request, StudentHomes $studenthome)
    {
        $request->validate([
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/assets/images');
            $image->move($destinationPath, $name);
        }

        $studenthome->update([
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'zip' => $request->zip,
            'description' => $request->description,
            'image' => $name,
        ]);

        return redirect('/studenthomes')->with('success', 'Student Home updated!');
    }
}
