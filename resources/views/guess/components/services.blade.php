<div class="col-md-4 d-flex services align-self-stretch px-4 ftco-animate">
    <div class="d-block services-wrap text-center">
        <div class="img" style="background-image: url({{ $service->image }});"></div>
        <div class="media-body p-2 mt-3">
            <h3 title="{{ $service->name }}" class="heading">{{ $service->name }}</h3>
            <p title="{{ $service->description }}">{{ $service->description }}</p>
            <p>
                <a class="btn btn-primary btn-outline-primary">{{
                    CurrencyHelper::format($service->price) }}
                </a>
            </p>
        </div>
    </div>
</div>