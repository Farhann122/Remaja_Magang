<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        // if (auth()->user()->role !== 'admin') {
        //     abort(403, 'Unauthorized action.');
        // }

        return view('admin.dashboard.index');
    }
}

