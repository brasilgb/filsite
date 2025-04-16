<section class="bg-slate-50 py-16">
    @if (count($brands) > 0)
        <div class="container m-auto flex flex-wrap items-center justify-center gap-6">
            @foreach ($brands as $brand)
                <div class="max-w-2xl p-6 bg-white border border-gray-200 rounded-lg shadow-sm">
                    <img class="w-auto h-16" src={{ asset('storage/' . $brand->thumbnail) }} alt="" />
                </div>
            @endforeach
        </div>
    @endif
</section>
