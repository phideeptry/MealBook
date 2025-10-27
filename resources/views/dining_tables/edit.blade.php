@extends('layouts.app')

@section('content')
<div class="card">
    <h2>Sửa bàn</h2>
    <form method="POST" action="{{ route('dining-tables.update', $table) }}">
        @csrf
        @method('PUT')
        <div class="field">
            <label>Số bàn</label>
            <input type="number" name="number" value="{{ $table->number }}" required>
        </div>
        <div class="field">
            <label>Số ghế</label>
            <input type="number" name="seats" value="{{ $table->seats }}" required>
        </div>
        <div class="field">
            <label>Vị trí</label>
            <input type="text" name="location" value="{{ $table->location }}">
        </div>
        <div class="field">
            <label>Trạng thái</label>
            <select name="status">
                <option value="available" {{ $table->status=='available' ? 'selected' : '' }}>Trống</option>
                <option value="reserved" {{ $table->status=='reserved' ? 'selected' : '' }}>Đã đặt</option>
                <option value="occupied" {{ $table->status=='occupied' ? 'selected' : '' }}>Đang dùng</option>
                <option value="out_of_service" {{ $table->status=='out_of_service' ? 'selected' : '' }}>Bảo trì</option>
            </select>
        </div>
        <button class="btn btn-primary">Cập nhật</button>
        <a class="btn" href="{{ route('dining-tables.index') }}">Hủy</a>
    </form>
</div>
@endsection
