@extends('layouts.app')

@section('content')
<div class="card">
    <div style="display:flex; align-items:center; justify-content: space-between;">
        <h2>Nhân viên</h2>
        <a class="btn btn-primary" href="{{ route('employees.create') }}">+ Thêm nhân viên</a>
    </div>
    <table>
        <thead>
            <tr>
                <th>Tên</th>
                <th>Email</th>
                <th>Điện thoại</th>
                <th>Vai trò</th>
                <th>Trạng thái</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
            <tr>
                <td>{{ $employee->name }}</td>
                <td>{{ $employee->email }}</td>
                <td>{{ $employee->phone }}</td>
                <td>{{ $employee->role }}</td>
                <td>{{ $employee->is_active ? 'Đang làm' : 'Nghỉ' }}</td>
                <td>
                    <a class="btn" href="{{ route('employees.edit', $employee) }}">Sửa</a>
                    <form class="inline" method="POST" action="{{ route('employees.destroy', $employee) }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" onclick="return confirm('Xóa nhân viên này?')">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div style="margin-top:12px;">{{ $employees->links() }}</div>
</div>
@endsection
