<!doctype html>
<html lang="en">
  <head>
    <title>Trash</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Customer</a>
               <ul class="nav justify-content-center  ">
                   <li class="nav-item active">
                       <a class="nav-link active" href="{{route('customer.view')}}">Home</a>
                   </li>
                   <li class="nav-item">
                       <a class="nav-link" href="{{url('customer')}}">Add customer</a>
                   </li>
                   <li class="nav-item">
                       <a class="nav-link disabled" href="#">Contact Us</a>
                   </li>
               </ul>
               <form class="form-inline">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
              </form>
        </nav>
        <h3 class="text-center">Trash data</h3>
        <table class="table">

            <thead>
                <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Point</th>
                    <th>gender</th>
                    <th>status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customer as $data)
                <tr>
                    <td scope="row">{{$data->id}}</td>
                    <td scope="row">{{$data->name}}</td>
                    <td scope="row">{{$data->email}}</td>
                    <td scope="row">{{$data->point}}</td>
                    <td scope="row">{{$data->gender}}</td>
                    <td scope="row">
                    @if ($data->status === "1")
                        Active
                        @else
                        Unactive
                    @endif
                    </td>
                  <td><a href="{{route('customer.delete', ['id' => $data->id])}}"><button class="btn btn-danger">Delete</button></a>
                    
                    <a href="{{route('customer.restore', ['id' => $data->id])}}"><button class="btn btn-primary">Restore</button></a></td>  
                  {{-- <td><a href="{{url('/customer/delete')}}/{{$data->id}}"><button class="btn btn-danger">Delete</button></a></td>   --}}
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>