<!doctype html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Restaurant Manager</title>
    <link rel="stylesheet" href="/css/app.css">
    <style>
        body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Fira Sans', 'Droid Sans', 'Helvetica Neue', Arial, sans-serif; margin: 0; }
        .container { max-width: 1000px; margin: 24px auto; padding: 0 16px; }
        header { background: #111827; color: #fff; }
        nav a { color: #fff; margin-right: 12px; text-decoration: none; }
        .card { background: #fff; border: 1px solid #e5e7eb; border-radius: 8px; padding: 16px; margin: 16px 0; }
        .btn { display: inline-block; padding: 8px 12px; border-radius: 6px; text-decoration: none; border: 1px solid #d1d5db; background: #f9fafb; color:#111827 }
        .btn-primary { background: #2563eb; color: white; border: none; }
        .btn-danger { background: #ef4444; color: white; border: none; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 8px 12px; border-bottom: 1px solid #e5e7eb; text-align: left; }
        form.inline { display: inline; }
        .flash { padding: 8px 12px; border-radius: 6px; background: #dcfce7; color: #14532d; border: 1px solid #86efac; margin: 12px 0; }
        .field { margin-bottom: 12px; }
        label { display: block; font-weight: 600; margin-bottom: 4px; }
        input[type=text], input[type=number], input[type=datetime-local], input[type=email], select, textarea { width: 100%; padding: 8px; border: 1px solid #d1d5db; border-radius: 6px; }
    </style>
</head>
<body>
<header>
    <div class="container" style="display:flex; align-items:center; justify-content: space-between; padding: 12px 16px;">
        <div>
            <strong>Quản lý nhà hàng</strong>
        </div>
        <nav>
            <a href="{{ route('menu-items.index') }}">Thực đơn</a>
            <a href="{{ route('employees.index') }}">Nhân viên</a>
            <a href="{{ route('dining-tables.index') }}">Bàn ăn</a>
            <a href="{{ route('reservations.index') }}">Đặt bàn</a>
        </nav>
    </div>
</header>
<div class="container">
    @if (session('success'))
        <div class="flash">{{ session('success') }}</div>
    @endif
    @yield('content')
</div>
</body>
</html>
