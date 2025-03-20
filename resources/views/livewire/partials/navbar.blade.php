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
        <img src="{{ asset('images/logo.png') }}" alt="ChitChat Logo"
            class="h-12 transform origin-left transition duration-200"
            :class="{ 'scale-100': !scrolledFromTop, 'scale-75': scrolledFromTop }" />
    </a>
    <nav>
        <button class="md:hidden" @click="navOpen = !navOpen">
            ok
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
        <ul class="
                      fixed
                      left-0
                      right-0
                      min-h-screen
                      px-4
                      pt-8
                      space-y-4
                      bg-transparent
                      text-white
                      transform
                      transition
                      duration-300
                      translate-x-full
                      md:relative md:flex md:space-x-10 md:min-h-0 md:px-0 md:py-0 md:space-y-0 md:translate-x-0
                   "
            :class="{ 'translate-x-full': !navOpen }" :class="{ 'translate-x-0': navOpen }">
            <li class="">
                <a href="/servicos" wire:navigate class="md:text-slate-50 text-slate-700 px-3 py-1.5 font-semibold"
                    wire:current="md:bg-[#CA0156] md:text-white rounded-md" @click="navOpen = false">Serviços</a>
            </li>
            <li>
                <a href="/produtos" wire:navigate class="md:text-slate-50 text-slate-700 px-3 py-1.5 font-semibold"
                    wire:current="md:bg-[#CA0156] md:text-white rounded-md" @click="navOpen = false">Produtos</a>
            </li>
            <li>
                <a href="/sobre" wire:navigate class="md:text-slate-50 text-slate-700 px-3 py-1.5 font-semibold"
                    wire:current="md:bg-[#CA0156] md:text-white rounded-md" @click="navOpen = false">Sobre</a>
            </li>
            <li>
                <a href="/contato" wire:navigate class="md:text-slate-50 text-slate-700 px-3 py-1.5 font-semibold"
                    wire:current="md:bg-[#CA0156] md:text-white rounded-md" @click="navOpen = false">Contato</a>
            </li>
            <li class="md:pl-10">
                <a href="/admin" class="text-slate-700 md:text-slate-50 md:bg-[#007AFF] rounded-md px-3 py-1.5 font-semibold">
                    @auth
                        Painel de controle
                        @elseguest
                        Área do cliente
                    @endauth
                </a>
            </li>
        </ul>
    </nav>
</header>
