<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Page</title>
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
                <form action="{{ route('home.update',$post->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="" class="form-label">Gambar</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">

                        <!-- error message untuk title -->
                        @error('image')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                        <small id="helpId" class="text-muted">*2mb</small>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Judul</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                            value="{{ old('title',$post->title) }}" placeholder="Masukkan Judul Post">

                        <!-- error message untuk title -->
                        @error('title')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Konten</label>
                        <textarea id="content" class="form-control @error('content') is-invalid @enderror" name="content" rows="5"
                            placeholder="Masukkan Konten Post">{{ old('content', $post->content) }}</textarea>

                        <!-- error message untuk content -->
                        @error('content')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        var konten = document.getElementById("content");
        CKEDITOR.replace(konten, {
            language: 'en-gb'
        });
        CKEDITOR.config.allowedContent = true;
    </script>
</body>

</html>
