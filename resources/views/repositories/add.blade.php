@extends ('app')

@section ('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <h1>Set up new Repository</h1>

                <form action="{{ route('repository.add') }}" method="post">
                    <input type="hidden" name="_method" value="PUT" />
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                    <div class="form-group">
                        <label for="repository">Repository</label>
                        <select class="form-control" name="repository" id="repository">
                            @foreach ($repositories as $repository)
                                <option value="{{ $repository->full_name }}">{{ $repository->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button class="btn btn-primary" type="submit">
                        <span class="glyphicon glyphicon-plus"></span>
                        Add
                    </button>
                </form>
            </div>
        </div>
    </div>

@endsection
