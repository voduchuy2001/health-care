@extends('admin.layouts.app')
@section('content')
@include('admin.components.breadcrumbs')
<div class="card">
    <div class="card-body">
        <div class="d-flex">
            <div class="flex-grow-1 ms-2">
                <div class="row">
                    <p>Họ và tên: {{ $user->name }}</p>
                    <p>
                        @if(! empty($user->image))
                        <img class="avatar avatar-lg" src="{{ $user->image }}" alt="{{ $user->name }}">
                        @else
                        <img class="avatar avatar-lg" src="admin/assets/images/avatar.png" alt="{{ $user->name }}">
                        @endif
                    </p>
                    <p>Tiểu sử: {{ $user->short_description ? $user->position : "Chưa được thêm"}}</p>
                    <p>Email: {{ $user->email ? $user->email : "Chưa được thêm"}}</p>
                    <p>Facebook: {{ $user->facebook ? $user->facebook : "Chưa được thêm"}}</p>
                    <p>Instagram: {{ $user->instagram ? $user->instagram : "Chưa được thêm"}}</p>
                    <p>Twister: {{ $user->twister ? $user->twister : "Chưa được thêm"}}</p>

                    <form action="{{ route('admin.user.update', ['id' => $user->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="role" value="is_admin" @if ($user->role
                            === 'is_admin')
                            @checked(true)
                            @endif
                            id="is_admin">
                            <label class="form-check-label" for="is_admin">
                                Quản trị viên
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="role" value="is_employee" @if ($user->role
                            === 'is_employee')
                            @checked(true)
                            @endif
                            id="is_employee">
                            <label class="form-check-label" for="is_employee">
                                Nhân viên
                            </label>
                        </div>


                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="role" value="is_user" @if ($user->role
                            === 'is_user')
                            @checked(true)
                            @endif
                            id="is_user">
                            <label class="form-check-label" for="is_user">
                                Người dùng
                            </label>
                        </div>

                        @include('admin.components.submit-button')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection