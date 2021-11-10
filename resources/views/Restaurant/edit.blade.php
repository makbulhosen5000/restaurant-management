@section('content')
   @extends('Restaurant.home')
   <div class="col-md-6 offset-3 pt-3">
    <form action="{{route('restaurant-update',$restId->id)}} " method="POST" enctype="multipart/form-data">
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
            <label for="my-input">Name</label>
            <input id="my-input" name="name" class="form-control" type="text" value="{{$restId->name}}" required >
        </div>
        <div class="form-group">
            <label for="my-input">Phone</label>
            <input id="my-input" name="phone" class="form-control" type="tel" value="{{$restId->phone}}" required>
        </div>
        <div class="form-group">
            <label for="my-input">E-mail</label>
            <input id="my-input" name="email" class="form-control" type="email" value="{{$restId->email}}" required >
        </div>
        <div class="form-group">
            <label for="my-input">Address</label>
            <input id="my-input" name="address" class="form-control" type="address" value="{{$restId->address}}" required >
        </div>
        <div class="form-group">
            <label for="my-input">Image</label>
            <img src="{{asset('upload/user_images/'.$restId->image)}}" id="image" style="width:433px;height:235px">
            <input id="my-input" name="image"class="form-control" type="file" name="image" id="file" onchange="showImage(this,'image')" value=''>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
        </form>

</div>
@endsection


