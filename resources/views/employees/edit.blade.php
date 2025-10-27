@extends('layouts.app')

@section('content')
<div class="card">
    <h2>Sửa nhân viên</h2>
    <form method="POST" action="{{ route('employees.update', $employee) }}">
        @csrf
        @method('PUT')
        <div class="field">
            <label>Tên</label>
            <input type="text" name="name" value="{{ $employee->name }}" required>
        </div>
        <div class="field">
            <label>Email</label>
            <input type="email" name="email" value="{{ $employee->email }}" required>
        </div>
        <div class="field">
            <label>Điện thoại</label>
            <input type="text" name="phone" value="{{ $employee->phone }}">
        </div>
        <div class="field">
            <label>Vai trò</label>
            <select name="role" required>
                <option value="manager" {{ $employee->role=='manager' ? 'selected' : '' }}>Quản lý</option>
                <option value="order" {{ $employee->role=='order' ? 'selected' : '' }}>Nhân viên order</option>
                <option value="kitchen" {{ $employee->role=='kitchen' ? 'selected' : '' }}>Nhân viên bếp</option>
                <option value="cashier" {{ $employee->role=='cashier' ? 'selected' : '' }}>Thu ngân</option>
                <option value="host" {{ $employee->role=='host' ? 'selected' : '' }}>Lễ tân</option>
                <option value="cleaning" {{ $employee->role=='cleaning' ? 'selected' : '' }}>Phục vụ / dọn dẹp</option>
            </select>
        </div>
        <div class="field">
            <label>Ngày vào làm</label>
            <input type="text" name="hired_at" value="{{ optional($employee->hired_at)->format('Y-m-d') }}" placeholder="YYYY-MM-DD">
        </div>
        <div class="field">
            <label><input type="checkbox" name="is_active" {{ $employee->is_active ? 'checked' : '' }}> Đang làm</label>
        </div>
        <button class="btn btn-primary">Cập nhật</button>
        <a class="btn" href="{{ route('employees.index') }}">Hủy</a>
    </form>
</div>
@endsection
