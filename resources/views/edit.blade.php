<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Barang</title>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 bg-light p-4 rounded-3">
                <h1 style="font-weight: bold; display: flex; justify-content: center; align-self: center">Edit Barang</h1>
                <br>

                <form action="{{route('updateBarang',['id'=>$barang->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('patch')

                    <div class="mb-3">
                        <label for="name" class="form-label" style="font-weight: bold">Name</label>
                        <input name="name" type="text" class="form-control" id="formGroupExampleInput"
                            value="{{$barang->name}}">
                    </div>
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="quantity" class="form-label" style="font-weight: bold">Quantity</label>
                        <input name='quantity' type="numeric" class="form-control" id="formGroupExampleInput"
                            value="{{$barang->quantity}}">
                    </div>
                    @error('quantity')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="price" class="form-label" style="font-weight: bold">Price</label>
                        <input name='price' type="numeric" class="form-control" id="formGroupExampleInput"
                            value="{{$barang->price}}">
                    </div>
                    @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="kategori" class="form-label">
                            Kategori
                        </label>
                        <select
                            name="kategori_id"
                            id="kategori"
                            class="form-select"
                        >
                            @foreach ($kategoris as $kategori)
                                <option value="{{$kategori->id}}" @if ($barang->kategori->id == $kategori->id)
                                    selected
                                @endif>{{$kategori->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div style="display: flex; justify-content: center; align-self: center;"">
                        <button class=" btn btn-success p-2 px-3" type="submit" style="font-weight: bold">
                        <b>Edit</b></button>
                    </div>
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>
</html>
