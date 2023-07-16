@include('backend.includes.header')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Product</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Manage</li>
        </ol>
        
        <div class="card mb-4">
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>#sl</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Brand</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#sl</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Brand</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                       @foreach($products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->category_name}}</td>
                            <td>{{$product->brand_name}}</td>
                            <td>{{$product->description}}</td>
                            <td><img src="{{asset('uploads/'.$product->image)}}" height="100" width="100" ></td>
                            <td>{{$product->status}}</td>
                            <td>
                                <a href="{{route('product.edit',$product->id)}}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
                                <a href="{{route('product.delete',$product->id)}}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@include('backend.includes.footer')