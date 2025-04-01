<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pigly</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
</head>
<body>
    <div class="content">
        <form class="login-form" action="/login" method="post">
            @csrf
            <div class="title">
                <h1>PiGLy</h1>
            </div>
            <div class="heading">
                <h2>ログイン</h2>
            </div>
            <div class="form-item">
                <label class="form-item__heading" for="email">メールアドレス</label>
                <input class="form-item__input" type="text" name="email" id="email" placeholder="メールアドレスを入力">
                <p class="form-item__error">
                    @error('email')
                    {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="form-item">
                <label class="form-item__heading" for="password">パスワード</label>
                <input class="form-item__input" type="text" name="password" id="password" placeholder="パスワードを入力">
                <p class="form-item__error">
                    @error('password')
                    {{ $message }}
                    @enderror
                </p>
            </div>
            <input class="login-form__btn" type="submit" value="ログイン">
            <a href="/register">アカウント作成はこちら</a>
        </form>
    </div>
</body>
</html>