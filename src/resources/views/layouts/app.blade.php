<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pigly</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('css')
</head>
<body>
    <header class="header">
        <div class="header-logo__inner">
            <a class="header-logo" href="/">
                PiGLy
            </a>
        </div>
        <div class="header-nav__inner">
            <nav>
                @if (Auth::check())
                <ul class="header-nav">
                    <li class="header-nav__item">
                        <a class="header-nav__link" href="/goal">目標体重設定</a>
                    </li>
                    <li class="header-nav__item">
                        <form action="/logout" method="post">
                            @csrf
                            <button class="header-nav__link">ログアウト</button>
                        </form>
                    </li>
                    @endif
                </ul>
            </nav>
        </div>
    </header>

    <main>
        @yield('content')
    </main>
</body>
</html>