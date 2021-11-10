@section('content')
   @extends('Restaurant.home')

<div class="col-md-6 offset-3 pt-3">
    <form action="{{route('user-register')}}" method="POST"  >
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
        <h1 class="bg-dark text-light text-center mt-5">User Registration Form</h1>
        <label for="">Name</label>
        <input type="text" name="name" id="" value="" class="form-control" placeholder="Enter Your Name" required>
      </div>
      <div class="form-group">
        <label for="">Phone</label>
        <input type="tel" name="phone" id="" value="" class="form-control" placeholder="Enter Your Phone" required>
      </div>
      <div class="form-group">
        <label for="">Email</label>
        <input type="email" name="email" id="" class="form-control" placeholder="Enter Your Email" required >
      </div>
      <div class="form-group">
        <label for="">Password</label>
        <input type="password" name="password" id="" class="form-control" placeholder="Enter Your Password" required >
      </div>
      <div class="form-group text-center">
        <input type="submit"  class="btn btn-success" value="Register">
      </div>
    </form>
</div>
@endsection
