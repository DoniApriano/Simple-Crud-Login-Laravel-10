<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>

<body>

    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="text-center">Data</h3>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <a href="{{ route('home.create') }}" class="btn btn-warning m-2">Tambah Data</a>
                    </div>
                    <div class="col-md-6">
                        <form class="m-2 text-end" action="{{ route('logout') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-primary" type="submit">Logout</button>
                        </form>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Image</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Konten</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($posts as $post)
                                <tr class="">
                                    <td class="text-center"> <img width="300px"
                                            src="{{ asset('/storage/post/' . $post->image) }}" alt=""> </td>
                                    <td> {{ $post->title }} </td>
                                    <td> {!! $post->content !!} </td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Yakin?')"
                                            action="{{ route('home.destroy', $post->id) }}" method="post">
                                            <a href=" {{ route('home.show', $post->id) }} "
                                                class="btn btn-primary">Detail</a>
                                            <a href="{{ route('home.edit', $post->id) }}"
                                                class="btn btn-success">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <div class="alert alert-danger" role="alert">
                                    <strong>Belum ada konten</strong>
                                </div>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
