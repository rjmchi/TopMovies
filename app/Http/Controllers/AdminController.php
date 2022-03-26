<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class AdminController extends Controller
{
    public function index() {
        $data['categories']= Category::with(['movies'=>function ($query){
            $query->orderBy('rank');
        }])->get();
        return view('dashboard')->with($data);
    }
}
