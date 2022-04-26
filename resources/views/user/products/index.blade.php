<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                
                <div class="p-6 bg-white border-b border-gray-200">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    
                    
                        <section class="section-products">
                            <div class="container">
                                <div class="row justify-content-center text-center">
                                    <div class="col-md-8 col-lg-6">
                                        <div class="header">
                                            <h3>Featured Product</h3>
                                            <h2>Popular Products</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    @foreach ($products as $product)
                                    <!-- Single Product -->
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div id="product-1" class="single-product">
                                            <div class="part-1">
                                                <img src="/image/{{ $product->image }}">
                                                <ul>
                                                    <li><a href="#"><i class="fas fa-shopping-cart"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-heart"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-plus"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-expand"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="part-2">
                                                <h3 class="product-title">{{ $product->name }}</h3>
                                                <h4 class="product-old-price">{{ $product->discount }}</h4>
                                                <h4 class="product-price">{{ $product->price }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                     @endforeach
                                </div>
                            </div>
                        </section>
                    
                    {!! $products->links() !!}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
