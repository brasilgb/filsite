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

    <div class="bg-[#162131] py-2">
        <div
            class="container m-auto overflow-auto flex items-center md:justify-start justify-between md:gap-6 bg-[#253650] rounded-md p-1">
            @foreach ($categories as $category)
                @if (!is_null($category->category_id))
                    <button type="button" wire:click="servicesall({{ $category->id }})"
                        class="px-6 py-2 rounded-md cursor-pointer drop-shadow-md {{ $category->id == $active || $category->id == $active2 || $category->id == $active3
                            ? 'bg-[#CA0156] border border-[#eb0766] text-white shadow-md'
                            : 'bg-transparent text-white' }}">
                        {{ $category->name }}
                    </button>
                @endif
            @endforeach
        </div>
    </div>

    @if (count($categories) > 0)
        @foreach ($categories as $category)
            @if (is_null($category->category_id))
                <section class="container m-auto py-2 px-4">
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

    <div class="container m-auto grid md:grid-cols-4 gap-4 py-10 md:px-0 px-2">
        @if (count($allservices) > 0)
            @foreach ($allservices as $service)
                @if (count($service->services) > 0)
                    @foreach ($service->services as $srv)
                        <div data-aos="fade-out" class=" bg-white border border-gray-200 rounded-lg shadow-sm px-4">
                            <img class="rounded-t-lg" src={{ asset('storage/' . $srv->featured) }} alt="" />
                            <div class="p-5">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $srv->title }}
                                </h5>
                                <p class="mb-4 font-normal text-gray-700">{!! $srv->content !!}</p>
                                <div class="mt-6 flex justify-end">
                                    <a href="https://api.whatsapp.com/send?phone={{ $numwhats }}&text=Gostaria de um orçamento sobre {{ $srv->title }}"
                                        class="inline-flex items-center gap-4 px-3 py-2 text-sm font-medium text-center text-white bg-[#25D366] hover:bg-[#25D366e3] rounded-lg focus:ring-4 focus:outline-none focus:ring-blue-300">
                                        Solicite orçamento
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                                            <path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232"/>
                                          </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            @endforeach
        @else
            @foreach ($services as $service)
                @if (count($service->services) > 0)
                    @foreach ($service->services as $srv)
                        <div data-aos="fade-out" class=" bg-white border border-gray-200 rounded-lg shadow-sm px-4">
                            <img class="rounded-t-lg" src={{ asset('storage/' . $srv->featured) }} alt="" />
                            <div class="p-5">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $srv->title }}
                                </h5>
                                <p class="mb-4 font-normal text-gray-700">{!! $srv->content !!}</p>
                                <div class="mt-6 flex justify-end">
                                    <a href="https://api.whatsapp.com/send?phone={{ $numwhats }}&text=Gostaria de um orçamento sobre {{ $srv->title }}"
                                        class="inline-flex items-center gap-4 px-3 py-2 text-sm font-medium text-center text-white bg-[#25D366] hover:bg-[#25D366e3] rounded-lg focus:ring-4 focus:outline-none focus:ring-blue-300">
                                        Solicite orçamento
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                                            <path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232"/>
                                          </svg>
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
