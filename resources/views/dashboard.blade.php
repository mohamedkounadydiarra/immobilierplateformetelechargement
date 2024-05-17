@extends('layout/base')
@section('content')
<div class="container">
            <div class="row">

                <!-- Single Event Area -->
                @foreach($article as $articles)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-event-area mb-30">
                        <div class="event-thumbnail">
                            <img src="../userstyle/img/bg-img/e1.jpg" alt="">
                        </div>
                        <div class="event-text">
                            <h4>{{$articles->title}}</h4>
                            <div class="event-meta-data">
                                <a href="#" class="event-place">{{$articles->description}}</a>
                                <a href="#" class="event-date">{{$articles->status}}</a>
                            </div>
                            <a href="" download="{{$articles->video}}" src="public/{{$articles->video}}"><input type="submit" class="btn btn-primary" value="telecharger"></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="paginate">
                {{$article->links()}}
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="load-more-btn text-center mt-70">
                        <a href="#" class="btn oneMusic-btn">Load More <i class="fa fa-angle-double-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
@endsection