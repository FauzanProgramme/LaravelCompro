<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Services; // Adjust the model name if needed
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {    
        $services = Services::all(); // Fetch all services
        return view('backend.services.index', compact('services')); // Pass data to the view
    }

    public function create()
    {
        return view('backend.services.TambahService'); // Render the form view
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Create a new service
        Services::create($validatedData);

        // Redirect to the index page with success message
        return redirect()->route('backend.services.index')->with('success', 'Service added successfully!');
    }
}
