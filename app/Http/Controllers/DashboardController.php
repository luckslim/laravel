<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produto;

class DashboardController extends Controller
{
    public function index(){
        $produtos=Produto::paginate(3);
        return view('admin.dashboard', compact('produtos'));
    }
}
