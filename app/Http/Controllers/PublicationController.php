<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publication;

class PublicationController extends Controller
{
    public function index()
    {
        $publications = Publication::all();
        return view('publications.index', compact('publications'));
    }

    public function show($id)
    {
        $publications = Publication::all()->find($id);
        return view('publications.details', ['publication' => Publication::findOrFail($id)]);
        //return view('publications.details', compact('publications'));
    }
}
