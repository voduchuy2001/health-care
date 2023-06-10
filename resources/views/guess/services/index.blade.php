@extends('guess.layouts.app')
@section('content')
@include('guess.components.breadcrumbs')

<section class="ftco-section">
    <div class="container">
        <div class="row">
            @foreach ($services as $service)
            <div class="col-md-4 d-flex services align-self-stretch px-4 ftco-animate">
                <div class="d-block services-wrap text-center">
                    <div class="img" style="background-image: url({{ $service->image }});"></div>
                    <div class="media-body p-2 mt-3">
                        <h3 class="heading">{{ $service->name }}</h3>
                        <p>{{ $service->description }}</p>
                        <p><a href="#" class="btn btn-primary btn-outline-primary">{{ CurrencyHelper::format($service->price) }}</a></p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="row mt-5">
            <div class="col text-center">
                {{ $services->links() }}
            </div>
        </div>
    </div>
</section>

@endsection