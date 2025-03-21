<div class="">
    <header class="pt-24 bg-[#162131]">
        @foreach ($categories as $category)
            @if (is_null($category->category_id))
                <div>
                    <img src={{ asset('storage/' . $category->featured) }} alt="">
                </div>
            @endif
        @endforeach
    </header>

    <div class="bg-[#162131] py-4">
        <div class="container m-auto flex items-center md:justify-start justify-center bg-[#253650] rounded-md p-2">

            <select wire:model.live="catSelected" class="bg-white px-4 py-2 rounded-md">
                @foreach ($categories as $category)
                    @if (!is_null($category->category_id))
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endif
                @endforeach
            </select>

        </div>
    </div>
    {{-- <div>catSelected: @json($allproducts)</div> --}}
    <div class="container m-auto grid md:grid-cols-5 gap-4 py-10 md:px-0 px-2">
        @if (count($allproducts) > 0)
            @foreach ($allproducts as $product)
                @if (count($product->products) > 0)
                    @foreach ($product->products as $srv)
                        <div data-aos="fade-out"
                            class="w-full md:max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm">
                            <img class="p-4 rounded-t-lg" src={{ asset('storage/' . $srv->featured) }}
                                alt="srv image" />
                            <div class="px-5 pb-5">
                                <p class="text-sm text-gray-500">{{ $srv->brand }}</p>
                                <h5 class="text-xl font-semibold tracking-tight text-gray-900">{{ $srv->title }}
                                </h5>
                                <div class="flex items-center mt-2.5 mb-5">
                                    <del
                                        class="bg-gray-100 text-[#CA0156] text-xs font-semibold px-2.5 py-0.5 rounded-sm ms-3">R$
                                        {{ $srv->valnormal }}</del>
                                    <span
                                        class="bg-blue-100 text-blue-800 text-lg font-semibold px-2.5 py-0.5 rounded-full ms-3">R$
                                        {{ $srv->valpromo }}</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <a href="/produto"
                                        class="text-white bg-[#CA0156] hover:bg-[#ca0155e3] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                        Detalhes
                                    </a>
                                    <a href="#"
                                        class="text-white bg-transparent focus:ring-0 focus:outline-none p-2.5 text-center">
                                        <img class="w-auto h-8" src={{ asset('images/msocial/whatsapp.svg') }}
                                            alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            @endforeach
        @else
            @foreach ($products as $product)
                @if (count($product->products) > 0)
                    @foreach ($product->products as $srv)
                        <div data-aos="fade-out"
                            class="w-full md:max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm">
                            <img class="p-4 rounded-t-lg" src={{ asset('storage/' . $srv->featured) }}
                                alt="srv image" />
                            <div class="px-5 pb-5">
                                <p class="text-sm text-gray-500">{{ $srv->brand }}</p>
                                <h5 class="text-xl font-semibold tracking-tight text-gray-900">{{ $srv->title }}
                                </h5>
                                <div class="flex items-center mt-2.5 mb-5">
                                    <del
                                        class="bg-gray-100 text-[#CA0156] text-xs font-semibold px-2.5 py-0.5 rounded-sm ms-3">R$
                                        {{ $srv->valnormal }}</del>
                                    <span
                                        class="bg-blue-100 text-blue-800 text-lg font-semibold px-2.5 py-0.5 rounded-full ms-3">R$
                                        {{ $srv->valpromo }}</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <a href="/produto"
                                        class="text-white bg-[#CA0156] hover:bg-[#ca0155e3] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                        Detalhes
                                    </a>
                                    <a href="#"
                                        class="text-white bg-transparent focus:ring-0 focus:outline-none p-2.5 text-center">
                                        <img class="w-auto h-8" src={{ asset('images/msocial/whatsapp.svg') }}
                                            alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            @endforeach
        @endif
    </div>
</div>
{{-- <button type="button" wire:click="productsall({{ $category->id }})" class="flex flex-col items-center justify-center">
    <div class="p-1 w-24 h-24 text-xs cursor-pointer drop-shadow-md rounded-full {{ ($active ? $category->id === $active : $category->id === $active2) ? 'bg-[#CA0156] border border-[#eb0766] text-white shadow-md' : 'bg-transparent text-white border' }}">
        <img class="rounded-full w-full h-full" src={{ asset('storage/' . $category->thumbnail) }} alt="">
    </div>
    <div class="text-sm">
        {{ $category->name }}
    </div>
</button> --}}
