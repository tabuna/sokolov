@extends('_layout/site')

@section('content')


<div class="container-fluid  hidden-sm hidden-xs">

    <div class="row">





        {!! htmlBlock::getMainSlider() !!}













    </div>

</div>


<div class="container container-service">


    <div class="text-center">

        <h1>{{trans('main.Services')}}</h1>

    </div>


    <div class="bs-example" data-example-id="thumbnails-with-custom-content">
        <div class="row">


            <div class="col-sm-6 col-md-3">
                <div class="service service-edit">

                    <a href="">
                        <img class="img-hover" src="/img/service-1.png" data-altimg="/img/service-1-hover.png">

                        <h3>{{trans('main.Editing')}}</h3>
                    </a>


                    <div class="caption">
                        <p>{{trans('main.Correcting written
                             English scientific manuscripts
                             and elimination of grammar and
                             spelling mistakes')}}</p>

                    </div>
                </div>
            </div>


            <div class="col-sm-6 col-md-3">
                <div class="service service-edit">

                    <a href="">
                        <img class="img-hover" src="/img/service-2.png" data-altimg="/img/service-2-hover.png">

                        <h3>{{trans('main.Translation')}}</h3>
                    </a>


                    <div class="caption">
                        <p>{{trans('main.We provide technical
                             translation from Russian into
                             English')}}</p>

                    </div>
                </div>
            </div>


            <div class="col-sm-6 col-md-3">
                <div class="service service-edit">

                    <a href="">
                        <img class="img-hover" src="/img/service-3.png" data-altimg="/img/service-3-hover.png">

                        <h3>{{trans('main.Format')}}</h3>
                    </a>


                    <div class="caption">
                        <p>{{trans('main.Fit manuscripts under strict
                             foreign scientific standards
                             magazines')}}</p>

                    </div>
                </div>
            </div>


            <div class="col-sm-6 col-md-3">
                <div class="service service-edit">

                    <a href="">
                        <img class="img-hover" src="/img/service-4.png" data-altimg="/img/service-4-hover.png">

                        <h3>{{trans('main.illustrating')}}</h3>
                    </a>


                    <div class="caption">
                        <p>{{trans('main.Creation of scientific graphics
                             according to the illustrations
                             provided sketch or
                             description')}}</p>

                    </div>
                </div>
            </div>


        </div>
    </div>


</div>






<div class="container why-work hidden-sm hidden-xs">


    <div class="text-center">

        <h1><span>{{trans('main.Work')}}</span></h1>

    </div>

    <div class="row">


        <div class="col-md-3  text-center">
            <h2><span>{{trans('main.You')}}:</span></h2>
        </div>

        <div class="col-md-3">
            <img class="img-responsive" src="/img/infografica-1.png">

            <p class="text-center">{{trans('main.Order services')}}</p>
            <p class="text-center"><span class="glyphicon glyphicon-arrow-down"></span></p>
        </div>

        <div class="col-md-3">
            <img class="img-responsive" src="/img/infografica-2.png">

            <p class="text-center">{{trans('main.To pay for services')}}</p>
            <p class="text-center"><span class="glyphicon glyphicon-arrow-down"></span></p>
        </div>

        <div class="col-md-3">
            <img class="img-responsive" src="/img/infografica-3.png">

            <p class="text-center">{{trans('main.You get ready to work')}}</p>
            <p class="text-center"><span class="glyphicon glyphicon-arrow-down"></span></p>
        </div>

    </div>

    <div class="row">

        <div class="col-md-3 text-center">
            <h2><span>{{trans('main.We')}}:</span></h2>
        </div>

        <div class="col-md-3">
            <img class="img-responsive" src="/img/infografica-4.png">

            <p class="text-center">{{trans('main.We expect the price')}}</p>
        </div>

        <div class="col-md-3">
            <img class="img-responsive" src="/img/infografica-5.png">

            <p class="text-center">{{trans('main.To provide services')}}</p>
        </div>

        <div class="col-md-3">
            <img class="img-responsive" src="/img/infografica-6.png">

            <p class="text-center">{{trans('main.Get Your review')}}</p>
        </div>


    </div>



</div>








<div class="container hidden-sm hidden-xs">


    <p class="h1-about text-center">
        <span>{{trans('main.Advantages')}}</span>
    </p>

    <ol class="text-about">


        <div class="row">
            <ol>
                <li class="li-icons-1 row"><span>1.</span>


                    {{trans("main.We employ only experienced scientific academic editors who are experts in a particular scientific field. All our editors - experts in English grammar, spelling and punctuation.")}}

                </li>


                <li class="li-icons-2 row">
                    <span>2.</span>


                    {{trans("main.Our scientific editors have extensive experience in prestigious academic research institutions. Our editors have a significant number of highly cited publications in scientific journals in English.")}}
                </li>

                <li class="li-icons-3 row">
                    <span>3.</span>
                    {{trans("main.Our scientific editors wrote, edited and reviewed scientific publications and grants.")}}
                </li>

                <li class="li-icons-4 row">
                    <span>4.</span>
                    {{trans("main.We know that you need to publish your important scientific discoveries in the English-language journal. The language barrier should never be a barrier to the spread of important ideas and discoveries! We are here to help you succeed!")}}
                </li>

                <li class="li-icons-5 row">
                    <span>5.</span>
                    {{trans("main.If your research is not published - they never had. Many manuscripts are accepted for publication because of the poor quality of the English language. Our editors - experts in English. Our editors - scientific experts with many years of research and publications in prestigious scientific journals.")}}
                </li>

                <li class="li-icons-6 row">
                    <span>6.</span>
                    {{trans("main.We guarantee that your paper will not be rejected by the scientific journal of the poor quality of the English language. We re-edit your article - free of charge.")}}
                </li>

            </ol>
        </div>

        <p class="text-center">
            <a href="/auth/login" type="button" class="btn btn-warning">{{trans('main.Order')}}</a>
        </p>

    </ol>
</div>

@if($NewsList->count())
<div class="container hidden-xs">


    <div class="text-center">

        <h1>{{trans('main.News')}}</h1>
        <a href="{{URL::route('news.index')}}">{{trans('main.News-sub')}} <span
                    class="glyphicon glyphicon-arrow-right"></span></a>

    </div>


    <div class="news-list">
        <div class="row">

            @foreach($NewsList as $news)
            <div class="col-sm-6 col-md-3">
                <div class="thumbnail">
                    <img src="{{$news->avatar}}">

                    <div class="caption">

                        <a href="{{URL::route('news.show',$news->slug)}}">
                            <h4>{{$news->name}}</h4></a>


                        <p> {{
                                str_limit(strip_tags($news->content), $limit = 100, $end = '...')
                            }}
                        </p>

                        <p><span class="label label-default"> {{$news->created_at}}</span></p>

                    </div>
                </div>
            </div>
            @endforeach


        </div>
    </div>


</div>
@endif


@if($ReviewsList->count())
<div class="container container-reviews hidden-sm hidden-xs">


    <div class="text-center">

        <h1>{{trans('main.Reviews')}}</h1>
        <a href="{{URL::route('review.index')}}">{{trans('main.Reviews-sub')}} <span
                    class="glyphicon glyphicon-arrow-right"></span></a>

    </div>


    <div class="reviews-list">
        <div class="row">


            @foreach($ReviewsList as $reviews)

            <div class="reviews-div col-sm-6 col-md-3">
                <div class="text-center">
                    <img src="{{$reviews->avatar}}" class="img-circle">

                    <div class="caption">
                        <h4>{{$reviews->name}}</h4>

                            <span>{{$reviews->dolshnost}}
                            </span>


                        <p class="date">
                            {{$reviews->created_at}}
                        </p>


                        <p class="text-justify reviews-text">
                            <i class="fa fa-quote-left fa-2x fa-pull-left"></i>
                            {{$reviews->comment}}
                            <i class="fa fa-quote-right fa-2x fa-pull-right"></i>
                        </p>


                    </div>
                </div>
            </div>
            @endforeach


        </div>


    </div>


</div>
@endif

<div class="container-fluid array-top hidden-sm hidden-xs">


    <span class="scroll-top pull-left glyphicon glyphicon-menu-up hidden-sm hidden-xs"></span>

    <span class="scroll-top pull-right glyphicon glyphicon-menu-up hidden-sm hidden-xs"></span>

    <p class="text-center">
        <a href="/auth/login" type="button" class="btn btn-warning">{{trans('main.Order')}}</a>
    </p>


</div>



@endsection