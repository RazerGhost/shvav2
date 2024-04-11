<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\StudentHomes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $homes = StudentHomes::all();
        $homeTitles = [];
        $users = User::all();
        $employees = User::where('role', 1)->get();
        $students = User::where('role', 2)->get();
        $providers = User::where('role', 3)->get();

        foreach ($homes as $home) {
            $homeTitles[$home->id] = $home->name;
        }

        return view("employee.dashboard", compact("employees", "students", "providers", "homeTitles"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, User $user)
    {
        if ($request->role != 3) {
            $request->validate([
                'first_name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
                'tel_number' => ['required', 'string', 'max:255'],
                'address' => ['required', 'string', 'max:255'],
                'city' => ['required', 'string', 'max:255'],
                'state' => ['required', 'string', 'max:255'],
                'zip' => ['required', 'string', 'max:255'],
            ]);
            $user->create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
                'phone' => $request->tel_number,
                'address' => $request->address,
                'city' => $request->city,
                'state' => $request->state,
                'zip' => $request->zip,
            ]);
        } else {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
                'tel_number' => ['required', 'string', 'max:255'],
                'address' => ['required', 'string', 'max:255'],
                'city' => ['required', 'string', 'max:255'],
                'state' => ['required', 'string', 'max:255'],
                'zip' => ['required', 'string', 'max:255'],
            ]);
            $user->create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
                'phone' => $request->tel_number,
                'address' => $request->address,
                'city' => $request->city,
                'state' => $request->state,
                'zip' => $request->zip,
            ]);
        }

        return redirect('/employee')->with('success', 'User saved!');
    }

    public function showHomes(User $user, StudentHomes $studentHomes)
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

        if ($homes->count() == 0) {
            return redirect('/employee')->with('status', 'no-homes',);
        }

        return view('employee.assignhome', compact('homes', 'providersPerHome', 'user'));
    }

    public function assignHome(Request $request, User $user)
    {
        $user->update([
            'home_id' => $request->home_id,
        ]);
        return redirect('/employee')->with('success', 'Home assigned!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('employee.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        if ($user->role != 3) {
            $request->validate([
                'first_name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
                'tel_number' => ['required', 'string', 'max:255'],
                'address' => ['required', 'string', 'max:255'],
                'city' => ['required', 'string', 'max:255'],
                'state' => ['required', 'string', 'max:255'],
                'zip' => ['required', 'string', 'max:255'],
            ]);
            $user->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
                'phone' => $request->tel_number,
                'address' => $request->address,
                'city' => $request->city,
                'state' => $request->state,
                'zip' => $request->zip,
            ]);
        } else {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
                'tel_number' => ['required', 'string', 'max:255'],
                'address' => ['required', 'string', 'max:255'],
                'city' => ['required', 'string', 'max:255'],
                'state' => ['required', 'string', 'max:255'],
                'zip' => ['required', 'string', 'max:255'],
            ]);
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
                'phone' => $request->tel_number,
                'address' => $request->address,
                'city' => $request->city,
                'state' => $request->state,
                'zip' => $request->zip,
            ]);
        }

        return redirect('/employee')->with('success', 'User saved!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/employee')->with('success', 'User deleted!');
    }
}
