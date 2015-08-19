@extends('app')

@section('content')


    <div class="bg-light lter b-b wrapper-md">
        <h1 class="m-n font-thin h3"> Отзывы</h1>
    </div>
    <div class="wrapper-md">
        <div class="panel panel-default">
            <div class="panel-heading">

                <a href="{{URL::route('dashboard.review.create')}}"
                   class="btn btn-link btn-sm"><i class="fa fa-plus"></i> Добавить новую запись </a>
            </div>
            <div class="table-responsive">
                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-striped m-b-none dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                <thead>
                                <tr role="row">
                                    <th>#</th>
                                    <th>Изображение</th>
                                    <th>ФИО</th>
                                    <th>Язык</th>
                                    <th>Дата</th>
                                    <th>Управление</th>
                                </tr>
                                </thead>
                                <tbody>



                                @foreach ($ReviewsList as $Review)
                                    <tr>
                                        <td>{{$Review->id}}</td>
                                        <td><img src="{{$Review->avatar}}" class="img-responsive" width="100px"
                                                 height="50px"></td>
                                        <td>{{ $Review->name }}</td>
                                        <td>{{  $Review->lang }}</td>
                                        <td>{{ $Review->created_at }}</td>


                                        <td class="pull-right">
                                            <a href="{{URL::route('dashboard.review.edit', $Review->id)}}"
                                               class="btn btn-primary"><span class="fa fa-edit"></span> </a>

                                            <form action="{{URL::route('dashboard.review.destroy',$Review->id)}}"
                                                  method="post" class="pull-right">
                                                <input type="hidden" name="_method" value="delete">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <button type="submit" class="btn btn-danger"><span
                                                            class="fa fa-trash-o"></span></button>
                                            </form>
                                        </td>


                                    </tr>
                                @endforeach

                        </tbody>
                        </table>
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-6 text-center">
                        <small class="text-muted inline m-t-sm m-b-sm">Всего элементов: {!! $ReviewsList->count() !!}</small>
                    </div>
                    <div class="col-sm-6 text-right text-center-xs">
                        {!! $ReviewsList->render() !!}
                    </div>
                </div>


            </div>
        </div>
    </div>
    </div>



@endsection
