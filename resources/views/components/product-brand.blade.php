<div class="container mt-5">
    <div class="row">
        @foreach ($product_list as $product)
            <x-product-card :productitem="$product"/>
        @endforeach
    </div>
</div>