<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ログイン</title>
</head>
<body>
    <h1>ログイン</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div>
            <label for="email">メールアドレス:</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
        </div>

        <div>
            <label for="password">パスワード:</label>
            <input id="password" type="password" name="password" required>
        </div>

        <button type="submit">ログイン</button>
    </form>

    <p>アカウントをお持ちでない方は <a href="{{ route('register') }}">こちら</a></p>
</body>
</html>
