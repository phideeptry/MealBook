@extends('layouts.app')

@section('content')
<div class="card">
    <h2>Thêm nhân viên</h2>
    <form method="POST" action="{{ route('employees.store') }}">
        @csrf
        <div class="field">
            <label>Tên</label>
            <input type="text" name="name" required>
        </div>
        <div class="field">
            <label>Email</label>
            <input type="email" name="email" required>
        </div>
        <div class="field">
            <label>Điện thoại</label>
            <input type="text" name="phone">
        </div>
        <div class="field">
            <label>Vai trò</label>
            <select name="role" required>
                <option value="manager">Quản lý</option>
                <option value="order">Nhân viên order</option>
                <option value="kitchen">Nhân viên bếp</option>
                <option value="cashier">Thu ngân</option>
                <option value="host">Lễ tân</option>
                <option value="cleaning">Phục vụ / dọn dẹp</option>
            </select>
        </div>
        <div class="field">
            <label>Ngày vào làm</label>
            <input type="text" name="hired_at" placeholder="YYYY-MM-DD">
        </div>
        <div class="field">
            <label><input type="checkbox" name="is_active" checked> Đang làm</label>
        </div>
        <button class="btn btn-primary">Lưu</button>
        <a class="btn" href="{{ route('employees.index') }}">Hủy</a>
    </form>
</div>
@endsection
