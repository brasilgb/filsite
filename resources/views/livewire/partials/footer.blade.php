<footer class="p-4 md:p-8 lg:p-10 border-t border-[#162131] shadow-sm bg-linear-to-t from-[#162131] to-[#162131]">
    @if ($settings)
        <div class="mx-auto max-w-screen-xl text-center">
            <a href="#" class="flex justify-center items-center text-2xl font-semibold text-gray-900">
                <img src="{{ asset('storage/' . $settings->logo) }}" alt="ChitChat Logo"
                    class="h-12 transform origin-left transition duration-200" />
            </a>
            <p class="my-6 text-gray-50">{{ $settings->description }}</p>
            <ul class="flex flex-wrap justify-center items-center mb-6 text-gray-300">
                <li>
                    <a href="/" class="mr-4 hover:underline md:mr-6 ">Home</a>
                </li>
                <li>
                    <a href="/servicos" class="mr-4 hover:underline md:mr-6">Serviços</a>
                </li>
                <li>
                    <a href="/produtos" class="mr-4 hover:underline md:mr-6 ">Produtos</a>
                </li>
                <li>
                    <a href="/sobre" class="mr-4 hover:underline md:mr-6">Quem Somos</a>
                </li>
                <li>
                    <a href="/contato" class="mr-4 hover:underline md:mr-6">Contato</a>
                </li>
            </ul>
            <span class="text-sm text-gray-500 sm:text-center">© {{ date('Y') }}
                <a href={{ $settings->url }} class="hover:underline">{{ $settings->title }}</a>. Todos os direitos
                reservados.</span>
        </div>
    @endif
</footer>
