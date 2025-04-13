<div class="">
    @if ($contact)
        <header class="pt-24 bg-[#162131]">
            <div>
                <img class="object-cover h-auto w-full" src={{ asset('storage/' . $contact->featured) }} alt="">
            </div>
        </header>
        <section class="container m-auto py-16">
            <div class=" text-3xl font-light text-[#162131]">
                {{ $contact->title }}
            </div>
            <div class="text-sm text-slate-400 pb-6">
                {{ $contact->summary }}
            </div>
            <div class="pb-10">
                {!! $contact->content !!}
            </div>
            <div class="grid md:grid-cols-2 grid-cols-1">
                <div>
                    {{-- Inicio address --}}
                    <div class="grid grid-cols-1 gap-12 md:grid-cols-2">
                        @if ($settings)
                            <div>
                                <span class="inline-block p-3 text-blue-500 rounded-full bg-blue-100/80">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                                    </svg>
                                </span>

                                <h2 class="mt-4 text-base font-medium text-gray-800">Email</h2>
                                <p class="mt-2 text-sm text-gray-500">Entre em contato pelo nosso
                                    e-mail.</p>
                                <p class="mt-2 text-sm text-blue-500">
                                    contato@eplusteutonia.com.br</p>
                            </div>

                            <div>
                                <span class="inline-block p-3 text-blue-500 rounded-full bg-blue-100/80">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                                        <path
                                            d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232" />
                                    </svg>
                                </span>

                                <h2 class="mt-4 text-base font-medium text-gray-800">Whatsapp</h2>
                                <p class="mt-2 text-sm text-gray-500">Converse com nossa equipe.
                                </p>
                                <p class="mt-2 text-sm text-blue-500">Iniciar conversa</p>
                            </div>

                            <div>
                                <span class="inline-block p-3 text-blue-500 rounded-full bg-blue-100/80">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                    </svg>
                                </span>

                                <h2 class="mt-4 text-base font-medium text-gray-800">Nossa loja</h2>
                                <p class="!mt-2 !text-sm !text-gray-400">
                                    @foreach (explode( ';', $settings->opening ) as $item)
                                        {{ $item }} </br>
                                    @endforeach
                                </p>
                                <p class="mt-2 text-sm text-blue-500">
                                    {{ $settings->state }} -
                                    {{ $settings->city }} -
                                    {{ $settings->neighborhood }} -
                                    {{ $settings->street }},
                                    {{ $settings->number }}
                                </p>
                            </div>

                            <div>
                                <span class="inline-block p-3 text-blue-500 rounded-full bg-blue-100/80">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                                    </svg>
                                </span>

                                <h2 class="mt-4 text-base font-medium text-gray-800">Telefone</h2>
                                <p class="mt-2 text-sm text-gray-500">Se preferir ligue-nos.
                                </p>
                                <p class="mt-2 text-sm text-blue-500">{{ $settings->celular }}
                                    @if ($settings->telephone <> '(00) 0000-0000' )
                                        / {{ $settings->telephone }}
                                    @endif
                                </p>
                            </div>
                        @endif
                    </div>
                </div>
                {{-- end address --}}
                <div>
                    @livewire('contact-form')
                </div>
            </div>
            <div class="w-full h-96 mt-10">
                {!! $settings->maps !!}
            </div>
        </section>
    @endif

</div>
