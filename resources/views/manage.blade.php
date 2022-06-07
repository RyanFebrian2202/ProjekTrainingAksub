<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inventory Management</title>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <br><br>
    <div class="container bg-light rounded-3 pt-2 pb-2">
        <div class="col-md-12 bg-light table-wrapper">
            <h3 style="font-weight: bold"><i class="uil uil-apps"></i> Manage Barang</h3>
            <hr>

            {{-- Menu Bar --}}
            <header>
                <a href="{{route('addPage')}}" class="btn btn-dark btn-sm mb-4" style="font-weight: bold">Tambah Barang</a>
                <form class="d-flex" method="">
                    <div class="search" style="display: flex">
                        <input class="form-control me-2" name="search" type="search" placeholder="Cari Barang"
                            aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </div>
                </form>
            </header>
            <br><br>

            {{-- Manage Barang --}}
            <table class="table">
                <thead>
                    <tr align="center">
                        <th>#</th>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $nomor = 1;
                    ?>
                    @foreach ($barangs as $barang)
                    <tr align="center">
                        <th>{{$nomor++}}</th>
                        <td>{{$barang->name}}</td>
                        <td>{{$barang->quantity}}</td>
                        <td>{{$barang->price}}</td>
                        <td class="aksi" style="display: flex; justify-content: center; align-content: center; gap: 5px">
                            <a class="edit" href="{{route('updatePage',['id'=>$barang->id])}}"><button type="submit"
                                    class="btn btn-success"><i class="uil uil-edit"></i></button></a>
                            <form action="{{route('deleteBarang',['id'=>$barang->id])}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger"><i class="uil uil-times-square"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>
</html>
