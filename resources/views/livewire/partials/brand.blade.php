<section class="bg-gray-100 py-16">
    <div class="container m-auto flex items-center justify-center gap-6">
        @foreach ($brands as $brand)
            <div class="max-w-2xl p-6 bg-white border border-gray-200 rounded-lg shadow-sm">
                <img class="w-auto h-16" src={{ asset('storage/' . $brand->thumbnail) }} alt="" />
            </div>
        @endforeach
    </div>
</section>
