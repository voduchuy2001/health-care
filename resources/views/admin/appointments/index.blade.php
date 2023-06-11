@extends('admin.layouts.app')
@section('content')
@include('admin.components.breadcrumbs')

<div class="col-xl-12">
    <div class="card">
        <div class="card-header border-0">
            <div class="row g-4">
                <div class="col-sm-auto">
                    <div>
                        <a href="{{route('admin.appointment.create')}}" class="btn btn-primary">
                            <i class="ri-add-line align-bottom me-1"></i>
                            Thêm mới
                        </a>
                    </div>
                </div>

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
                            <th scope="col">Lịch</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Hành Động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (! empty($appointments))
                        @foreach ($appointments as $appointment)
                        <tr>
                            <td class="fw-medium">{{ $appointment->id }}</td>
                            <td>{{ $appointment->name }}</td>
                            <td>{{ $appointment->email }}</td>
                            <td>{{ $appointment->date_time }}</td>
                            <td>{{ $appointment->status === 0 ? 'Chưa được xử lý' : 'Đã được xử lý' }}</td>
                            <td>
                                <div class="hstack gap-3 fs-15">
                                    <a href="{{ route('admin.appointment.edit', ['id' => $appointment->id]) }}"
                                        class="link-warning">
                                        <i class="ri-edit-2-line"></i>
                                    </a>

                                    <a href="{{ route('admin.appointment.delete', ['id' => $appointment->id]) }}"
                                        onclick="return confirm('Bạn có chắc muốn xóa?')" class="link-danger"
                                        style="cursor: pointer">
                                        <i class="ri-delete-bin-2-line"></i>
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

        @if ($appointments->hasPages())
        <div class="card-body">
            {{$appointments->onEachSide(1)->links()}}
        </div>
        @endif
    </div>
</div>
@endsection