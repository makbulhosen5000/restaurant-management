@section('content')
   @extends('Restaurant.home')

<div class="col-md-6 offset-3 pt-3">
    <form action="{{route('user-login')}} " method="POST"  >
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
        <h1 class="bg-dark text-light text-center mt-5">User Login Form</h1>
      </div>
      <div class="form-group">
        <label for="">Email</label>
        <input type="email" name="email" id="" class="form-control" placeholder="Enter User Email" required >
      </div>
      <div class="form-group">
        <label for="">Password</label>
        <input type="password" name="password" id="" class="form-control" placeholder="Enter User Password" required >
      </div>
      <div class="form-group text-center">
        <input type="submit"  class="btn btn-success" value="Register">
      </div>
    </form>
</div>
@endsection
