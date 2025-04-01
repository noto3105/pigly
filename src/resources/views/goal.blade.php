@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/goal.css') }}">
@endsection

@section('content')
<div class="log-content">
    <div class="edit-form-container">
        <h2 class="log__title">目標体重設定</h2>
        <form action="/weight_logs/goal_setting" method="POST">
            @csrf

            <div class="input-item">
                <div class="input-with-unit">
                    <input type="text" name="target_weight" step="0.1" value="{{ old('target_weight', $targetWeight ) }}">
                    <span class="unit">kg</span>
                </div>
                <p class="form-item__error">
                    @error('target_weight')
                    {{ $message }}
                    @enderror
                </p>
            </div>

            <div class="button-wrapper">
                <div class="center__button-group">
                    <a href="/weight_logs" class="cancel-btn">戻る</a>
                    <button type="submit" class="update-btn">更新</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection