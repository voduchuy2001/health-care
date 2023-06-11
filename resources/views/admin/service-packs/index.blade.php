@extends('admin.layouts.app')
@section('content')
@include('admin.components.breadcrumbs')

<div class="col-xl-12">
    <div class="card">
        <div class="card-header border-0">
            <div class="row g-4">
                <div class="col-sm-auto">
                    <div>
                        <a href="{{route('admin.service-pack.create')}}" class="btn btn-primary">
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
                            <th scope="col">Tên Dịch vụ</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Hành Động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (! empty($servicePacks))
                        @foreach ($servicePacks as $servicePack)
                        <tr>
                            <td class="fw-medium">{{ $servicePack->id }}</td>
                            <td>{{ $servicePack->name }}</td>
                            <td>{{ CurrencyHelper::format($servicePack->price) }}</td>
                            <td>
                                <div class="hstack gap-3 fs-15">
                                    <a href="{{ route('admin.service-pack.edit', ['id' => $servicePack->id]) }}"
                                        class="link-warning">
                                        <i class="ri-edit-2-line"></i>
                                    </a>

                                    <a href="{{ route('admin.service-pack.delete', ['id' => $servicePack->id]) }}"
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

        @if ($servicePacks->hasPages())
        <div class="card-body">
            {{ $servicePacks->onEachSide(1)->links() }}
        </div>
        @endif
    </div>
</div>
@endsection