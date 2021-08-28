<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Category
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="container">
            <div class="row">
                

                <div class="col-md-8">
                    <div class="cart">
                        <div class="cartHeader">Edit Category</div>
                        <div class="catBody">

                        <form action="{{ url('category/update/'.$categories->id)}}" method="POST">
                            @csrf
                                <div class="form-group">
                                
                                    <label for="inputEmail3">Edit Category</label><br></br>  
                                    
                                    <input type="text" name="category_name" class="form-control" id="inputEmail3"
                                     value="{{$categories->category_name}}">
                                   

                                    @error('category_name')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror

                                </div>

                                <button type="submit" class="btn btn-primary">Edit Category</button>
                     </form>
                     </div>
                    </div>
                 </div>
            </div>
        </div>
    </div>
</x-app-layout>
