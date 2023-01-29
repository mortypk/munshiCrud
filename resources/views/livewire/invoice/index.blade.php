<div>
    <x-layouts.nav></x-layouts.nav>
    <x-theme.modal modalID="newModal" style="display: none;">
        <x-theme.modal.header>This is title</x-theme.modal.header>
        <x-theme.modal.body>This is body</x-theme.modal.body>
        <x-theme.modal.footer>
            <x-theme.form.button>OK</x-theme.form.button>
            <x-theme.form.button-submit>Submit</x-theme.form.button-submit>
        </x-theme.modal.footer>
    </x-theme.modal>
    <x-theme.modal modalID="newModal2" style="display: none;">
        <x-theme.modal.header>This is title 2</x-theme.modal.header>
        <x-theme.modal.body>This is body</x-theme.modal.body>
        <x-theme.modal.footer>
            <x-theme.form.button>OK</x-theme.form.button>
            <x-theme.form.button-submit>Submit</x-theme.form.button-submit>
        </x-theme.modal.footer>
    </x-theme.modal>
    <x-theme.form.button x-data="" x-on:click="$dispatch('modal','newModal')">Open Modal</x-theme.form.button>
    <x-theme.form.button x-data="" x-on:click="$dispatch('modal','newModal2')">Open Modal 2</x-theme.form.button>
    <div class="relative flex items-top justify-center min-h-screen  sm:items-center py-4 sm:pt-0">
        <div x-data="{ open: @entangle('showDropdown') }">
            <button @click="open = true">Show More...</button>
            <ul x-show="open" @click.outside="open = false">
                <li><button wire:click="archive">Archive</button></li>
                <li><button wire:click="delete">Delete</button></li>
            </ul>
        </div>
    </div>
</div>