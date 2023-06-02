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
                        @if ($services->isNotEmpty())
                        @foreach ($services as $article)
                        <tr>
                            <td class="fw-medium">{{$article->id}}</td>
                            <td>{{$article->short_content}}</td>
                            <td><img src="{{$article->image}}" alt="" class="rounded avatar-xs"></td>
                            <td>{{$article->user->name}} {{$article->user->lastName}}</td>
                            <td>{{$article->created_at->format('d/m/Y')}}</td>
                            <td>
                                <div class="hstack gap-3 fs-15">
                                    <a href="{{ route('edit-article', ['id'=>$article->id]) }}"
                                        class="link-warning"><i class="ri-edit-2-line"></i></a>

                                    <a wire:click="delete({{ $article->id }})" class=" link-danger"
                                        style="cursor: pointer">
                                        <i class="ri-delete-bin-2-line" data-bs-toggle="modal"
                                            data-bs-target=".deleteModal" data-bs-backdrop="static">
                                        </i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        @else

                        @include('admin.components.not-have-value')

                        @endif
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card-body">
            {{$services->onEachSide(1)->links()}}
        </div>
    </div>
</div>
@endsection