<x-theme.nav.bar class="mb-1">
    <x-theme.nav.logo>Munshi</x-theme.nav.logo>
    <x-theme.nav.link>Home</x-theme.nav.link>
    <x-theme.nav.link href="{{ url('product') }}">Product</x-theme.nav.link>
    <x-theme.nav.link href="{{ url('invoice') }}">Invoice</x-theme.nav.link>
    <x-theme.nav.link>Contact</x-theme.nav.link>
    <x-theme.nav.dropdown copation="Product">
        <x-theme.nav.dropdown.link>Dress</x-theme.nav.dropdown.link>
        <x-theme.nav.dropdown.link>Food</x-theme.nav.dropdown.link>
        <x-theme.nav.dropdown.link>Electronic</x-theme.nav.dropdown.link>
    </x-theme.nav.dropdown>
    <div class="flex-grow"></div>
    <x-theme.nav.link href="{{ url('login') }}">Login</x-theme.nav.link>
</x-theme.nav.bar>