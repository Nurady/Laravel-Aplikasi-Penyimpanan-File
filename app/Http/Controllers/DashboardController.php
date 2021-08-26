<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $total_files = File::with('user')
                        ->where('user_id', Auth::user()->id)
                        ->get();
        $pdf_files = File::with('user')
                        ->where('user_id', Auth::user()->id)
                        ->where('file', 'LIKE','%'.'pdf'.'%')
                        ->get();
        $jpg_files = File::with('user')
                        ->where('user_id', Auth::user()->id)
                        ->where('file', 'LIKE','%'.'jpeg'.'%')
                        ->orWhere('file', 'LIKE','%'.'jpg'.'%')
                        ->orWhere('file', 'LIKE','%'.'JPG'.'%')
                        ->orWhere('file', 'LIKE','%'.'JPEG'.'%')
                        ->get();

        $total = $total_files->count();
        $total_pdf = $pdf_files->count();
        $total_jpg = $jpg_files->count();
        // dd($total_jpg);

        return view('pages.backend.dashboard', compact(
            'total',
            'total_pdf', 
            'total_jpg'
        ));
    }
}
