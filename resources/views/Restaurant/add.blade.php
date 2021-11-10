@section('content')
   @extends('Restaurant.home')
   <div class="col-md-6 offset-3 pt-3">
   <form action="{{route('restaurant-store')}} " method="POST" enctype="multipart/form-data"  >
    @csrf
    @if(Session::has('success'))
        <div class="btn btn-success">{{Session::get('success')}} </div>
     @endif
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="form-group">
        <h1 class="bg-dark text-light text-center">Add Restaurant Name</h1>
        <label for="">Name</label>
        <input type="text" name="name" id="" value="" class="form-control" placeholder="Restaurant Name" required>
      </div>
      <div class="form-group">
        <label for="">Phone</label>
        <input type="tel" name="phone" id="" class="form-control" placeholder="Restaurant Phone" required>

      </div>
      <div class="form-group">
        <label for="">Email</label>
        <input type="email" name="email" id="" class="form-control" placeholder="Restaurant Email" required >

      </div>
      <div class="form-group">
        <label for="">Address</label>
        <input type="address" name="address" id="" class="form-control" placeholder="Restaurant Address" required>

      </div>
      <div class="form-group">
        <label for="">Image</label>
        <input type="file"  name="image" id="image" class="form-control">
      </div>
      <div class="form-group">
        <input type="submit"  class="btn btn-success" value="submin">
      </div>
   </form>
</div>
@endsection
