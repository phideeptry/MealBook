@extends('layouts.app')

@section('content')
<div class="card">
    <h2>Tạo đặt bàn</h2>
    <form method="POST" action="{{ route('reservations.store') }}">
        @csrf
        <div class="field">
            <label>Tên khách</label>
            <input type="text" name="customer_name" required>
        </div>
        <div class="field">
            <label>Điện thoại</label>
            <input type="text" name="customer_phone">
        </div>
        <div class="field">
            <label>Thời gian</label>
            <input type="datetime-local" name="reservation_time" required>
        </div>
        <div class="field">
            <label>Số khách</label>
            <input type="number" name="party_size" value="2" required>
        </div>
        <div class="field">
            <label>Bàn</label>
            <select name="dining_table_id">
                <option value="">-- Chưa chọn --</option>
                @foreach ($tables as $table)
                    <option value="{{ $table->id }}">Bàn {{ $table->number }} ({{ $table->seats }} ghế)</option>
                @endforeach
            </select>
        </div>
        <div class="field">
            <label>Trạng thái</label>
            <select name="status">
                <option value="pending">Chờ xác nhận</option>
                <option value="confirmed">Đã xác nhận</option>
                <option value="seated">Đã ngồi</option>
                <option value="cancelled">Hủy</option>
                <option value="completed">Hoàn tất</option>
            </select>
        </div>
        <div class="field">
            <label>Ghi chú</label>
            <textarea name="notes" rows="3"></textarea>
        </div>
        <button class="btn btn-primary">Lưu</button>
        <a class="btn" href="{{ route('reservations.index') }}">Hủy</a>
    </form>
</div>
@endsection
