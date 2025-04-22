{{-- <footer class="p-4 md:p-8 lg:p-10 border-t border-[#162131] shadow-sm bg-linear-to-t from-[#162131] to-[#162131]">
    @if ($settings)
        <div class="mx-auto max-w-screen-xl text-center">
            @if (!empty($settings->logo))
                <a href="#" class="flex justify-center items-center text-2xl font-semibold text-gray-300">
                    <img src="{{ asset('storage/' . $settings->logo) }}" alt="ChitChat Logo"
                        class="h-12 transform origin-left transition duration-200" />
                </a>
            @else
                <span>Logo</span>
            @endif

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
            <span class="text-lg text-gray-500 sm:text-center">© {{ date('Y') }}
                <a href={{ $settings->url }} class="hover:underline">{{ $settings->title }}</a>. Todos os direitos
                reservados.</span>
        </div>
    @endif
</footer> --}}
<footer
    class="w-full py-14 p-4 md:p-8 lg:p-10 border-t border-[#162131] shadow-sm bg-linear-to-t from-[#162131] to-[#162131]">
    @if ($settings)
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl mx-auto">
                @if (!empty($settings->logo))
                    <a href="/" class="flex justify-center items-center">
                        <img src="{{ asset('storage/' . $settings->logo) }}" alt="ChitChat Logo"
                            class="h-12 transform origin-left transition duration-200" />
                    </a>
                @endif

                <ul
                    class="text-lg flex items-center justify-center flex-col gap-7 md:flex-row md:gap-12 transition-all duration-500 py-10 mb-10 border-b border-gray-500">
                    <li><a href="/" class="text-gray-500 hover:text-gray-300">Home</a></li>
                    <li><a href="/servicos" class="text-gray-500 hover:text-gray-300">Serviços</a></li>
                    <li><a href="/produtos" class=" text-gray-500 hover:text-gray-300">Produtos</a></li>
                    <li><a href="/sobre" class=" text-gray-500 hover:text-gray-300">Quem Somos</a></li>
                    <li><a href="/contato" class=" text-gray-500 hover:text-gray-300">Contatos</a></li>
                </ul>
                <div class="flex space-x-10 justify-center items-center mb-10">
                    <a href="{{ $settings ? $settings->instagram : '' }}" class="block  text-gray-300 transition-all duration-500 hover:text-gray-600/90">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                            <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"/>
                          </svg>
                    </a>
                </div>
                <span class="text-lg text-gray-500 text-center block">©<a
                        href="{{ $settings->url }}">{{ $settings->title }}</a> {{ date('Y') }}, Todos
                    os direitos reservados.</span>
                    <span class="text-sm text-yellow-500 text-center block">
                        <a href="http://megb.com.br" alt="Desenvolvido por MEGB">MEGB</a>
                    </span>
            </div>
        </div>
    @endif

    <a href="https://api.whatsapp.com/send?phone={{ $settings ? $settings->whatsapp: '' }}&text=Olá, gostaria de mais informações sobre os produtos e serviços." target="_blank" rel="noreferrer noopener" class="fixed bottom-4 right-4 z-50 inline-flex items-center justify-center w-14 h-14 rounded-full bg-[#25d366]">
        <div class="absolute z-10 top-0 left-0 w-full h-full rounded-full bg-[#25d366] animate-ping"></div>
        <div class="relative z-20">
          <svg fill="#fff" height="24px" width="24px" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 308.00 308.00" xml:space="preserve" stroke="#fff" transform="matrix(1, 0, 0, 1, 0, 0)">
                <path d="M227.904,176.981c-0.6-0.288-23.054-11.345-27.044-12.781c-1.629-0.585-3.374-1.156-5.23-1.156 c-3.032,0-5.579,1.511-7.563,4.479c-2.243,3.334-9.033,11.271-11.131,13.642c-0.274,0.313-0.648,0.687-0.872,0.687 c-0.201,0-3.676-1.431-4.728-1.888c-24.087-10.463-42.37-35.624-44.877-39.867c-0.358-0.61-0.373-0.887-0.376-0.887 c0.088-0.323,0.898-1.135,1.316-1.554c1.223-1.21,2.548-2.805,3.83-4.348c0.607-0.731,1.215-1.463,1.812-2.153 c1.86-2.164,2.688-3.844,3.648-5.79l0.503-1.011c2.344-4.657,0.342-8.587-0.305-9.856c-0.531-1.062-10.012-23.944-11.02-26.348 c-2.424-5.801-5.627-8.502-10.078-8.502c-0.413,0,0,0-1.732,0.073c-2.109,0.089-13.594,1.601-18.672,4.802 c-5.385,3.395-14.495,14.217-14.495,33.249c0,17.129,10.87,33.302,15.537,39.453c0.116,0.155,0.329,0.47,0.638,0.922 c17.873,26.102,40.154,45.446,62.741,54.469c21.745,8.686,32.042,9.69,37.896,9.69c0.001,0,0.001,0,0.001,0 c2.46,0,4.429-0.193,6.166-0.364l1.102-0.105c7.512-0.666,24.02-9.22,27.775-19.655c2.958-8.219,3.738-17.199,1.77-20.458 C233.168,179.508,230.845,178.393,227.904,176.981z"/>
                <path d="M156.734,0C73.318,0,5.454,67.354,5.454,150.143c0,26.777,7.166,52.988,20.741,75.928L0.212,302.716 c-0.484,1.429-0.124,3.009,0.933,4.085C1.908,307.58,2.943,308,4,308c0.405,0,0.813-0.061,1.211-0.188l79.92-25.396 c21.87,11.685,46.588,17.853,71.604,17.853C240.143,300.27,308,232.923,308,150.143C308,67.354,240.143,0,156.734,0z M156.734,268.994c-23.539,0-46.338-6.797-65.936-19.657c-0.659-0.433-1.424-0.655-2.194-0.655c-0.407,0-0.815,0.062-1.212,0.188 l-40.035,12.726l12.924-38.129c0.418-1.234,0.209-2.595-0.561-3.647c-14.924-20.392-22.813-44.485-22.813-69.677 c0-65.543,53.754-118.867,119.826-118.867c66.064,0,119.812,53.324,119.812,118.867 C276.546,215.678,222.799,268.994,156.734,268.994z"/>
          </svg>
        </div>
      </a>

</footer>
