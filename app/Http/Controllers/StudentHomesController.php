<?php

namespace App\Http\Controllers;

use Storage;
use App\Models\StudentHomes;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;

class StudentHomesController extends Controller
{
    public function homes(StudentHomes $studentHomes): View
    {
        $homes = $studentHomes->all();
        $providersPerHome = [];

        // Iterate over each student home to fetch its associated provider
        foreach ($homes as $home) {
            $provider = User::find($home->provider_id);
            if ($provider) {
                // Store the provider in the array using the home's ID as the key
                $providersPerHome[$home->id] = $provider->name; // Assuming provider has a 'name' attribute
            }
        }

        return view('studenthomes.homes', compact('homes', 'providersPerHome'));
    }

    public function home($id): View
    {
        $home = StudentHomes::find($id);
        $provider = User::where('id', $home->provider_id)->first();
        return view('studenthomes.home', compact('home', 'provider'));
    }

    public function create()
    {
        $providers = User::where('role', '3')->get();
        $providerlist = [];
        foreach ($providers as $provider) {
            $providerlist[] = [
                'id' => $provider->id,
                'name' => $provider->name,
            ];
        }

        if (count($providerlist) == 0) {
            return redirect('/')->with('status', 'no-providers');
        }

        return view('studenthomes.create')->with('providers', $providerlist);
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
            'provider_id' => 'required|integer',
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
            'provider_id' => $request->provider_id,
        ]);

        return redirect('/')->with('success', 'Student Home saved!');
    }

    public function edit(StudentHomes $studenthome): View
    {
        $providers = User::where('role', '3')->get();
        $providerlist = [];
        foreach ($providers as $provider) {
            $providerlist[] = [
                'id' => $provider->id,
                'name' => $provider->name,
            ];
        }

        if (count($providerlist) == 0) {
            return redirect('/')->with('status', 'no-providers');
        }

        return view('studenthomes.edit', compact('studenthome', 'providerlist'));
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
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg',
            'provider_id' => 'required|integer',
        ]);

        if ($request->file('image') == null) {
            $url = $studenthome->image;
        } else {
            $path = $request->file('image')->store('public/images');
            $url = Storage::url($path); // Generate a URL for the stored file
        }

        $studenthome->update([
            'name' => $request->name,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'zip' => $request->zip,
            'description' => $request->description,
            'image' => $url,
            'provider_id' => $request->provider_id,
        ]);

        return redirect('/')->with('success', 'Student Home updated!');
    }

    public function destroy(StudentHomes $studenthome, User $user)
    {
        $home = $studenthome->where('id', $studenthome->id);
        $user->where('home_id', $studenthome->id)->update(['home_id' => null]);
        $home->delete();

        return redirect('/')->with('success', 'Student Home deleted!');
    }
}
