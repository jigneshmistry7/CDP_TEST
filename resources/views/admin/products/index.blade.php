<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('admin.products.create') }}"> Create New Product</a>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    
                    <table class="table table-bordered">
                        <tr>
                            <th>No</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Discount</th>
                            <th>Description</th>
                            <th width="280px">Action</th>
                        </tr>
                        @foreach ($products as $product)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td><img src="/image/{{ $product->image }}" width="100px"></td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->discount }}</td>
                            <td>{{ substr($product->description,0,100).'...' }}</td>
                            <td>
                                <form action="{{ route('admin.products.destroy',['id' => $product->id]) }}" method="POST">
                    
                                    
                    
                                    <a class="btn btn-primary" href="{{ route('admin.products.edit',['id' => $product->id]) }}">Edit</a>
                                    @if($product->status == 1)
                                    <a class="btn btn-primary" href="{{ route('admin.products.deactivate',['id' => $product->id]) }}">Disable</a>
                                    @else
                                    <a class="btn btn-primary" href="{{ route('admin.products.activate',['id' => $product->id]) }}">Enable</a>

                                    @endif
                                    @csrf
                                    @method('DELETE')
                        
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    
                    {!! $products->links() !!}
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
