@extends('layouts.default')
@section('content')
<div class="col-md-offset-3 col-md-6">  
    <div class="pull-right">
        <a class="btn btn-xs btn-warning" href='{{url("/books/$book->id/edit")}}'>Edit</a>&nbsp;&nbsp;<a class="btn btn-xs btn-danger" href="#">Remove</a>   
    </div>
    <div class="form-group">
        <label for="recipient-name" class="col-form-label">Name:</label>
        <h4><span>{{$book->name}}</span></h4>
        <hr/>
        <br/>
    </div>
    <div class="form-group">
        <label for="recipient-name" class="col-form-label">Edition:</label>
        <h4><span>{{$book->edition}}</span></h4>
        <hr/>
        <br/>
    </div>
    <div class="form-group">
        <label for="recipient-name" class="col-form-label">Cost(&#8358;):</label>
        <h4><span>{{$book->cost}}</span></h4>
        <hr/>
        <br/>
    </div>
    <div class="form-group">
        <label for="recipient-name" class="col-form-label">Pages:</label>
        <h4><span>{{$book->pages}}</span></h4>
        <hr/>
        <br/>
    </div>
</div>
@endsection