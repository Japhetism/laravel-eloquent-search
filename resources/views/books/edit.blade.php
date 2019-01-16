@extends('layouts.default')
@section('content')
<div class="col-md-offset-3 col-md-6">
        <form method="post" action='{{url("/books/$book->id/edit")}}'>
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PUT">
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Name:</label>
                <input type="text" class="form-control" name="name"  value="{{$book->name}}" placeholder="SpiderMan" required/>
            </div>
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Edition:</label>
                <input type="text" class="form-control" name="edition" value="{{$book->edition}}" placeholder="10th Edition" required/>
            </div>
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Cost(&#8358;):</label>
                <input type="text" class="form-control" name="cost" value="{{$book->cost}}" placeholder="3400" required/>
            </div>
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Pages:</label>
                <input type="number" class="form-control" name="pages" value="{{$book->pages}}" placeholder="40" required/>
            </div>
            <button class="btn btn-primary pull-right" type="submit">Save Changes</button>
        </form>
    </div>
@endsection