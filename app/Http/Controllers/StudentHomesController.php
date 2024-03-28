<?php

namespace App\Http\Controllers;

use Storage;
use App\Models\StudentHomes;
use Illuminate\View\View;
use Illuminate\Http\Request;

class StudentHomesController extends Controller
{
    public function index(): View
    {
        return view('studenthomes.index')->with('studenthomes', StudentHomes::all());
    }

    public function view(StudentHomes $id): View
    {
        $studenthome = StudentHomes::where('id', $id);

        return view('studenthomes.view')->with('studenthome', $studenthome);
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

        return redirect('/')->with('success', 'Student Home saved!');
    }

    public function edit(StudentHomes $studenthome): View
    {
        return view('studenthomes.edit')->with('studenthome', $studenthome);
    }

    public function update(Request $request, StudentHomes $studenthome)
    {
        $request->validate([
            'address' => 'min:5|max:255',
            'city' => 'min:5|max:255',
            'state' => 'min:5|max:255',
            'zip' => 'min:5|max:255',
            'description' => 'min:5|max:255',
            'image' => '',
        ]);

        $path = $request->file('image')->store('public/images');
        $url = Storage::url($path); // Generate a URL for the stored file

        $studenthome->update([
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'zip' => $request->zip,
            'description' => $request->description,
            'image' => $url,
        ]);

        return redirect('/')->with('success', 'Student Home updated!');
    }
}
