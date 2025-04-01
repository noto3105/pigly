<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\WeightLog;
use App\Models\WeightTarget;
use App\Http\Requests\GoalRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\StartRequest;
use App\Http\Requests\UpdateRequest;
use App\Http\Requests\WeightRegisterRequest;

class WeightController extends Controller
{
    public function index()
    {
        $targetWeight = WeightTarget::latest()->value('target_weight');
        $latestWeight = WeightLog::latest()->value('weight');
        $weightLogs = WeightLog::where('user_id', auth()->id())
        ->orderBy('date', 'desc')
        ->Paginate(8);
        return view('weight_logs', compact('weightLogs', 'targetWeight', 'latestWeight'));
    }

    public function show()
    {
        return view('auth.start');
    }

    public function storeStep2(StartRequest $request)
    {
        $userId = auth()->id();

        if (!$userId) {
            abort(403, 'ユーザーIDが見つかりません');
        }

         WeightLog::create([
            'user_id' => $userId,
            'date' => now()->format('Y/m/d'),
            'weight' => $request->weight,
            'calories' => 0,
            'exercise_time' => '00:00',
            'exercise_content' => '',
        ]);

        WeightTarget::create([
            'user_id' => $userId,
            'target_weight' => $request->target_weight,
        ]);

        session()->forget('just_registered_user_id');

        return redirect('/weight_logs');
    }

    public function search(Request $request)
    {
        $targetWeight = WeightTarget::latest()->value('target_weight');

        $latestWeight = WeightLog::orderBy('date', 'desc')->first()->weight ?? 0;

        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $weightLogs = WeightLog::dateRange($startDate, $endDate)
        ->orderBy('date', 'desc')
        ->paginate(8);

        return view('weight_logs', compact('weightLogs', 'targetWeight', 'latestWeight'));
    }

    public function store(WeightRegisterRequest $request)
    {
        \Log::debug('User ID: ' . auth()->id());

        WeightLog::create([
            'user_id' => auth()->id(),
            'date' => $request->date,
            'weight' => $request->weight,
            'calories' => $request->calories,
            'exercise_time' => $request->exercise_time,
            'exercise_content' => $request->exercise_content,
        ]);

        return redirect('/weight_logs');
    }

    public function edit($id)
    {
        $weightLog = WeightLog::findOrFail($id);
        return view('update', compact('weightLog'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $weightLog = WeightLog::findOrFail($id);
        $weightLog->update($request->all());

        return redirect('/weight_logs');
    }

    public function destroy($id)
    {
        $log = WeightLog::findOrFail($id);
        $log->delete();

        return redirect('/weight_logs');
    }

    public function showGoalSetting()
    {
        $targetWeight = WeightTarget::latest()->value('target_weight');
        return view('goal', compact('targetWeight'));
    }

    public function updateGoalSetting(GoalRequest $request)
    {
        WeightTarget::create([
            'user_id' => auth()->id(),
            'target_weight' => $request->target_weight,
        ]);

        return redirect('/weight_logs');
    }

}
 