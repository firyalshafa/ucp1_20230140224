<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Tugas Praktikum 1 - Firyal</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <style>
            :root {
                --primary: #f53003;
                --bg: #FDFDFC;
                --text: #1b1b18;
            }

            body {
                margin: 0;
                font-family: 'Instrument Sans', sans-serif;
                background-color: var(--bg);
                color: var(--text);
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                min-height: 100vh;
            }

            /* Navigasi Login/Register */
            .top-nav {
                position: absolute;
                top: 20px;
                right: 30px;
                display: flex;
                gap: 15px;
            }

            .nav-link {
                font-size: 14px;
                font-weight: 500;
                text-decoration: none;
                color: var(--text);
                padding: 8px 16px;
                border-radius: 6px;
                transition: background 0.2s;
            }

            .nav-link:hover {
                background: rgba(0,0,0,0.05);
            }

            .card {
                position: relative;
                width: 100%;
                max-width: 400px;
                background: white;
                border-radius: 16px;
                box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
                overflow: hidden;
                border: 1px solid rgba(0,0,0,0.05);
            }

            .card-deco {
                height: 8px;
                background: var(--primary);
            }

            .card-inner {
                padding: 40px;
            }

            .name {
                font-size: 28px;
                font-weight: 600;
                margin: 0 0 16px 0;
                line-height: 1.2;
            }

            .nim-row {
                display: flex;
                align-items: center;
                gap: 12px;
                margin-bottom: 30px;
            }

            .nim-tag {
                background: #fff2f2;
                color: var(--primary);
                font-size: 12px;
                font-weight: 600;
                padding: 4px 8px;
                border-radius: 4px;
            }

            .nim {
                font-family: monospace;
                font-size: 18px;
                color: #444;
            }

            .btn {
                display: inline-flex;
                align-items: center;
                gap: 8px;
                background: var(--text);
                color: white;
                text-decoration: none;
                padding: 12px 20px;
                border-radius: 8px;
                font-size: 14px;
                font-weight: 500;
                transition: opacity 0.2s;
            }

            .btn:hover {
                opacity: 0.9;
            }

            .btn svg {
                width: 16px;
                height: 16px;
            }

            /* Dark Mode Support */
            @media (prefers-color-scheme: dark) {
                body { background-color: #0a0a0a; color: #ededec; }
                .nav-link { color: #ededec; }
                .nav-link:hover { background: rgba(255,255,255,0.1); }
                .card { background: #161615; border-color: #3e3e3a; }
                .nim-tag { background: #1d0002; }
                .btn { background: #eeeeec; color: #1c1c1a; }
                .nim { color: #ccc; }
            }
        </style>
    </head>
    <body>
        @if (Route::has('login'))
            <nav class="top-nav">
                @auth
                    <a href="{{ url('/dashboard') }}" class="nav-link">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="nav-link">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="nav-link">Register</a>
                    @endif
                @endauth
            </nav>
        @endif

        <div class="card">
            <div class="card-deco"></div>
            <div class="card-inner">
                <h1 class="name">Firyal Shafa Salsabila</h1>
                
                <div class="nim-row">
                    <span class="nim-tag">NIM</span>
                    <span class="nim">20230140224</span>
                </div>

                <a href="#" class="btn">
                    <svg viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 2h7l4 4v8H2V2z" stroke="currentColor" stroke-width="1.4" stroke-linejoin="round"/>
                        <path d="M9 2v4h4" stroke="currentColor" stroke-width="1.4" stroke-linejoin="round"/>
                        <path d="M5 9h6M5 11.5h4" stroke="currentColor" stroke-width="1.3" stroke-linecap="round"/>
                    </svg>
                    Modul Pertemuan 1
                </a>
            </div>
        </div>
    </body>
</html>