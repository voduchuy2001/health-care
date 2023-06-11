@extends('guess.layouts.app')
@section('content')
@include('guess.components.breadcrumbs')

<section class="ftco-section bg-light">
    <div class="container">
        <div class="row justify-content-center pb-5 mb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <span class="subheading mb-3">Giá &amp; Kế hoạch</span>
                <h2>Chọn kế hoạch hoàn hảo của bạn</h2>
            </div>
        </div>
        <div class="row">
            @foreach ($servicePacks as $servicePack)

            @include('guess.components.service-packs')
            
            @endforeach
        </div>

        <div class="mt-3">
            {{ $servicePacks->links() }}
        </div>
    </div>
</section>
@endsection