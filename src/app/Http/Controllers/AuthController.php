<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WeightTarget;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'target_weight' => 'required|numeric|min:1',
        ]);

        WeightTarget::create([
            'user_id' => Auth::id(),
            'target_weight' => $request->target_weight,
        ]);

        return redirect('/start');
    }
}
