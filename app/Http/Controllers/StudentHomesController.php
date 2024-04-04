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

    public function home($id): View
    {
        $home = StudentHomes::find($id);
        //dd($home);
        return view('studenthomes.home')->with('studenthome', $home);
    }

    public function create()
    {
        return view('studenthomes.create');
    }

    public function store(Request $request, StudentHomes $studenthome)
    {
        $request->validate([
            'name' => 'required|min:5|max:255',
            'address' => 'required|min:5|max:255',
            'city' => 'required|min:5|max:255',
            'state' => 'required|min:5|max:255',
            'zip' => 'required|min:5|max:255',
            'description' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
        ]);

        $path = $request->file('image')->store('public/images');
        $url = Storage::url($path); // Generate a URL for the stored file

        $studenthome->create([
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
            'name' => 'required|min:5|max:255',
            'address' => 'required|min:5|max:255',
            'city' => 'required|min:5|max:255',
            'state' => 'required|min:5|max:255',
            'zip' => 'required|min:5|max:255',
            'description' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
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
