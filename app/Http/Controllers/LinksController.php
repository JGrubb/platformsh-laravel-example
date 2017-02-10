<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LinksController extends Controller
{

    public function __construct(Request $request)
    {
        $this->middleware('auth', [
            'except' => ['index']
        ]);
    }

    public function index() {
        return view('links/index');
    }

    public function create() {
        return 'foo';
    }

    public function store(Request $request) {
        dd($request);
    }

    public function delete($id) {
        dd($id);
    }
}
