<div>
    <x-layouts.nav></x-layouts.nav>
    <div x-data="{ itemId: 0 , selectId: 0}" class="relative">
        <input
            type="text"
            class="form-input"
            placeholder="Search Products..."
            wire:model="search"
            wire:keydown.escape="emptyProp"
            wire:keydown.tab="emptyProp"
            x-on:keydown="if(($event.which > 64 && $event.which < 91) || ($event.which > 96 && $event.which < 123)) itemId=0;"
            x-on:keyup.enter="$wire.set('selectedId',document.getElementById('itemId'+itemId).getAttribute('data'))"
            x-on:keydown.tab="itemId=0"
            x-on:keydown.escape="itemId=0"
            x-on:keydown.up ="if(itemId > 0) itemId--" 
            x-on:keydown.down="if(itemId < {{ $products->count()-1 }}) itemId++"
        />
        <label for="">select id
            <span>{{ $selectedId }}</span> /
            <span x-text="itemId"></span>
        </label>
        @if(!empty($search))
            <div class="fixed top-0 bottom-0 left-0 right-0" wire:click="emptyProp()"></div>
            <div class="absolute z-10 w-full bg-white rounded-t-none shadow-lg list-group">
                @if(!empty($products))
                    @foreach($products as $i => $product)
                        <a href="#" class="list-item"
                        id="itemId{{ $i }}"
                        data="{{ $product->id }}"
                        x-on:mouseover="itemId = {{ $i }}"
                        x-on:click="$wire.set('selectedId',{{ $product->id }})"
                        x-bind:class="{ 'bg-blue-300' : itemId === {{ $i }} }">
                        {!! str_replace($search,"<span class='bg-yellow-300'>$search</span>",$product->name) !!}
                        {!! str_replace($search,"<span class='bg-yellow-300'>$search</span>",$product->description) !!}
                    </a>
                    @endforeach
                @else
                    <div class="list-item">No results!</div>
                @endif
            </div>
        @endif
    </div>
</div>