<div>
    <x-layouts.nav></x-layouts.nav>
    <div x-data="" class="relative">
        <input
            type="text"
            class="form-input"
            placeholder="Search Products..."
            wire:model="search"
            wire:keydown.escape="emptyProp"
            wire:keydown.tab="emptyProp"
            wire:keydown.arrow-up="decrementHighlight"
            wire:keydown.arrow-down="incrementHighlight"
            {{-- wire:keydown.enter="selectContact" --}}
        />
          
        @if(!empty($search))
            <div class="fixed top-0 bottom-0 left-0 right-0" wire:click="emptyProp()"></div>
     
            <div class="absolute z-10 w-full bg-white rounded-t-none shadow-lg list-group">
                @if(!empty($products))
                    @foreach($products as $i => $product)
                        <a href="#" class="list-item  {{ $highlightIndex === $i ? 'bg-blue-300' : '' }}"
                        >
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