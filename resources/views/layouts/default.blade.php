<!DOCTYPE html>
<html lang="en">
@include('includes.head')
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <a style="text-decoration:none;" href="{{url('/books')}}"><h2>Jarfluect Shelf</h2></a><br/><br/>
                @yield('content')
            </div>
        </div>
    </div>
    @include('includes.scripts')
</body>
</html>