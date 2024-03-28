<?php

namespace App\Http\Controllers;

use Storage;
use App\Models\StudentHomes;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;

class StudentHomesController extends Controller
{
    public function homes(): View
    {
        return view('studenthomes.homes')->with('studenthomes', StudentHomes::all());
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
            'name' => 'required',
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
            'name' => $request->name,
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
            'name' => 'min:5|max:255',
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
            'name' => $request->name,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'zip' => $request->zip,
            'description' => $request->description,
            'image' => $url,
        ]);

        return redirect('/')->with('success', 'Student Home updated!');
    }

    public function destroy(StudentHomes $studenthome)
    {
        $home = StudentHomes::where('id', $studenthome->id);
        User::where('home_id', $studenthome->id)->update(['home_id' => null]);
        $home->delete();

        return redirect('/')->with('success', 'Student Home deleted!');
    }
}
