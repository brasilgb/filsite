<div>
    <h1 class="text-red-400 text-2xl">Página inicial</h1>
    <div x-data="{ open: false }">

        <button @click="open = true">Show More...</button>

 

        <ul x-show="open" @click.outside="open = false">

            <li><button wire:click="archive">Archive</button></li>

            <li><button wire:click="delete">Delete</button></li>

        </ul>

    </div>
</div>
