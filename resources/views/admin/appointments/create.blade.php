@extends('admin.layouts.app')
@section('content')
@include('admin.components.breadcrumbs')

<form action="{{ route('admin.appointment.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="card">
        <div class="card-body">
            <div class="d-flex">
                <div class="flex-grow-1 ms-2">
                    <div class="row">
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="name">khách hàng</label>
                                <input type="text"
                                    class="form-control @error('name') is-invalid @enderror" id="name"
                                    name="name" 
                                    placeholder="khách hàng">

                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-group">
                                <label for="phone">Số điện thoại</label>
                                <input type="phone"
                                    class="form-control @error('phone') is-invalid @enderror" id="phone"
                                    name="phone"
                                    placeholder="Số điện thoại">

                                @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-group">
                                <label for="email">Địa chỉ email</label>
                                <input type="email"
                                    class="form-control @error('email') is-invalid @enderror" id="email"
                                    name="email" 
                                    placeholder="Địa chỉ email">

                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-group">
                                <label for="date_time">Đặt lịch ngày</label>
                                <input type="text" name="date_time" class="form-control" id="date_time"
                                    placeholder="Đặt lịch ngày">

                                @error('date_time')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="notes">Ghi chú</label>
                            <textarea name="notes"
                                class="form-control @error('notes') is-invalid @enderror" id="notes"
                                placeholder="Ghi chú"
                                rows="7"></textarea>

                            @error('notes')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                
                        <div class="mb-3 form-check">
                            <input class="form-check-input" type="checkbox" name="status"
                                id="success" value="1">
                            <label class="form-check-label" for="success">
                                Đã xử lý    
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('admin.components.submit-button')

    </div>
</form>
@endsection

@section('scripts')
<script>
    flatpickr("#date_time", {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
    });
</script>
@endsection