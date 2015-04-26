@extends ('app')

@section ('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1>Set up new Repository</h1>

                <select name="" id="">
                    @foreach ($repositories as $repository)
                        <option value="{{ $repository->id }}">{{ $repository->full_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

@endsection
