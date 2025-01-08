<?php

namespace App\Http\Controllers;

use App\Models\Ukm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class UkmController extends Controller
{
    /**
     * Display the list of UKMs.
     */
    public function index()
    {
        $ukms = UKM::all(); 
        return view('admin.ukms.index', compact('ukms'));
    }

    /**
     * Show the form for creating a new UKM.
     */
    public function create()
    {
        return view('admin.ukms.create');
    }

    /**
     * Store a newly created UKM in the database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'mission' => 'nullable|string', // Validasi untuk mission
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'managed_users' => 'nullable|array',
            'managed_users.*' => 'exists:users,id', // Ensure each user ID is valid
        ]);

        // Handle logo file upload if present
        $logoPath = $request->hasFile('logo') 
            ? $request->file('logo')->store('ukm_logos', 'public') 
            : null;

        // Create the new UKM and save it to the database
        $ukm = Ukm::create([
            'name' => $request->name,
            'description' => $request->description,
            'mission' => $request->mission, // Menyimpan mission
            'logo_url' => $logoPath,
        ]);

        // Attach the selected users as managers
        if ($request->has('managed_users')) {
            $ukm->managers()->sync($request->managed_users); // Sync managed users
        }

        return redirect()->route('admin.ukms.index')->with('success', 'UKM created successfully.');
    }

    /**
     * Show the form for editing the specified UKM.
     */
    public function edit(Ukm $ukm)
    {
        // Get all users with the role 'user'
        $users = User::where('role', 'user')->get();
        
        return view('admin.ukms.edit', compact('ukm', 'users'));
    }

    /**
     * Update the specified UKM in the database.
     */
    public function update(Request $request, $id)
    {
        $ukm = Ukm::findOrFail($id);  // Use findOrFail to automatically return 404 if not found

        // Validate the input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'mission' => 'nullable|string', // Validasi untuk mission
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'managed_users' => 'nullable|array',
            'managed_users.*' => 'exists:users,id', // Ensure each selected user exists
        ]);

        // Update other fields
        $ukm->name = $validatedData['name'];
        $ukm->description = $validatedData['description'];
        $ukm->mission = $validatedData['mission']; // Memperbarui mission

        // Handle file upload if a new logo is uploaded
        if ($request->hasFile('logo')) {
            // Delete old logo if exists
            if ($ukm->logo_url && Storage::exists('public/' . $ukm->logo_url)) {
                Storage::delete('public/' . $ukm->logo_url);
            }
            // Store the new logo
            $path = $request->file('logo')->store('ukm_logos', 'public');
            $ukm->logo_url = $path;
        }

        // Sync managed users with the pivot table
        $ukm->managers()->sync($request->input('managed_users', [])); // Use empty array if no users are selected

        // Save the changes
        $ukm->save();

        return redirect()->route('admin.ukms.index')->with('success', 'UKM updated successfully.');
    }

    /**
     * Remove the specified UKM from the database.
     */
    public function destroy(Ukm $ukm)
    {
        // Delete the logo file if it exists
        if ($ukm->logo_url && Storage::exists('public/' . $ukm->logo_url)) {
            Storage::delete('public/' . $ukm->logo_url);
        }

        // Delete the UKM record
        $ukm->delete();

        return redirect()->route('admin.ukms.index')->with('success', 'UKM deleted successfully.');
    }

    /**
     * Show the list of all UKMs.
     */
    public function showUkmPage()
    {
        $ukms = Ukm::all(); // Retrieve all UKMs
        return view('ukm', compact('ukms')); // Passing the data to the 'ukm' view
    }
    
    /**
     * Show the details of a specific UKM.
     */
    public function show($id)
    {
        $ukm = Ukm::findOrFail($id); // Use findOrFail for automatic 404

        return view('ukm.show', compact('ukm'));
    }
    
    public function editUserUkm($ukmId)
    {
        // Get the UKM object based on ID
        $ukm = Ukm::findOrFail($ukmId);
    
        // Get users that can be managers (if needed)
        $users = User::where('role', 'user')->get(); 
    
        // Pass UKM and users to the edit view
        return view('user.ukms.edit', compact('ukm', 'users'));
    }
}
