<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>もぎたてフルーツ</title>

    {{-- Google Fonts（Noto Sans JPなど柔らかいフォント） --}}
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Noto Sans JP', sans-serif;
            background-color: #fafafa;
            color: #333;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #fff;
            border-bottom: 1px solid #eee;
            padding: 15px 40px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        header h1 {
            font-family: 'Georgia', serif;
            color: #f2b632;
            font-size: 28px;
            margin: 0;
        }

        main {
            padding: 40px;
            max-width: 1200px;
            margin: 0 auto;
        }

        footer {
            background-color: #fff;
            border-top: 1px solid #eee;
            text-align: center;
            padding: 10px;
            font-size: 14px;
            color: #aaa;
            margin-top: 60px;
        }

        a {
            text-decoration: none;
            color: #f2b632;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <header>
        <h1>mogitate</h1>
        <nav>
            <a href="{{ route('products.index') }}">商品一覧</a>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        &copy; 2025 mogitate fruits
    </footer>
</body>
</html>

