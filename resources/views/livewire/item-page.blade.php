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
    @endif
    <section class="container m-auto py-16 px-4">
        <div class=" text-3xl font-light text-[#162131]">
            {{ $product->title }}
        </div>
        <div class="text-sm text-slate-400 pb-6">
            {{ $product->summary }}
        </div>
        <div class="flex md:flex-row flex-col">
            <div class="w-auto">
                <img src={{ asset('storage/' . $product->featured) }} alt="">
                <div class="flex items-center justify-between gap-6 py-8">
                    <div class="flex items-center gap-4">
                        <div class="flex items-center mt-2.5 mb-5">
                            @if ($product->valpromo == '0' && ($product->valnormal == '0'))
                                <span class="text-gray-500">Veja as condições em nossa loja</span>
                            @endif
                            @if ($product->valpromo > '0')
                                <div>
                                    <del class="text-[#CA0156] text-xs font-semibold px-1.5 py-0.5 rounded-sm ms-3">R$
                                        {{ $product->valnormal }}</del>
                                    <span class="text-blue-800 text-lg font-semibold px-1.5 py-0.5 rounded-full ms-3">R$
                                        {{ $product->valpromo }}</span>
                                </div>
                            @endif
                        </div>
                        <div class="flex items-center justify-end mt-2.5 mb-5">
                            @if ($product->valnormal > '0')
                                <span class="text-blue-800 text-lg font-semibold px-1.5 py-0.5 rounded-full ms-3">R$
                                    {{ $product->valnormal }}</span>
                            @endif
                        </div>
                    </div>
                    <a href="https://api.whatsapp.com/send?phone=5551995179173&text=Gostaria de mais informações sobre {{ $product->title }}"
                        class="text-white bg-transparent focus:ring-0 focus:outline-none text-center">
                        <img class="w-auto h-8" src={{ asset('images/msocial/whatsapp.svg') }} alt="">
                    </a>
                </div>
            </div>
            <div class="md:flex-1 px-10">
                {!! $product->content !!}
            </div>
        </div>
    </section>
</div>
