<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pigly</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/register.css') }}" />
</head>
<body>
    <div class="content">
        <form class="register-form" action="/register" method="post">
            @csrf
            <div class="title">
                <h1 class="title-logo">PiGLy</h1>
            </div>
            <div class="heading">
                <h2 class="heading-logo">新規会員登録</h2>
            </div>
            <div class="step">
                <p>STEP1アカウント情報の登録</p>
            </div>
            <div class="form-item">
                <label class="form-item__heading" for="name">お名前</label>
                <input class="form-item__input" type="text" name="name" id="name" placeholder="名前を入力">
                <p class="form-item__error">
                    @error('name')
                    {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="form-item">
                <label class="form-item__heading for="email">メールアドレス</label>
                <input class="form-item__input" type="mail" name="email" id="email" placeholder="メールアドレスを入力">
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
            <input class="register-form__btn" type="submit" value="次に進む">
            <a href="login">ログインはこちら</a>
        </form>
    </div>
</body>
</html>