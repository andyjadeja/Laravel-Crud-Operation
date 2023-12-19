<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Crud Operation - Edit Item</title>
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
              <a class="nav-link " aria-current="page" href="{{ route('view')}}">View Items</a>
              <a class="nav-link active" href="{{ route('add.form')}}">Add Item</a>
              
            </div>
          </div>
        </div>
      </nav>

      <div class="container">

        <div class="d-inline-flex p-2 bd-highlight">
        
        <form method="post" action="{{ route('update.product', $product->id)}}" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <div class="mb-3">
              <label for="productName" class="form-label">Product Name</label>
              <input type="text" name="product_name" class="form-control" id="" value="{{ $product->product_name}}">              
            </div>

            @error('product_name')
            <div class="alert alert-danger mt-2"> {{ $message }}</div>
            @enderror

            <div class="mb-3">
                <label for="productPrice" class="form-label">Product Price</label>
                <input type="number" name="product_price" class="form-control" id="" value="{{ $product->product_price}}">              
            </div>

            @error('product_price')
            <div class="alert alert-danger mt-2"> {{ $message }}</div>
            @enderror

            <img src="{{ URL::asset('/uploads'). '/'. $product->product_image }}" alt="{{$product->product_name}}" 
                    class="img-thumbnail" width="100"> 

            <div class="input-group mb-3">              
                <input type="file" class="form-control" id="inputGroupFile02" name="product_image">
                <label class="input-group-text" for="inputGroupFile02">Upload</label>
              </div>

              @error('product_image')
              <div class="alert alert-danger mt-2"> {{ $message }}</div>
              @enderror

            <button type="submit" class="btn btn-primary">Submit</button>

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
          </form>

         

        </div>

      </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>