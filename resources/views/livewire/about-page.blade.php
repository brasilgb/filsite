<div class="mt-24">
    @if ($about)
        <header class="">
            <div>
                <img src={{ asset('storage/' . $about->featured) }} alt="">
            </div>
        </header>
        <div class="container m-auto">
            <div>
                {{ $about->title }}
            </div>
            <div>
                {!! $about->content !!}
            </div>
        </div>
    @endif

</div>
