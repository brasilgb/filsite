<div class="mt-24">
    @if ($about)
        <header class="">
            <div>
                <img class="object-cover h-auto w-full" src={{ asset('storage/' . $about->featured) }} alt="">
            </div>
        </header>
        <section class="container m-auto py-16">
            <div class="bg-white shadow-md p-8 border border-gray-100 rounded-md">
                <div class=" text-3xl font-light text-[#162131]">
                    {{ $about->title }}
                </div>
                <div class="text-sm text-slate-400 pb-6">
                    {{ $about->summary }}
                </div>
                <div>
                    {!! $about->content !!}
                </div>
            </div>
        </section>
    @endif

</div>
