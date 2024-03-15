<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
      .imagecontainer{
        display: flex;
        flex-wrap: wrap;
      }
      .imagecontainer img{
        width: 100px;
        border-radius: 50%;
        height: 100px;
        margin-left: 1rem;
      }
    </style>
  </head>
  <body>
      <div class="cotainer">
        <form action="{{url('/uploadimage')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="file" name="image" />
            <button class="btn btn-primary" type="submit">Upload Image</button>
        </form>
       {{--  php artisan storage:link  to generate link in public/storage --}}
       {{-- This command creates a symbolic link from public/storage to storage/app/public. After running this command, you should be able to access your images using the storage disk. --}}
       <div class="imagecontainer">
          @foreach($images as $image)
          <img style="width:50px ,heigth :50px , border-radius: 2rem" src="{{asset('storage/' . $image->image) }}" alt="Image">
          @endforeach
        </div>
       
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>