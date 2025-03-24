<div>
    @if (session()->has('success'))
        <div class="bg-green-200 text-green-800 px-4 py-2 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div class="bg-red-800 text-white px-4 py-2 rounded-lg">
            {{ session('error') }}
        </div>
    @endif

    <div class="p-4 py-6 rounded-lg bg-gray-50 md:p-8">
        <form wire:submit="send" method="post">


            <div class="mt-4">
                <label for="name" class="block mb-2 text-sm text-gray-600">Nome</label>
                <input id="name" wire:model="name" type="text"
                    class="block w-full px-5 py-2.5 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mt-4">
                <label for="email" class="block mb-2 text-sm text-gray-600">E-mail</label>
                <input id="email" wire:model="email" type="text"
                    class="block w-full px-5 py-2.5 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="w-full mt-4">
                <label form="message" class="block mb-2 text-sm text-gray-600">Mensagem</label>
                <textarea wire:model="message" id="message"
                    class="block w-full h-32 px-5 py-2.5 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg md:h-56 focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"
                    placeholder="Message"></textarea>
                @error('message')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit"
                class="w-full px-6 py-3 mt-4 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-500 rounded-lg hover:bg-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                Enviar mensagem
            </button>
        </form>
    </div>
</div>
