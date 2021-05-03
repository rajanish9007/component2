<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-mid-4">
                <div class="product-type">Book</div>

                <div class="card" style="width: 18rem;">
                    <div class="card-body ">
                        {{-- <h5 class="card-title">Card title</h5> --}}
                        <h3 class="card-subtitle mb-2 title">{{ $data->title }}</h3>
                        <p class="card-text">{{ $data->firstname }}</p>
                        <p class="card-text-1">{{ $data->surname }}</p>

                        <p class="card-text-2">${{ $data->price }}</p>
                        <p class="card-text-3">Number of Pages:{{ $data->pages }}</p>
                        <button class="btn btn-dark"><a href="{{ route('showproduct', $data->id) }}"
                                class="button-class">Select</a></button>
                    </div>
                </div>


            </div>
        </div>
    </div>
</body>

</html>
