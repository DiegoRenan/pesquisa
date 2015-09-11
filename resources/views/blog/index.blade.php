@extends('app')
@section('content')
    <div class="row">
        <div class="col-sm-9">
            <div class="panel" ng-app="myapp" ng-controller="ContentController">
                <div class="panel-body">
                    <ul id="items" class="timeline" infinite-scroll="contents.nextPage()" infinite-scroll-distance='2' infinite-scroll-disabled='contents.busy'></ul>
                </div>
            </div>
        </div>

        <div class="col-sm-3">
            @include('blog.partials._sidebar')
        </div>
    </div>
@endsection