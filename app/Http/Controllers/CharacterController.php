<?php

namespace App\Http\Controllers;

use App\Models\Characters;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class CharacterController extends Controller
{
    public function index()
    {
        $characters = Characters::search();

        if (isset($characters['results']))
        {
            $pagination = new LengthAwarePaginator($characters['results'], $characters['info']['count'], '20', LengthAwarePaginator::resolveCurrentPage(), [
                'path' => LengthAwarePaginator::resolveCurrentPath()
            ]);

            $pagination->withQueryString();
        }

        return view('welcome', [
            'characters' => $characters,
            'pagination' => $pagination ?? NULL
        ]);
    }
}
