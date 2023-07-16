<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Page</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>

<body>

    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="text-center"> {{ $post->title }} </h3>
                </div>
            </div>
            <div class="card-body">
                <div class="text-center">
                    <img src=" {{ asset('/storage/post/'.$post->image) }} " alt="" class="rounded-3">
                </div>
                <div class="fs-3 mt-3">
                    {!!$post->content !!}
                </div>
            </div>
        </div>
    </div>
</body>

</html>
