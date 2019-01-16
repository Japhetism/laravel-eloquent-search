@extends('layouts.default')
@section('content')
<a class="btn btn-sm btn-info pull-right" href="{{url('/books/new')}}">New Book</a><br/><br/><br/>
@if (session('message'))
    <div class="alert alert-success">
        <strong>Success!</strong> {{ session('message') }}.
    </div>
@endif 
<div class="row">
    <form method="post" action="{{url('/books')}}">
        {{csrf_field()}}
        <div class="col-md-2">
            <div class="form-group" id="dynamicInput">
                <label class="control-label">Name</label><br>
                <input class="form-control" type="text" placeholder="Enter book name" name="name" value="{{$searchFields['name']}}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group" id="dynamicInput">
                <label class="control-label">Edition</label><br>
                <input class="form-control" type="text" placeholder="Enter book edition" name="edition" value="{{$searchFields['edition']}}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group" id="dynamicInput">
                <label class="control-label">Cost</label><br>
                <input class="form-control" type="text" placeholder="Enter book cost" name="cost" value="{{$searchFields['cost']}}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group" id="dynamicInput">
                <label class="control-label">Pages</label><br>
                <input class="form-control" type="text" placeholder="Enter book number of pages" name="pages" value="{{$searchFields['pages']}}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group" id="dynamicInput">
                <input class="btn btn-primary" type="submit" name="search" value="Search" style="width:130px; margin-top:25px;">
            </div>
        </div>
    </form>
</div>
<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>Name</th>
            <th>Edition</th>
            <th>Cost(&#8358;)</th>
            <th>Pages</th>
            <th>Date Added</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($books as $book)
            <tr>
                <td>{{$book->name}}</td>
                <td>{{$book->edition}}</td>
                <td>{{$book->cost}}</td>
                <td>{{$book->pages}}</td>
                <td>{{$book->created_at->toDayDateTimeString()}}</td>
                <td>
                <a class="btn btn-xs btn-primary" href='{{url("/books/$book->id")}}'>View</a>
                    <a class="btn btn-xs btn-warning" href='{{url("/books/$book->id/edit")}}'>Edit</a>
                    <a class="btn btn-xs btn-danger" href='{{url("/books/$book->id/delete")}}'>Remove</a>
                </td>
            </tr>
        @endforeach                   
    </tbody>
</table>
@endsection