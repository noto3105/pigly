<!DOCTYPE html> 
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pigly</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/start.css') }}" />
</head>
<body>
    <div class="content">
        <form class="start-form" action="{{ route('register.step2.store') }}" method="post">
            @csrf
            <div class="title">
                <h1 class="title-logo">PiGLy</h1>
            </div>
            <div class="heading">
                <h2 class="heading-logo">新規会員登録</h2>
            </div>
            <div class="step">
                <p class="step-text">STEP2 体重データの入力</p>
            </div>
            <div class="form-item">
                <label class="form-item__heading" for="weight">現在の体重</label>
                <div class="input-with-unit">
                    <input class="form-item__input" type="text" name="weight" id="weight" placeholder="現在の体重を入力">
                    <span class="unit">kg</span>
                </div>
                <p class="form-item__error">
                    @error('weight')
                    {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="form-item">
                <label class="form-item__heading" for="goal">目標の体重</label>
                <div class="input-with-unit">
                    <input class="form-item__input" type="text" name="target_weight" id="target_weight" placeholder="目標の体重を入力">
                    <span class="unit">kg</span>
                </div>
                <p class="form-item__error">
                    @error('target_weight')
                    {{ $message }}
                    @enderror
                </p>
            </div>
            <input class="start-form__btn" type="submit" value="アカウント作成">
        </form>
    </div>
</body>
</html>