<div class="mt-24">
    <header class="">
        @foreach ($products as $product)
            @if (is_null($product->product_id))
                <div>
                    <img src={{ asset('storage/' . $product->featured) }} alt="">
                </div>
            @endif
        @endforeach
    </header>
    <div>
        @foreach ($products as $product)
            <div>{{ is_null($product->product_id) }}</div>
        @endforeach
    </div>
</div>
