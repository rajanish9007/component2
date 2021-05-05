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
            <div class="col-md-12">
                @foreach ($data as $d)
                    <div class="col-md-4">
                        <form action="{{ route('update',$d['id']) }}" method="POST">
                            @csrf
                            {{ method_field('PUT') }}

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="producttype">product type</label>
                                    <select id="producttype" name="producttype" class="form-control">
                                        @if ($d['producttype']=='book')
                                        <option>book</option>
                                        <option>cd</option>

                                        @elseif($d['producttype']=='cd')
                                        <option>cd</option>
                                        <option>book</option>
                                            
                                        @endif
                                        

                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="title">title</label>
                                    <input type="text" class="form-control" name="title" id="title"
                                        placeholder="{{ $d['title'] }}" value="{{ $d['title'] }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="firstname">first name</label>
                                    <input type="text" class="form-control" name="firstname" id="firstname"
                                        placeholder="{{ $d['firstname'] }}" value="{{ $d['firstname'] }}">
                                </div>
                                <div class="form-group col-md-6">
                                    {{-- <label for="firstname">first name</label> --}}
                                    <input hidden  type="text" class="form-control" name="id" id="id"
                                        placeholder="{{ $d['id'] }}" value="{{ $d['id'] }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="surname">surname/brand</label>
                                <input type="text" class="form-control" name="surname" id="surname"
                                    placeholder="{{ $d['surname'] }}" value="{{ $d['surname'] }}">
                            </div>
                            <div class="form-group">
                                <label for="price">price</label>
                                <input type="text" class="form-control" name="price" id="price"
                                    placeholder="{{ $d['price'] }}" value="{{ $d['price'] }}">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="pages">pages/playlength</label>
                                    <input type="text" name="pages" class="form-control" id="pages"
                                        placeholder="{{ $d['pages'] }}" value="{{ $d['pages'] }}">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                            
                        </form>
                        <button type="submit" class="btn btn-danger"><a class="a-tag"
                                    href="{{route('delete',$d['id'])}}" style="">Delete</a></button>
                    </div>

                @endforeach
            </div>
        </div>
    </div>
</body>

</html>
