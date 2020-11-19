<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WorkOrderController extends Controller
{
    public function index()
    {
        return view('workorder.index');
    }

    public function create()
    {
        return view('workorder.create');
    }
}
