<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Crud Operation - View Items</title>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Crud Operation</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-link active" aria-current="page" href="{{ route('view')}}">View Items</a>
              <a class="nav-link" href="{{ route('add.form')}}">Add Item</a>
            </div>
          </div>
        </div>
      </nav>

      <div class="container">

        <table class="table">
            <thead>
              <tr> <!--Headings  -->
                <th scope="col">#</th>
                <th scope="col">Product Name</th>
                <th scope="col">Product Price</th>
                <th scope="col">Product Image</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            @foreach ($products as $product)
            <tr>
                <th scope="row">{{ $product->id }}</th>
                <td>{{ $product->product_name }}</td>
                <td>{{ $product->product_price }}</td>
                <td>
                    <img src="{{ URL::asset('/uploads'). '/'. $product->product_image }}" alt="{{ $product->product_name }}" 
                        class="img-thumbnail" width="100">
                </td>
                <td>
                    <a href="{{ route('edit.form', $product->id) }}" class="btn btn-warning btn-sm m-1">Edit</a>
                    <form action="{{ route('delete.product', $product->id) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger btn-sm m-1">Delete</button>
                    </form>
                </td>
            </tr>       
           @endforeach
            
            @if (Session::has('success'))
            <div class="alert alert-success mt-4" role="alert">
                {{ Session('success')}}
            </div>             
            @endif

            @if (Session::has('error'))
            <div class="alert alert-danger mt-4" role="alert">
                {{ Session('error')}}
            </div>             
                @endif
          </table>

          <div class="row">
            {{ $products->links('pagination::bootstrap-4')}}
          </div>

      </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>