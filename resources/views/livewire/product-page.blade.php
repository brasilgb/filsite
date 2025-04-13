<div class="">
    @if (count($categories) > 0)
        <header class="pt-24 bg-[#162131]">
            @foreach ($categories as $category)
                @if (is_null($category->category_id))
                    <div>
                        <img class="object-cover h-auto w-full" src={{ asset('storage/' . $category->featured) }}
                            alt="">
                    </div>
                @endif
            @endforeach
        </header>

        <div class="bg-[#162131] py-2">
            <div
                class="container m-auto overflow-auto flex items-center md:justify-start justify-between md:gap-6 bg-[#253650] rounded-md p-1">
                <select wire:model.live="catSelected" class="bg-white px-4 py-2 rounded-md">
                    @foreach ($categories as $category)
                        @if (!is_null($category->category_id))
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                    @endforeach
                </select>

            </div>
        </div>
    @endif

    @if (count($categories) > 0)
        @foreach ($categories as $category)
            @if (is_null($category->category_id))
                <section class="container m-auto py-2">
                    <div class=" text-3xl font-light text-[#162131]">
                        {{ $category->name }}<span class="text-base"> / </span>{{ $categoryActive->name }}
                    </div>
                    <div class="text-sm text-slate-400 pb-6">
                        {!! $category->description !!}
                    </div>
                </section>
            @endif
        @endforeach
    @endif

    <div class="container m-auto grid md:grid-cols-5 gap-4 py-10 md:px-0 px-2">
        @if (count($allproducts) > 0)
            @foreach ($allproducts as $product)
                @if (count($product->products) > 0)
                    @foreach ($product->products as $srv)
                        <div data-aos="fade-out"
                            class="w-full md:max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm">
                            <img class="p-4 rounded-t-lg" src={{ asset('storage/' . $srv->featured) }}
                                alt="srv image" />
                            <div class="px-4 pb-5">
                                <p class="text-sm text-gray-500">{{ $srv->brand }}</p>
                                <h5 class="text-xl font-semibold tracking-tight text-gray-900">{{ $srv->title }}
                                </h5>

                                <div class="flex items-center mt-2.5 mb-5">
                                    @if ($srv->valpromo > '0')
                                        <div>
                                            <del
                                                class="text-[#CA0156] text-xs font-semibold px-1.5 py-0.5 rounded-sm ms-3">R$
                                                {{ $srv->valnormal }}</del>
                                            <span
                                                class="text-blue-800 text-lg font-semibold px-1.5 py-0.5 rounded-full ms-3">R$
                                                {{ $srv->valpromo }}</span>
                                        </div>
                                    @endif
                                </div>
                                <div class="flex items-center justify-end mt-2.5 mb-5">
                                    @if ($srv->valnormal > '0')
                                        <span
                                            class="text-blue-800 text-lg font-semibold px-1.5 py-0.5 rounded-full ms-3">R$
                                            {{ $srv->valnormal }}</span>
                                    @endif
                                </div>
                                <div class="flex items-center justify-between">
                                    <a href="/produtos/detalhes/{{ $srv->slug }}"
                                        class="text-white bg-[#CA0156] hover:bg-[#ca0155e3] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                        Detalhes
                                    </a>
                                    <a href="https://api.whatsapp.com/send?phone=5551995179173&text=Gostaria de mais informações sobre {{ $srv->title }}"
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
                            <div class="px-4 pb-5">
                                <p class="text-sm text-gray-500">{{ $srv->brand }}</p>
                                <h5 class="text-xl font-semibold tracking-tight text-gray-900">{{ $srv->title }}
                                </h5>
                                <div class="flex items-center mt-2.5 mb-5">
                                    @if ($srv->valpromo > '0')
                                        <div>
                                            <del
                                                class="text-[#CA0156] text-xs font-semibold px-1.5 py-0.5 rounded-sm ms-3">R$
                                                {{ $srv->valnormal }}</del>
                                            <span
                                                class="text-blue-800 text-lg font-semibold px-1.5 py-0.5 rounded-full ms-3">R$
                                                {{ $srv->valpromo }}</span>
                                        </div>
                                    @endif
                                </div>
                                <div class="flex items-center justify-end mt-2.5 mb-5">
                                    @if ($srv->valnormal > '0')
                                        <span
                                            class="text-blue-800 text-lg font-semibold px-1.5 py-0.5 rounded-full ms-3">R$
                                            {{ $srv->valnormal }}</span>
                                    @endif
                                </div>
                                <div class="flex items-center justify-between">
                                    <a href="/produtos/detalhes/{{ $srv->slug }}"
                                        class="text-white bg-[#CA0156] hover:bg-[#ca0155e3] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                        Detalhes
                                    </a>
                                    <a href="https://api.whatsapp.com/send?phone=5551995179173&text=Gostaria de mais informações sobre {{ $srv->title }}"
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
