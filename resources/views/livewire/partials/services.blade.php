    <section class="bg-slate-100">
        @if (count($services) > 0)
            <div class="py-16 md:px-0 px-4 md:container m-auto">
                <div class="pb-6 text-3xl font-light text-[#162131]">
                    Nossos serviços
                </div>
                <div class="grid md:grid-cols-3 gap-6">
                    @foreach ($services as $service)
                        <div data-aos="fade-out" class=" bg-white border border-gray-200 rounded-lg shadow-sm">
                            <img class="rounded-t-lg" src={{ asset('storage/' . $service->featured) }} alt="" />
                            <div class="p-5">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">
                                    {{ $service->name }}</h5>
                                <p class="mb-3 font-normal text-gray-700">{!! $service->description !!}</p>
                                <a href="/servicos/{{ $service->id }}" wire:navigate
                                    class="inline-flex items-center px-3 py-2 mt-6 text-sm font-medium text-center text-white  bg-[#CA0156] hover:bg-[#ca0155e3] rounded-lg focus:ring-4 focus:outline-none focus:ring-blue-300">
                                    Detalhes
                                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </section>
