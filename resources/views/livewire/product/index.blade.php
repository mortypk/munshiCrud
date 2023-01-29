<div>
    <x-layouts.nav></x-layouts.nav>
    @isset($product)
    <x-theme.modal modalID="productModal">
        <x-theme.modal.header>Product {{ $product->id }} </x-theme.modal.header>
        <x-theme.modal.body>
            <input type="hidden" wire:model="product.id" value="{{ $product->id }}">
            <x-theme.form.group class="mb-1" id="group_inp1" >
                <x-theme.form.group.label>Name</x-theme.form.group.label>
                <x-theme.form.group.input wire:model="product.name">{{ $product->name }}</x-theme.form.group.input>
            </x-theme.form.group>
            <x-theme.form.group class="mb-1" id="group_inp2" >
                <x-theme.form.group.label>Description</x-theme.form.group.label>
                <x-theme.form.group.input wire:model="product.description">{{ $product->description }}</x-theme.form.group.input>
            </x-theme.form.group>
            <x-theme.form.group class="mb-1" id="group_inp3" >
                <x-theme.form.group.label>Price</x-theme.form.group.label>
                <x-theme.form.group.input wire:model="product.price" type="number">{{ $product->price }}</x-theme.form.group.input>
            </x-theme.form.group>
            <x-theme.form.group class="mb-1" id="group_inp4" >
                <x-theme.form.group.label>Stock</x-theme.form.group.label>
                <x-theme.form.group.input wire:model="product.stock" type="number">{{ $product->stock }}</x-theme.form.group.input>
            </x-theme.form.group>
            <div class="flex gap-1 items-center">
                @foreach ($product->tags as $tag)
                <x-theme.form.chip>
                    {{ $tag->name }}
                </x-theme.form.chip>
                @endforeach 
            </div>
        </x-theme.modal.body>
        <x-theme.modal.footer>
            @empty($product->id)                
            <x-theme.form.button-submit wire:click="addProduct()">Save</x-theme.form.button-submit>
            @else
            <x-theme.form.button-submit wire:click="updateProduct()">Update</x-theme.form.button-submit>
            @endempty
        </x-theme.modal.footer>
    </x-theme.modal>
    @endisset
    <x-theme.form.button x-data="" wire:click="newProductModal()">Open Modal</x-theme.form.button>
    <x-theme.card>
        <x-theme.table>
            <x-theme.table.thead>
                <th class="p-1">Name</th>
                <th class="p-1">Description</th>
                <th class="p-1">Price</th>
                <th class="p-1">Stock</th>
                <th class="p-1">Image</th>
                <th class="p-1">Category</th>
                <th class="p-1">User</th>
                <th class="p-1">tags</th>
            </x-theme.table.thead>
            <x-theme.table.tbody>
                @foreach($products as $product)
                <x-theme.table.tr  x-data="" wire:click="editProductModal({{ $product->id }})">
                    <td class="p-1">{{ $product->name }}</td>
                    <td class="p-1">{{ $product->description }}</td>
                    <td class="p-1">{{ $product->price }}</td>
                    <td class="p-1">{{ $product->stock }}</td>
                    <td class="p-1">
                        <img src="{{ $product->image_path }}">
                    </td>
                    <td class="p-1">{{ $product->category->name }}</td>
                    <td class="p-1">{{ $product->user->name }}</td>
                    <td class="flex">
                    @foreach ($product->tags as $tag)
                    <x-theme.form.chip>
                        {{ $tag->name }}
                    </x-theme.form.chip>
                    @endforeach    
                    </td>
                </x-theme.table.tr>
                @endforeach
            </x-theme.table.tbody>
        </x-theme.table>
    <x-theme.card.footer>
        {{ $products->links() }}
    </x-theme.card.footer>
    </x-theme.card>
</div>