@extends('app')

@section('content')


    <div class="bg-light lter b-b wrapper-md">
        <h1 class="m-n font-thin h3">Отзыв: {{ $Reviews->name or '' }}</h1>
    </div>
    <div class="wrapper-md">
        <div class="row">
            <div class="col-sm-12">

                <form class="row" role="form" action="{{URL::route('dashboard.review.update',$Reviews->id)}}"
                      method="post"
                      enctype="multipart/form-data">

                    <div class="col-xs-8">
                        <div class="panel panel-default">
                            <div class="panel-heading font-bold">Содержание</div>
                            <div class="panel-body">


                                <div class="form-group">
                                    <label for="name">ФИО</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                           value="{{ $Reviews->name or '' }}">
                                </div>

                                <div class="line line-dashed b-b line-lg"></div>

                                <div class="form-group">
                                    <label for="country">Страна</label>
                                    <input type="text" class="form-control" name="country" id="country"
                                           value="{{ $Reviews->country or '' }}">
                                </div>

                                <div class="line line-dashed b-b line-lg"></div>

                                <div class="form-group">
                                    <label for="institute">Институт</label>
                                    <input type="text" class="form-control" name="institute" id="institute"
                                           value="{{ $Reviews->institute or '' }}">
                                </div>
                                <div class="line line-dashed b-b line-lg"></div>


                                <div class="form-group">
                                    <label for="dolshnost">Должность</label>
                                    <input type="text" class="form-control" name="dolshnost" id="dolshnost"
                                           value="{{ $Reviews->dolshnost or '' }}">
                                </div>

                                <div class="line line-dashed b-b line-lg"></div>

                                <div class="form-group">
                                    <label for="comment">Содержание</label>
                                    <textarea class="form-control" name="comment" rows="10"
                                              id="comment">{{ $Reviews->comment or '' }}</textarea>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="col-xs-4">

                        <div class="panel panel-default">
                            <div class="panel-heading font-bold">Содержание</div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label>Миниатюра</label>

                                    <div class="form-group text-center">


                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div data-trigger="fileinput" class="fileinput-preview thumbnail"
                                                 style="line-height: 150px;"><img src="{{$Reviews->avatar or ''}}">
                                            </div>

                                            <div>
                                                <span class="btn btn-default btn-file"><span class="fileinput-new">Выбрать изображение</span><span
                                                            class="fileinput-exists">Изменить</span><input type="file"
                                                                                                           name="avatar"
                                                                                                           value="{{$Reviews->avatar or ''}}"></span>
                                                <a href="#" class="btn btn-default fileinput-exists"
                                                   data-dismiss="fileinput">Удалить</a>
                                            </div>
                                        </div>


                                    </div>
                                </div>

                                <div class="line line-dashed b-b line-lg"></div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Опубликовано</label>

                                    <div class="col-sm-8">
                                        <label class="i-switch bg-danger m-t-xs m-r">
                                            <input type="radio" name="publish" value="0"
                                                   @if(!$Reviews->publish) checked="" @endif>
                                            <i></i>
                                        </label>
                                        <label class="i-switch bg-success m-t-xs m-r">
                                            <input type="radio" name="publish" value="1"
                                                   @if($Reviews->publish) checked="" @endif>
                                            <i></i>
                                        </label>
                                    </div>
                                </div>

                                <div class="line line-dashed b-b line-lg"></div>
                                <div class="form-group">
                                    <label>Категория</label>
                                    <select class="form-control w-md" ui-jq="chosen" required name="lang">
                                        <option disabled>Выберите язык</option>
                                        <option value="ru" @if($Reviews->lang == 'ru') selected @endif>Русский</option>
                                        <option value="en" @if($Reviews->lang == 'en') selected @endif>Английский
                                        </option>
                                    </select>
                                </div>

                                <div class="line line-dashed b-b line-lg"></div>

                                <input type="hidden" name="_method" value="PUT">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="btn btn-default">Отправить</button>

                            </div>


                        </div>
                    </div>

                </form>


            </div>

        </div>
    </div>

@endsection

