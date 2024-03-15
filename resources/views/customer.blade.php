<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
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
        </nav>
  @php
      $customer = $customer ?? null;
  @endphp
    {{-- <form action="{{url('/')}}/customer" method="POST"> --}}
    <form action="{{$url}}" method="POST">
        @csrf
        <h1 class="text-center">{{$buttonText}}</h1>
      <div class="form-group">
        <label for="name">Enter your name</label>
        <input type="text" name="name" id="name"value="{{ $customer ? $customer->name : '' }}" class="form-control" placeholder="name" aria-describedby="helpId">
        <span class="text-danger">
            @error('name')
                {{$message}}
            @enderror
        </span>
      </div>
      <div class="form-group">
        <label for="point">Enter your point</label>
        <input type="number" name="point" id="name" value="{{ $customer ? $customer->point : '' }}" class="form-control" placeholder="point" aria-describedby="helpId">
       
      </div>
      <div class="form-group">
        <label for="name">Enter your email</label>
        <input type="email" name="email" id="name" value="{{ $customer ? $customer->email : '' }}" class="form-control" placeholder="email" aria-describedby="helpId">
        <span class="text-danger">
            @error('name')
                {{$message}}
            @enderror
        </span>
      </div>
      <div class="form-group">
        <label for="password">Enter your password</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="password" aria-describedby="helpId">
        {{-- <small id="helpId" class="text-muted">Help text</small> --}}
      </div>
      <div class="form-group">
        <label for="gender">Enter your gender</label>
        <input type="text" name="gender" id="gender" class="form-control"value="{{ $customer ? $customer->gender : '' }}"placeholder="male female other" aria-describedby="helpId">
        {{-- <small id="helpId" class="text-muted">Help text</small> --}}
      </div>
      <input type="submit" class="btn btn-primary" value="{{$buttonText}}">
    </form>
    
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>