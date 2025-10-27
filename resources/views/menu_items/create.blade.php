@extends('layouts.app')

@section('content')
<div class="card">
    <h2>Thêm món</h2>
    <form method="POST" action="{{ route('menu-items.store') }}">
        @csrf
        <div class="field">
            <label>Tên món</label>
            <input type="text" name="name" required>
        </div>
        <div class="field">
            <label>Danh mục</label>
            <input type="text" name="category">
        </div>
        <div class="field">
            <label>Giá (đ)</label>
            <input type="number" step="0.01" name="price" required>
        </div>
        <div class="field">
            <label>Mô tả</label>
            <textarea name="description" rows="3"></textarea>
        </div>
        <div class="field">
            <label><input type="checkbox" name="is_available" checked> Đang bán</label>
        </div>
        <button class="btn btn-primary">Lưu</button>
        <a class="btn" href="{{ route('menu-items.index') }}">Hủy</a>
    </form>
</div>
@endsection
