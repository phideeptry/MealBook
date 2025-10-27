@extends('layouts.app')

@section('content')
<div class="card">
    <div style="display:flex; align-items:center; justify-content: space-between;">
        <h2>Đặt bàn</h2>
        <a class="btn btn-primary" href="{{ route('reservations.create') }}">+ Tạo đặt bàn</a>
    </div>
    <table>
        <thead>
            <tr>
                <th>Khách hàng</th>
                <th>Điện thoại</th>
                <th>Thời gian</th>
                <th>Số khách</th>
                <th>Bàn</th>
                <th>Trạng thái</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservations as $reservation)
            <tr>
                <td>{{ $reservation->customer_name }}</td>
                <td>{{ $reservation->customer_phone }}</td>
                <td>{{ $reservation->reservation_time->format('d/m/Y H:i') }}</td>
                <td>{{ $reservation->party_size }}</td>
                <td>{{ optional($reservation->diningTable)->number }}</td>
                <td>{{ $reservation->status }}</td>
                <td>
                    <a class="btn" href="{{ route('reservations.edit', $reservation) }}">Sửa</a>
                    <form class="inline" method="POST" action="{{ route('reservations.destroy', $reservation) }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" onclick="return confirm('Xóa đặt bàn này?')">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div style="margin-top:12px;">{{ $reservations->links() }}</div>
</div>
@endsection
