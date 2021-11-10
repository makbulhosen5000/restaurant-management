@section('content')
@extends('Restaurant.home')

<h1 class="pt-3">Restaurat List</h1>

    <table class="table text-center table-striped">
        <thead class="table-dark">
            <tr>
                <td>#</td>
                <td>Name</td>
                <td>Phone</td>
                <td>E-mail</td>
                <td>Address</td>
                <td>Image</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>

            @foreach($restaurants as $key=> $restaurant)
            <tr>
                <td>{{($key+1)}}</td>
                <td>{{($restaurant->name)}}</td>
                <td>{{($restaurant->phone)}}</td>
                <td>{{($restaurant->email)}}</td>
                <td>{{($restaurant->address)}}</td>
                <td><img src="{{asset('upload/user_images/'.$restaurant->image)}}" id="image" width="90px";height='100px' alt=""></td>

                <td>
                    <a href="{{route('restaurant-edit',$restaurant->id)}} " title="Edit" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                    <a href="{{route('restaurant-delete',$restaurant->id)}} " id="delete" title="Delete" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection
