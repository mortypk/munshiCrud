<div>
    <x-layouts.nav></x-layouts.nav>
    <div class="relative flex items-top justify-center min-h-screen  sm:items-center py-4 sm:pt-0">
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Image</th>
                    <th>Category</th>
                    <th>User</th>
                    <th>Created at</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>
                        <img src="{{ $product->image_path }}" width="50" height="50">
                    </td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->user->name }}</td>
                    <td>{{ $product->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
</div>