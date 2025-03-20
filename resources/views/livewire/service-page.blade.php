<div class="mt-24">
    <header class="">
        @foreach ($categories as $category)
            @if (is_null($category->category_id))
                <div>
                    <img src={{ asset('storage/' . $category->featured) }} alt="">
                </div>
            @endif
        @endforeach
    </header>
    <div>
        @foreach ($categories as $category)
            <div>{{ is_null($category->category_id) }}</div>
        @endforeach
    </div>
</div>
