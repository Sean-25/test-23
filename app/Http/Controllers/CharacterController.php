<?php

namespace App\Http\Controllers;

use App\Models\Characters;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class CharacterController extends Controller
{
    public function index()
    {
        return view('welcome', [
            'characters' => Characters::search(),
        ]);
    }
}
