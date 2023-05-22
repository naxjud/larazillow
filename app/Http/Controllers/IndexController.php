<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;

class IndexController extends Controller
{
    public function index()
    {
        return redirect()->route('listing.index');
    }

    public function show()
    {
        return inertia('Index/Show');
    }
}
