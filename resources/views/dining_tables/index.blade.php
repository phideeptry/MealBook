@extends('layouts.app')

@section('content')
<div class="card">
    <div style="display:flex; align-items:center; justify-content: space-between;">
        <h2>Bàn ăn</h2>
        <a class="btn btn-primary" href="{{ route('dining-tables.create') }}">+ Thêm bàn</a>
    </div>
    <table>
        <thead>
            <tr>
                <th>Số bàn</th>
                <th>Số ghế</th>
                <th>Vị trí</th>
                <th>Trạng thái</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tables as $table)
            <tr>
                <td>{{ $table->number }}</td>
                <td>{{ $table->seats }}</td>
                <td>{{ $table->location }}</td>
                <td>{{ $table->status }}</td>
                <td>
                    <a class="btn" href="{{ route('dining-tables.edit', $table) }}">Sửa</a>
                    <form class="inline" method="POST" action="{{ route('dining-tables.destroy', $table) }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" onclick="return confirm('Xóa bàn này?')">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div style="margin-top:12px;">{{ $tables->links() }}</div>
</div>
@endsection
