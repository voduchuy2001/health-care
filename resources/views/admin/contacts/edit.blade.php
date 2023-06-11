@extends('admin.layouts.app')
@section('content')
@include('admin.components.breadcrumbs')

<form action="{{ route('admin.contact.update', ['id' => $contact->id]) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-xxl-6">
            <div class="card">
                <div class="card-body">
                    <div class="text-muted">
                        <div class="d-flex">
                            <div class="flex-grow-1 ms-2">
                                <div class="mb-3">
                                    <p>Được gửi từ: {{ $contact->name}}</p>
                                    <p>Email: {{ $contact->email}}</p>
                                    <p>Chủ đề: {{ $contact->subject}}</p>
                                    <p>Nội dung: {{ $contact->message}}</p>
                                    <p class="{{ $contact->status === 0 ? 'text-danger' : 'text-success' }}">{{
                                        $contact->status === 0 ? 'Chưa được xử lý' : 'Đã được xử lý' }}</p>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="status"
                                        id="success" value="1"
                                        @if ($contact->status === 1)
                                            @checked(true)
                                        @endif>
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
        </div>
    </div>
</form>
@endsection