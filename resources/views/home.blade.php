@extends('app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1>Home</h1>

            <p>
                <a href="{{ route('repository.add') }}" id="add_new_repo" class="btn btn-sm btn-primary">
                    <span class="glyphicon glyphicon-plus"></span>
                    Add a new Repository
                </a>
            </p>

            <p><strong>TODO</strong>: Basic Functionality</p>
            <ul>
                <li>Add Repos from Github</li>
                <li>Add Server Details to Deploy to</li>
                <li>Generate Server SSH Key</li>
                <li>Build Server Structure</li>
                <li>Deploy on request to server</li>
            </ul>
        </div>
    </div>
</div>
@endsection
