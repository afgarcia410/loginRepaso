@extends('layouts.app')
@section('content')
<h1>Show User</h1>
 <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $index->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Type of user: </strong>
                {{ $index->type }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                {{ $index->email }}
            </div>
        </div>
        <div class="mb-3">
            <a href="{{ url('home/index') }}" class="btn btn-primary">Back</a>
        </div>
@endsection