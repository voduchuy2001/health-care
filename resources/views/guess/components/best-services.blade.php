
<section class="ftco-section ftco-services">
    <div class="container">
        <div class="row">
            @foreach ($services->take(3) as $service)
            
            @include('guess.components.services')

            @endforeach
        </div>
    </div>
</section>