<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=200px, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <title>component2</title>
</head>

<body>
    <div class="container">
        <div class="row">

            <div class="col-md-4">
                <div class="product-type">Book</div>

                @foreach ($bookdata as $data)
                    <div class="card" style="width: 18rem;">
                        <div class="card-body ">
                            {{-- <h5 class="card-title">Card title</h5> --}}
                            <h3 class="card-subtitle mb-2 title">{{ $data->title }}</h3>
                            <p class="card-text">{{ $data->firstname }}</p>
                            <p class="card-text-1">{{ $data->surname }}</p>

                            <p class="card-text-2">${{ $data->price }}</p>
                            <p class="card-text-3">Number of Pages:{{ $data->pages }}</p>
                            <button class="btn btn-dark"><a href="{{route('showproduct',$data->id)}}" class="button-class">Select</a></button>
                        </div>
                    </div>
                @endforeach


            </div>

            <div class="col-md-4">
                <div class="product-type">CD</div>

                @foreach ($cddata as $data)
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            {{-- <h5 class="card-title">Card title</h5> --}}
                            <h3 class="card-subtitle mb-2 title">{{ $data->title }}</h3>
                            <p class="card-text">{{ $data->firstname }}</p>
                            <p class="card-text-1">{{ $data->surname }}</p>
                            <p class="card-text-2">${{ $data->price }}</p>
                            <p class="card-text-3">Play Length:{{ $data->pages }}</p>
                            <button class="btn btn-dark"><a href="{{route('showproduct',$data->id)}}" class="button-class">Select</a></button>
                        </div>
                    </div>

                @endforeach

            </div>





            <div class="col-md-4">
                <form action="{{ route('store') }}" method="POST">
                    @csrf

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="producttype">product type</label>
                            <select id="producttype" name="producttype" class="form-control">
                                {{-- <option selected>Choose...</option> --}}
                                <option>book</option>
                                <option>cd</option>

                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="title">title</label>
                            <input type="text" class="form-control" name="title" id="title"
                                placeholder="enter your title">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="firstname">first name</label>
                            <input type="text" class="form-control" name="firstname" id="firstname"
                                placeholder="first name">
                        </div>
                        <div class="form-group col-md-6">
                            {{-- <label for="firstname">first name</label> --}}
                            <input hidden type="text" class="form-control" name="id" id="id"
                                placeholder="first name" value="{{uniqid()}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="surname">surname/brand</label>
                        <input type="text" class="form-control" name="surname" id="surname" placeholder="surname/brand">
                    </div>
                    <div class="form-group">
                        <label for="price">price</label>
                        <input type="text" class="form-control" name="price" id="price" placeholder="$price">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="pages">pages/playlength</label>
                            <input type="text" name="pages" class="form-control" id="pages">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">create</button>
                </form>
            </div>



        </div>
    </div>
</body>

</html>
