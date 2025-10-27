@extends('layouts.app')

@section('content')
<div class="card">
    <h2>Sửa đặt bàn</h2>
    <form method="POST" action="{{ route('reservations.update', $reservation) }}">
        @csrf
        @method('PUT')
        <div class="field">
            <label>Tên khách</label>
            <input type="text" name="customer_name" value="{{ $reservation->customer_name }}" required>
        </div>
        <div class="field">
            <label>Điện thoại</label>
            <input type="text" name="customer_phone" value="{{ $reservation->customer_phone }}">
        </div>
        <div class="field">
            <label>Thời gian</label>
            <input type="datetime-local" name="reservation_time" value="{{ $reservation->reservation_time->format('Y-m-d\TH:i') }}" required>
        </div>
        <div class="field">
            <label>Số khách</label>
            <input type="number" name="party_size" value="{{ $reservation->party_size }}" required>
        </div>
        <div class="field">
            <label>Bàn</label>
            <select name="dining_table_id">
                <option value="">-- Chưa chọn --</option>
                @foreach ($tables as $table)
                    <option value="{{ $table->id }}" {{ $reservation->dining_table_id == $table->id ? 'selected' : '' }}>Bàn {{ $table->number }} ({{ $table->seats }} ghế)</option>
                @endforeach
            </select>
        </div>
        <div class="field">
            <label>Trạng thái</label>
            <select name="status">
                <option value="pending" {{ $reservation->status=='pending' ? 'selected' : '' }}>Chờ xác nhận</option>
                <option value="confirmed" {{ $reservation->status=='confirmed' ? 'selected' : '' }}>Đã xác nhận</option>
                <option value="seated" {{ $reservation->status=='seated' ? 'selected' : '' }}>Đã ngồi</option>
                <option value="cancelled" {{ $reservation->status=='cancelled' ? 'selected' : '' }}>Hủy</option>
                <option value="completed" {{ $reservation->status=='completed' ? 'selected' : '' }}>Hoàn tất</option>
            </select>
        </div>
        <div class="field">
            <label>Ghi chú</label>
            <textarea name="notes" rows="3">{{ $reservation->notes }}</textarea>
        </div>
        <button class="btn btn-primary">Cập nhật</button>
        <a class="btn" href="{{ route('reservations.index') }}">Hủy</a>
    </form>
</div>
@endsection
