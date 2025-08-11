<div class="container mt-5">
    <div class="container mx-auto p-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
        @foreach ($product_list as $product)
            <x-product-card :productitem="$product"/>
        @endforeach
    </div>
</div>
</div>
