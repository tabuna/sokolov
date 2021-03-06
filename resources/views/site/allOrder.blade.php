@extends('_layout/account')

@section('content-account')


    <div class="panel panel-default">
        <div class="panel-heading">{{trans("order.Your Orders")}}</div>
        <table class="table">

            <thead>
            <tr>
                <th>@sortablelink ('id','#')</th>
                <th>@sortablelink ('created_at',trans("order.Order Date"))</th>
                <th>@sortablelink ('price',trans("order.Total"))</th>
                <th>@sortablelink ('name',trans("order.Title"))</th>
                <th>@sortablelink ('status',trans("order.Status"))</th>
                <th>@sortablelink ('sold',trans('order.Payment Status'))</th>
            </tr>
            </thead>


            <tbody>
            @foreach($Orders as $order)
                <tr>
                    <th scope="row"><a href="{{route(App::getLocale().'.order.show',$order->id)}}">{{$order->act}}</a></th>
                    <td>{{ date("Y-m-d",$order->created_at->tz(Config::get('app.timezone'))->timestamp)}}</td>
                    <td>{{ number_format($order->price,2)}}</td>
                    <td>{{$order->name}}</td>
                    <td>{{ trans('status.' . $order->status)}}</td>

                    <th>
                        @if(!$order->sold && $order->status == 'Не оплачен')
                            <a class="btn btn-default btn-sm"
                               href="{{route(App::getLocale().'.payments.show',$order->id)}}">{{trans('order.Pay')}}</a>
                        @elseif($order->sold)
                            {{trans('order.Paid')}}
                        @else

                        @endif
                    </th>

                </tr>
            @endforeach

            </tbody>


        </table>
    </div>


    {!! $Orders->appends(\Input::except('page'))->render()!!}


@endsection