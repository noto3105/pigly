@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/update.css') }}">
@endsection

@section('content')
<div class="log-content">
    <div class="edit-form-container">
        <h2 class="log__title">Weight Log</h2>
        <form action="/weight_logs/{{ $weightLog->id }}/update" method="POST">
            @csrf

            <div class="input-item">
                <label for="date">日付</label>
                <div class="input-with-unit">
                    <input type="date" name="date" value="{{ $weightLog->date }}">
                </div>
                <p class="form-item__error">
                    @error('date')
                    {{ $message }}
                    @enderror
                </p>
            </div>

            <div class="input-item">
                <label for="weight">体重</label>
                <div class="input-with-unit">
                    <input type="text" name="weight" step="0.1" value="{{ $weightLog->weight }}">
                    <span class="unit">kg</span>
                </div>
                <p class="form-item__error">
                    @error('weight')
                    {{ $message }}
                    @enderror
                </p>
            </div>

            <div class="input-item">
                <label for="calories">摂取カロリー</label>
                <div class="input-with-unit">
                    <input type="text" name="calories" value="{{ $weightLog->calories }}">
                    <span class="unit">cal</span>
                </div>
                <p class="form-item__error">
                    @error('calories')
                    {{ $message }}
                    @enderror
                </p>
            </div>

            <div class="input-item">
                <label for="exercise_time">運動時間</label>
                <div class="input-with-unit">
                    <input type="text" name="exercise_time" value="{{ $weightLog->exercise_time }}">
                </div>
                <p class="form-item__error">
                    @error('exercise_time')
                    {{ $message }}
                    @enderror
                </p>
            </div>

            <div class="input-item">
                <label for="exercise_content">運動内容</label>
                <textarea name="exercise_content" placeholder="運動内容を追加">{{ $weightLog->exercise_content }}</textarea>
            </div>
            <p class="form-item__error">
                    @error('exercise_content')
                    {{ $message }}
                    @enderror
                </p>
            <div class="button-wrapper">
                <div class="center__button-group">
                    <a class="cancel-btn" href="/weight_logs">戻る</a>
                    <button type="submit" class="update-btn">更新</button>
                </div>
        </form> 
        <form action="/weight_logs/{{ $weightLog->id }}/delete" method="POST">
            @csrf
            <button type="submit" class="delete-icon">
                <img src="{{ asset('/images/trashbox.png') }}" alt="ごみ箱ボタン">
            </button>    
        </form>
    </div>
</div>
@endsection