@extends('admin.layouts.app')
@section('content')
@include('admin.components.breadcrumbs')

<form action="{{ route('admin.service-pack.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="row">
        <div class="col-xxl-6">
            <div class="card">
                <div class="card-body">

                    @include('admin.components.nav-tabs')

                    <div class="tab-content text-muted">
                        <div class="tab-pane active" id="element" role="tabpanel">
                            <div class="d-flex">
                                <div class="flex-grow-1 ms-2">
                                    <div class="row">
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <label for="name">Tên</label>
                                                <input type="text"
                                                    class="form-control @error('name') is-invalid @enderror" id="name"
                                                    name="name" placeholder="Tên">

                                                @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <div class="form-group">
                                                <label for="services">Các loại dịch vụ có trong gói</label>

                                                @foreach ($services as $key => $service)
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="service_ids[]"
                                                        value="{{ $service->id }}" id="service-{{ $key}}">
                                                    <label class="form-check-label" for="service-{{ $key}}">
                                                        {{ $service->name }} ({{ CurrencyHelper::format($service->price) }})
                                                    </label>
                                                </div>
                                                @endforeach

                                                @error('services')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <div class="form-group">
                                                <label for="price">Giá</label>
                                                <input type="text" name="price" x-mask:dynamic="$money($input, ',')" x-data
                                                    class="form-control @error('price') is-invalid @enderror" id="slug"
                                                    placeholder="Giá">
                                                <p class="text-danger mt-1">(*) Nếu không chọn giá - giá sẽ bằng tổng
                                                    giá các dịch vụ được chọn</p>

                                                @error('price')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="short_content">Mô tả</label>
                                            <textarea name="description"
                                                class="form-control @error('description') is-invalid @enderror"
                                                id="description" placeholder="Mô tả" rows="7"></textarea>

                                            @error('description')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @include('admin.components.seo-tab')

                    </div>
                </div>

                @include('admin.components.submit-button')

            </div>
        </div>
    </div>
</form>
@endsection