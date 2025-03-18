<header
    class="
            fixed
            w-full
            bg-linear-to-t from-[#2E3247] to-[#333958]
            flex
            justify-between
            items-center
            px-4
            md:px-12
            transition-all
            duration-200
            h-24
            z-40
         "
    :class="{ 'h-24': !scrolledFromTop, 'h-14': scrolledFromTop }">

    <a href="#">
        <img src="{{ asset('images/logo.png') }}" alt="ChitChat Logo"
            class="h-12 transform origin-left transition duration-200"
            :class="{ 'scale-100': !scrolledFromTop, 'scale-75': scrolledFromTop }" />
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
                      left-0
                      right-0
                      min-h-screen
                      px-4
                      pt-8
                      space-y-4
                      bg-linear-to-t from-[#2E3247] to-[#333958]
                      text-white
                      transform
                      transition
                      duration-300
                      translate-x-full
                      md:relative md:flex md:space-x-10 md:min-h-0 md:px-0 md:py-0 md:space-y-0 md:translate-x-0
                   "
            :class="{ 'translate-x-full': !navOpen }" :class="{ 'translate-x-0': navOpen }">
            <li class="">
                <a href="#" @click="navOpen = false">Home</a>
            </li>
            <li class="">
                <a href="#features" @click="navOpen = false">Serviços</a>
            </li>
            <li>
                <a href="#about" @click="navOpen = false">Produtos</a>
            </li>
            <li>
                <a href="#contact" @click="navOpen = false">Sobre</a>
            </li>
            <li>
                <a href="#contact" @click="navOpen = false">Contato</a>
            </li>
            <li>
                <a href="#"
                    class="ml-10 text-slate-50 bg-[#CA0156] rounded-full h-8 px-4 flex items-center justify-center">
                    Área do cliente
                </a>
            </li>
        </ul>
    </nav>
</header>