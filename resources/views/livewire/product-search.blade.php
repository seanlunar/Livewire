<div class="container">
    {{-- Do your work, then step back. --}}
    <div class="mb-4">
        <input type="text" wire:model.lazy="search" placeholder="search for products">
    </div>

    <table class="w-full table-auto">
         <thead>
            <tr>
                <th class="px-3 py-2 text-left border bg-grey-100-b-2">ID</th>
                <th class="px-3 py-2 text-left border bg-grey-100-b-2">IMAGE</th>
                <th class="px-3 py-2 text-left border bg-grey-100-b-2">TITLE</th>
                <th class="px-3 py-2 text-left border bg-grey-100-b-2">PRICE</th>


            </tr>
         </thead>
         <tbody>
            @foreach ($products as $product)
             <tr>
                <td class="px-3 py-2 border-b">{{ $product->id }}</td>
                <td class="px-3 py-2 border-b"><img src="{{ $product->image }}" class="w-16" alt=""></td>
                <td class="px-3 py-2 border-b">{{ $product->title }}</td>
                <td class="px-3 py-2 border-b">{{ $product->price }}</td>

             </tr>
            @endforeach
         </tbody>
    </table>
    {{ $products->links() }}
</div>
