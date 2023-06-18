<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            @php
                $title = SetPageTitleHelper::getTitle();
                @endphp

            <h4 class="mb-sm-0">{{ $title['title'] }}</h4>
        </div>
    </div>
</div>