<section class="hero-wrap hero-wrap-2" style="background-image: url('guess/images/bg_2.jpg');"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs mb-2"><span class="mr-2">
                        <a href="/">Trang chủ <i class="ion-ios-arrow-forward"></i></a></span>
                </p>
                @php
                $title = SetPageTitleHelper::getTitle();
                @endphp
                <h1 class="mb-0 bread">{{ $title['title'] }}</h1>
            </div>
        </div>
    </div>
</section>