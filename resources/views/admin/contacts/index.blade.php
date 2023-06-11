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
                            <th scope="col">Vấn đề</th>
                            <th scope="col">Nội dung</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Hành Động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (! empty($contacts))
                        @foreach ($contacts as $contact)
                        <tr>
                            <td class="fw-medium">{{ $contact->id }}</td>
                            <td>{{ $contact->subject }}</td>
                            <td class="text-truncate">{{ $contact->message }} ...</td>
                            <td>{{ $contact->status === 0 ? 'Chưa được xử lý' : 'Đã được xử lý' }}</td>
                            <td>
                                <div class="hstack gap-3 fs-15">
                                    <a href="{{ route('admin.contact.edit', ['id' => $contact->id]) }}"
                                        class="link-warning">
                                        <i class="ri-edit-2-line"></i>
                                    </a>

                                    <a href="{{ route('admin.contact.delete', ['id' => $contact->id]) }}"
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

        @if ($contacts->hasPages())
        <div class="card-body">
            {{$contacts->onEachSide(1)->links()}}
        </div>
        @endif
    </div>
</div>
@endsection