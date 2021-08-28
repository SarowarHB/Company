<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All catagory
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="cart">


                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{session('success')}}</strong> You should check in on some of those fields below.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                        <div class="cartHeader">All Catagory</div>

                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">SL Num</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">User Id</th>
                                <th scope="col">Created At</th>
                                <th scope="col">action</th>
                                </tr>
                            </thead>

                            <tbody>  

                     
                            @foreach($categories as $category)
                            

                                <tr>
                                <th scope="row">{{$categories->firstItem()+$loop->index}}</th>
                                <td>{{ $category->category_name}}</td>
                                <td>{{ $category->user_id }}</td>
                                <td>{{ $category->created_at}}</td>
                                <td>
                                    <a href="{{url('category/edit/'.$category->id)}}" class="btn btn-info">Edit</a>
                                    <a href="{{url('softDelete/category/'.$category->id)}}" class="btn btn-danger">Delete</a>
                                </td>
                                </tr>

                            @endforeach

                            </tbody>
                        </table>
                        {{$categories->links()}}

                   </div>
                </div>

                <div class="col-md-4">
                    <div class="cart">
                        <div class="cartHeader">Add Catagory</div>
                        <div class="catBody">

                        <form action="{{ route('store.category')}}" method="POST">
                            @csrf
                                <div class="form-group">
                                
                                    <label for="inputEmail3">CategoryName</label><br></br>  
                                    
                                    <input type="text" name="category_name" class="form-control" id="inputEmail3">
                                   

                                    @error('category_name')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror

                                </div>

                                <button type="submit" class="btn btn-primary">Add Category</button>
                     </form>
                     </div>
                    </div>
                 </div>
            </div>
        </div>
    </div>



    <!---Trashed Part--->

    <div class="py-12">

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="cart">

                <div class="cartHeader">Trash List</div>

                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">SL Num</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">User</th>
                        <th scope="col">Created At</th>
                        <th scope="col">action</th>
                        </tr>
                    </thead>

                    <tbody>  
                        
                    @foreach($trachCat as $category)

                        <tr>
                        <th scope="row">{{$categories->firstItem()+$loop->index}}</th>
                        <td>{{ $category->category_name}}</td>
                        <td>{{ $category->user_id }}</td>
                        <td>{{ $category->created_at}}</td>
                        <td>
                            <a href="{{url('restore/category/'.$category->id)}}" class="btn btn-info">Restore</a>
                            <a href="{{url('delete/category/'.$category->id)}}" class="btn btn-danger">P.Delete</a>
                        </td>
                        </tr>

                    @endforeach

                    </tbody>
                </table>
                {{$trachCat->links()}}

           </div>
        </div>

      <div class="col-md-4">
    
      </div>
</div>
</x-app-layout>
