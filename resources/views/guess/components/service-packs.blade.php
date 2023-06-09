<div class="col-md-6 col-lg-3 ftco-animate">
    <div class="block-7">
        <div class="text-center">
            <h4 class="heading-2">{{ $servicePack->name }}</h4>
            <span class="excerpt d-block text-truncate">{{ $servicePack->description }}</span>
            <span class="price"><span title="{{ CurrencyHelper::format($servicePack->price) }}"
                    class="number d-block text-truncate">{{ CurrencyHelper::format($servicePack->price)
                    }}</span></span>

            <ul class="pricing-text mb-5">
                @foreach ($servicePack->services as $item)
                <li><span class="fa fa-check mr-2"></span>{{ $item->name }}</li>
                @endforeach
            </ul>

            <a href="#" class="btn btn-primary px-4 py-3">Đặt lịch ngay</a>
        </div>
    </div>
</div>