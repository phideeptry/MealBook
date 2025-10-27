@extends('layouts.app')

@section('content')
<div class="card">
    <div style="display:flex; align-items:center; justify-content: space-between;">
        <h2>Thực đơn</h2>
        <a class="btn btn-primary" href="{{ route('menu-items.create') }}">+ Thêm món</a>
    </div>
    <table>
        <thead>
            <tr>
                <th>Tên</th>
                <th>Danh mục</th>
                <th>Giá</th>
                <th>Tình trạng</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->category }}</td>
                <td>{{ number_format($item->price, 0, ',', '.') }} đ</td>
                <td>{{ $item->is_available ? 'Đang bán' : 'Hết hàng' }}</td>
                <td>
                    <a class="btn" href="{{ route('menu-items.edit', $item) }}">Sửa</a>
                    <form class="inline" method="POST" action="{{ route('menu-items.destroy', $item) }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" onclick="return confirm('Xóa món này?')">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div style="margin-top:12px;">{{ $items->links() }}</div>
</div>
@endsection
