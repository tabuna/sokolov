<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <div class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @for($i=0; $i != count($Elements); $i++)
                <li data-target="#carousel-example-generic" data-slide-to="{{$i}}"
                    class="@if($i == 0)active @endif"></li>
            @endfor
        </ol>
        <div class="carousel-inner" role="listbox">

            @foreach($Elements as $key => $element)

                <div class="item  @if($key == 0) active @endif">
                    <img src="{{$element->img}}" alt="{{$element->title}}">

                    <div class="carousel-caption">
                        <div class="col-md-6">
                        <h2>{{$element->title}}</h2>

                        <p>
                            {{strip_tags($element->desc)}}
                        </p>

                        <p>
                            <a href="/auth/login" class="btn btn-warning">{{trans('main.Order')}}</a>
                            <a href="{{$element->link}}" class="btn btn-primary">{{trans('main.Learn More')}}</a>
                            <a href="/{{App::getLocale()}}/feedback" class="btn btn-warning">{{trans('calc.Detailed quote')}}</a>
                        </p>
                            </div>


                        <div class=" col-md-6 calculate-wrapper">


                            @widget('calcucator',$key)



                        </div>


                    </div>
                </div>

            @endforeach
        </div>
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
