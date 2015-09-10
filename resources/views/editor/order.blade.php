@extends('_layout/editor')

@section('content-editor')






    <div class="panel panel-default">
        <div class="panel-heading">Мои задачи</div>
        <table class="table">

            <thead>
            <tr>
                <th>Название работы</th>
                <th>Услуга</th>
                <th>Стоимость</th>
                <th>Срок сдачи</th>
                <th>Управление</th>
            </tr>
            </thead>


            <tbody>
            @foreach($Tasks as $task)


                <tr>
                    <td>{{$task->name}}</td>

                    @if(App::getLocale() == 'ru')
                        <td>{{$task->getGoods->name}}</td>
                    @else
                        <td>{{$task->getGoods->eng_name}}</td>
                    @endif

                    <td>{{$task->price}}</td>
                    <td>{{$task->workfinish}}</td>
                    <td><a href="{{route('editor.order.show', $task->id)}}"> Просмотр</a></td>
                </tr>
            @endforeach

            </tbody>


        </table>
    </div>


    {!! $Tasks->render()!!}












@endsection