@extends('guess.layouts.app')
@section('content')
@include('guess.components.breadcrumbs')

<section class="ftco-section">
    <div class="container">
        <div class="row">
            @foreach ($services as $service)
            
            @include('guess.components.services')

            @endforeach
        </div>
    </div>
</section>
@endsection