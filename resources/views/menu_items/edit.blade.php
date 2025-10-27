@extends('layouts.app')

@section('content')
<div class="card">
    <h2>Sửa món</h2>
    <form method="POST" action="{{ route('menu-items.update', $item) }}">
        @csrf
        @method('PUT')
        <div class="field">
            <label>Tên món</label>
            <input type="text" name="name" value="{{ $item->name }}" required>
        </div>
        <div class="field">
            <label>Danh mục</label>
            <input type="text" name="category" value="{{ $item->category }}">
        </div>
        <div class="field">
            <label>Giá (đ)</label>
            <input type="number" step="0.01" name="price" value="{{ $item->price }}" required>
        </div>
        <div class="field">
            <label>Mô tả</label>
            <textarea name="description" rows="3">{{ $item->description }}</textarea>
        </div>
        <div class="field">
            <label><input type="checkbox" name="is_available" {{ $item->is_available ? 'checked' : '' }}> Đang bán</label>
        </div>
        <button class="btn btn-primary">Cập nhật</button>
        <a class="btn" href="{{ route('menu-items.index') }}">Hủy</a>
    </form>
</div>
@endsection
