@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/weight_logs.css') }}">
@endsection

@section('content')
<div class="logs-content">
    <table class="table">
        <tr class="heading">
            <th>目標体重</th>
            <th>目標まで</th>
            <th>最新体重</th>
        </tr>
        <tr class="goal-weight">
            <th>{{$targetWeight, 1}} <span>kg</span></th>
            <th>{{$latestWeight - $targetWeight, 1}} <span>kg</span></th>
            <th>{{$latestWeight, 1}} <span>kg</span></th>
        </tr>
    </table>
    <div class="form-group">
        <div>
            <form class="search-form" action="{{'weight_logs/search'}}" method="get">
                @csrf
                <input class="search-form__date" type="date" name="start_date" value="{{ request('start_date') }}">
                <span>~</span>
                <input class="search-form__date" type="date" name="end_date" value="{{ request('end_date') }}">
                <input class="search-form__btn" type="submit" value="検索">
            </form>
            <a class="create-btn" href="#modal">データ追加</a>
        </div>
        <table class="log__table">
            <tr class="log__row">
                <th class="log__label">日付</th>
                <th class="log__label">体重</th>
                <th class="log__label">食摂取カロリー</th>
                <th class="log__label">運動時間</th>
                <th class="log__label"></th>
            </tr>
            @foreach($weightLogs as $log)
            <tr class="log__row">
                <td class="log__data">{{ \Carbon\Carbon::parse($log->date)->format('Y/m/d') }}</td>
                <td class="log__data">{{ number_format($log->weight, 1) }}kg</td>
                <td class="log__data">{{ number_format($log->calories) }}cal</td>
                <td class="log__data">
                @php
                    $timeParts = explode(':', $log->exercise_time);
                    $hour = $timeParts[0] ?? '00';
                    $minute = $timeParts[1] ?? '00';
                @endphp
                {{ $hour }}時間{{ $minute }}分                    
                </td>
                <td class="log__update-btn">
                    <a class="log__update" href="/weight_logs/{{ $log->id }}">
                        <img src="{{ asset('/images/pig-pen.png') }}" alt="ペンの画像">
                    </a>
                </td>
            @endforeach
            </tr>
        </table>
         {{ $weightLogs->links() }}
    </div>
</div>

<!--モーダル-->
<div class="modal" id="modal">
    <div class="modal-content">
        <h2>Weight Logを追加</h2>
        <form action="/weight_logs" method="post">
            @csrf

            <div class="input-item">
                <label class="label" for="date">日付<span>必須
                </span></label>
                <input type="date" name="date">
                <p class="form-item__error">
                    @error('date')
                    {{ $message }}
                    @enderror
                </p>
            </div>

            <div class="input-item">
                <label class="label" for="weight">体重<span>必須
                </span></label>
                <div class="input-with-unit">
                    <input type="text" name="weight" step="0.1">
                    <span class="unit">kg</span>
                </div>
                <p class="form-item__error">
                    @error('weight')
                    {{ $message }}
                    @enderror
                </p>
            </div>

            <div class="input-item">
                <label class="label" for="calories">摂取カロリー<span>必須
                </span></label>
                <div class="input-with-unit">
                    <input type="text" name="calories">
                    <span class="unit">cal</span>
                </div>
                <p class="form-item__error">
                    @error('calories')
                    {{ $message }}
                    @enderror
                </p>
            </div>

            <div class="input-item">
                <label class="label" for="exercise_time">運動時間<span>必須
                </span></label>
                <div class="input-with-unit">
                    <input type="text" name="exercise_time" placeholder="00:00">
                </div>
                <p class="form-item__error">
                    @error('exercise_time')
                    {{ $message }}
                    @enderror
                </p>
            </div>

            <div class="input-item">
                <label class="label" for="exercise_content">運動内容</label>
                <textarea name="exercise_content" placeholder="運動内容を追加"></textarea>
            </div>
            <p class="form-item__error">
                @error('exercise_content')
                {{ $message }}
                @enderror
            </p>

            <div class="button-group">
                <a class="cancel-btn" href="#">戻る</a>
                <button type="submit" class="register-btn">登録</button>
            </div>
        </form>
    </div>
</div>
@endsection