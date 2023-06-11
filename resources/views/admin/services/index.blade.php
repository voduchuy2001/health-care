@extends('admin.layouts.app')
@section('content')
@include('admin.components.breadcrumbs')

<div class="col-xl-12">
    <div class="card">
        <div class="card-header border-0">
            <div class="row g-4">
                <div class="col-sm-auto">
                    <div>
                        <a href="{{route('admin.service.create')}}" class="btn btn-primary">
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
                            <th scope="col">Hình ảnh</th>
                            <th scope="col">Tên Dịch vụ</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Hành Động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (! empty($services))
                        @foreach ($services as $service)
                        <tr>
                            <td class="fw-medium">{{ $service->id }}</td>
                            <td>{{ $service->name }}</td>
                            <td><img src="{{ url($service->image) }}" alt="{{ $service->name }}"
                                    class="rounded avatar-xs">
                            </td>
                            <td>{{ CurrencyHelper::format($service->price) }}</td>
                            <td>
                                <div class="hstack gap-3 fs-15">
                                    <a href="{{ route('admin.service.edit', ['id' => $service->id]) }}"
                                        class="link-warning">
                                        <i class="ri-edit-2-line"></i>
                                    </a>

                                    <a href="{{ route('admin.service.delete', ['id' => $service->id]) }}"
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

        @if ($services->hasPages())
        <div class="card-body">
            {{ $services->onEachSide(1)->links() }}
        </div>
        @endif
    </div>
</div>
@endsection