@extends('guess.layouts.app')
@section('content')
@include('guess.components.breadcrumbs')

<section class="ftco-section testimony-section bg-light">
    <div class="container">
        <div class="row justify-content-center pb-5 mb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <span class="subheading mb-3">VỀ CHÚNG TÔI</span>
                <h2>Thành viên</h2>
            </div>
        </div>
        <div class="row ftco-animate">
            <div class="col-md-12">
                <div class="carousel-testimony owl-carousel">
                    @foreach ($users as $user)
                    <div class="item">
                        <div class="testimony-wrap d-flex">
                            <div class="user-img" title="{{ $user->name }}"
                                style="background-image: url({{ $user->image }})">
                            </div>
                            <div class="text pl-4">
                                <span class="quote d-flex align-items-center justify-content-center">
                                    <i class="fa fa-quote-left"></i>
                                </span>
                                <p title="{{ $user->short_description}}" class="text-truncate">{{ $user->short_description}}</p>
                                <p class="name">{{ $user->name }}</p>
                                <span class="position">
                                    {{ $user->role === 'is_admin' ? 'Quản trị viên' : 'Nhân viên' }}
                                </span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endsection