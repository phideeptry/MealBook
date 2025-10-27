@extends('layouts.app')

@section('content')
<div class="card">
    <h2>Thêm bàn</h2>
    <form method="POST" action="{{ route('dining-tables.store') }}">
        @csrf
        <div class="field">
            <label>Số bàn</label>
            <input type="number" name="number" required>
        </div>
        <div class="field">
            <label>Số ghế</label>
            <input type="number" name="seats" value="2" required>
        </div>
        <div class="field">
            <label>Vị trí</label>
            <input type="text" name="location">
        </div>
        <div class="field">
            <label>Trạng thái</label>
            <select name="status">
                <option value="available">Trống</option>
                <option value="reserved">Đã đặt</option>
                <option value="occupied">Đang dùng</option>
                <option value="out_of_service">Bảo trì</option>
            </select>
        </div>
        <button class="btn btn-primary">Lưu</button>
        <a class="btn" href="{{ route('dining-tables.index') }}">Hủy</a>
    </form>
</div>
@endsection
