<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Ukm;
use App\Models\User;
use App\Models\Kegiatan; // Assuming you have a Kegiatan model

class DashboardController extends Controller
{
    /**
     * Display the dashboard for the authenticated user.
     */
    public function index()
    {
        // Check user role to determine which dashboard to show
        $role = Auth::user()->role;

        if ($role === 'admin') {
            return $this->adminDashboard();
        } elseif ($role === 'user') {
            return $this->userDashboard();
        }

        abort(403, 'Unauthorized access.');
    }

    /**
     * Display the admin dashboard.
     */
    private function adminDashboard()
    {
        $totalUsers = User::count();
        $totalUkms = Ukm::count();
        $totalKegiatan = Kegiatan::count(); // Assuming a Kegiatan model exists

        // Return the admin dashboard view with the necessary data
        return view('admin.dashboard', compact('totalUsers', 'totalUkms', 'totalKegiatan'));
    }

    /**
     * Display the user dashboard.
     */
    private function userDashboard()
    {
        $user = Auth::user();
        $name = $user->name; // Get the logged-in user's name
        $email = $user->email; // Get the logged-in user's email

        // Get the UKMs managed by the current user
        $managedUkms = $user->ukms;

        // Count the total Kegiatan related to the user (if there is a relationship)
        $totalKegiatan= Kegiatan::count();

        // Return the user dashboard view with the necessary data
        return view('user.dashboard', compact('name', 'email', 'managedUkms', 'totalKegiatan'));
    }
}
