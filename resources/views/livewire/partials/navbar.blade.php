<div class="bg-[#06364D]">
    <div class="container h-10 m-auto md:flex hidden items-center"
        :class="{ 'h-10': !scrolledFromTop, 'h-0': scrolledFromTop }">
        <div class="flex items-center justify-around gap-7 text-xs w-full text-gray-50 ">
            <div class="flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                    <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6" />
                </svg>
                {{ $settings->street }}, {{ $settings->number }} - {{ $settings->neighborhood }} - {{ $settings->city }}
            </div>
            <div class="flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-telephone-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z" />
                </svg>
                {{ $settings->celular }}
            </div>
            <div class="flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-envelope-fill" viewBox="0 0 16 16">
                    <path
                        d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414zM0 4.697v7.104l5.803-3.558zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586zm3.436-.586L16 11.801V4.697z" />
                </svg>
                {{ $settings->email }}
            </div>
            <div>
                <a href="{{ $settings->instagram }}" target="_blank" rel="noopener noreferrer"
                    title="Acesse nosso Instagram"
                    class="block  text-gray-300 transition-all duration-500 hover:text-gray-600/90">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-instagram" viewBox="0 0 16 16">
                        <path
                            d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
    <header
        class="
            fixed
            w-full
            bg-linear-to-t from-[#162131] to-[#162131]
            border-b
            border-[#2d3d55]
            flex
            justify-between
            items-center
            px-4
            md:px-52
            transition-all
            duration-200
            h-24
            z-40
         "
        :class="{ 'h-24': !scrolledFromTop, 'h-14': scrolledFromTop }">

        <a href="/" wire:navigate>
            @if (!empty($settings->logo))
                <img src="{{ asset('storage/' . $settings->logo) }}" alt="ChitChat Logo"
                    class="h-12 transform origin-left transition duration-200"
                    :class="{ 'scale-100': !scrolledFromTop, 'scale-75': scrolledFromTop }" />
            @else
                <span>Logo</span>
            @endif

        </a>
        <nav>
            <button class="md:hidden" @click="navOpen = !navOpen">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
            <ul class="
                      fixed
                      {{-- top-24 --}}
                      left-0
                      right-0
                      min-h-screen
                      px-4
                      pt-8
                      space-y-4
                      bg-linear-to-t from-[#162131] to-[#162131]
                      text-white
                      transform
                      transition
                      duration-300
                      translate-x-full
                      md:relative md:flex md:space-x-4 md:min-h-0 md:px-0 md:py-0 md:space-y-0 md:translate-x-0
                   "
                :class="{ 'translate-x-full': !navOpen }" :class="{ 'translate-x-0': navOpen }">
                <li class="">
                    <a href="/" wire:navigate class="md:text-slate-50 text-slate-50 px-3 py-1.5"
                        wire:current.exact="md:bg-[#CA0156] md:border md:border-[#eb0766] md:text-white md:shadow-md drop-shadow-md rounded-md"
                        @click="navOpen = false">Home</a>
                </li>
                <li class="">
                    <a href="/servicos" wire:navigate class="md:text-slate-50 text-slate-50 px-3 py-1.5"
                        wire:current="md:bg-[#CA0156] md:border md:border-[#eb0766] md:text-white md:shadow-md drop-shadow-md rounded-md"
                        @click="navOpen = false">Serviços</a>
                </li>
                <li>
                    <a href="/produtos" class="md:text-slate-50 text-slate-50 px-3 py-1.5"
                        wire:current="md:bg-[#CA0156] md:border md:border-[#eb0766] md:text-white md:shadow-md drop-shadow-md rounded-md"
                        @click="navOpen = false">Produtos</a>
                </li>
                <li>
                    <a href="/sobre" wire:navigate class="md:text-slate-50 text-slate-50 px-3 py-1.5"
                        wire:current="md:bg-[#CA0156] md:border md:border-[#eb0766] md:text-white md:shadow-md drop-shadow-md rounded-md"
                        @click="navOpen = false">Sobre</a>
                </li>
                <li>
                    <a href="/contato" wire:navigate class="md:text-slate-50 text-slate-50 px-3 py-1.5"
                        wire:current="md:bg-[#CA0156] md:border md:border-[#eb0766] md:text-white md:shadow-md drop-shadow-md rounded-md"
                        @click="navOpen = false">Contato</a>
                </li>
                <li class="md:pl-10">
                    <a href={{ Auth::user() && Auth::user()->is_admin ? '/admin' : '/painel' }}
                        class="text-slate-50 md:text-white md:border md:border-[#008cff] md:bg-[#007AFF] md:shadow-md rounded-md px-3 py-1.5">
                        @auth
                            Painel de controle
                            @elseguest
                            Área do cliente
                        @endauth
                    </a>
                </li>
                <div class="md:hidden">
                    <div class="flex flex-col items-start justify-around gap-5 text-sm w-full text-gray-50 pl-2">
                        <div class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                <path
                                    d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6" />
                            </svg>
                            {{ $settings->street }}, {{ $settings->number }} - {{ $settings->neighborhood }} -
                            {{ $settings->city }}
                        </div>
                        <div class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-telephone-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z" />
                            </svg>
                            {{ $settings->celular }}
                        </div>
                        <div class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-envelope-fill" viewBox="0 0 16 16">
                                <path
                                    d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414zM0 4.697v7.104l5.803-3.558zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586zm3.436-.586L16 11.801V4.697z" />
                            </svg>
                            {{ $settings->email }}
                        </div>
                        <div>
                            <a href="{{ $settings->instagram }}" target="_blank" rel="noopener noreferrer"
                                title="Acesse nosso Instagram"
                                class="block  text-gray-300 transition-all duration-500 hover:text-gray-600/90">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                                    <path
                                        d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </ul>
        </nav>
    </header>
</div>
