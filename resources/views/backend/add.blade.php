@include('backend.includes.header')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Product</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Add</li>
        </ol>
        
        <div class="card mb-4">
            <div class="row">
                <div class="col-md-6 offset-md-3 my-2">
                   <form action="{{route('product.save')}}" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="form-control mt-2">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" >
                        </div>
                        <div class="form-control mt-2">
                            <label for="">Category Name</label>
                            <select name="category_name" class="form-control">
                                <option >--select--</option>
                                <option value="Mobile">Mobile</option>
                                <option value="Laptop">Laptop</option>
                                <option value="AC">AC</option>
                                <option value="Fridge">Fridge</option>
                                <option value="TV">TV</option>
                                <option value="Books">Books</option>
                            </select>
                        </div>
                        <div class="form-control mt-2">
                            <label for="">Brand Name</label>
                            <select name="brand_name" class="form-control">
                                <option >--select--</option>
                                <option value="Oppo">Oppo</option>
                                <option value="HP">HP</option>
                                <option value="Asus">Asus</option>
                                <option value="Samsung">Samsung</option>
                                <option value="LG">LG</option>
                                <option value="Sony">Sony</option>
                            </select>
                        </div>
                        <div class="form-control mt-2">
                            <label for="">Description</label>
                            <textarea name="description" class="form-control" rows="5"></textarea>
                        </div>
                        <div class="form-control mt-2">
                            <label for="">Image</label>
                            <input type="file" class="form-control"  name="image">
                        </div>
                        <div class="form-control mt-2">
                            <input type="submit" value="Add" class="form-control btn btn-primary" >
                        </div>
                   </form>
                </div>
            </div>
        </div>
    </div>
</main>
@include('backend.includes.footer')