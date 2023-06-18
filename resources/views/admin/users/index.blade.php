@extends('admin.layouts.app')
@section('content')
@include('admin.components.breadcrumbs')

<div class="col-xl-12">
    <div class="card">
        <div class="card-header border-0">
            <div class="row g-4">

                @include('admin.components.search')

            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered align-middle table-nowrap mb-0">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Khách hàng</th>
                            <th scope="col">Email</th>
                            <th scope="col">Quyền truy cập</th>
                            <th scope="col">Hành Động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (! empty($users))
                        @foreach ($users as $user)
                        <tr>
                            <td class="fw-medium">{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>@if ($user->role === 'is_admin')
                                Quản trị viên
                                @elseif($user->role === 'is_employee')
                                Nhân viên
                                @else
                                Người dùng
                                @endif</td>
                            <td>
                                <div class="hstack gap-3 fs-15">
                                    <a href="{{ route('admin.user.edit', ['id' => $user->id]) }}" class="link-warning">
                                        <i class="ri-eye-2-line"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

        @if ($users->hasPages())
        <div class="card-body">
            {{ $users->onEachSide(1)->links() }}
        </div>
        @endif
    </div>
</div>
@endsection