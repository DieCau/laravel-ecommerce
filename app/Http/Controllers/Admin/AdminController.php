<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Crear el metodo 'index'
    public function index()
    {
        // Retornar la vista 'admin/index.blade.php'
        return view('admin.index');
    }
}
