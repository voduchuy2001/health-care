<section class="ftco-section bg-light">
    <div class="container">
        <div class="row justify-content-center pb-5 mb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <span class="subheading mb-3">Giá &amp; Gói dịch vụ</span>
                <h2>Chọn gói dịch vụ</h2>
            </div>
        </div>
        <div class="row">
            @foreach ($servicePacks->take(4) as $servicePack)
                @include('guess.components.service-packs')
            @endforeach
        </div>
    </div>
</section>