@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">@lang('news.add.add_news')</div>

                    <div class="panel-body">

                        <form class="form-horizontal" method="POST" action="{{ route('save_news') }}">
                            {{ csrf_field() }}
                            @if ($news->id)
                                <input type="hidden" name="id" value="{{$news->id}}" />
                            @endif
                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                <label for="title" class="col-md-4 control-label">@lang('news.add.title')</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control" name="title" value="{{ $news->title }}" required autofocus>

                                    @if ($errors->has('title'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('publish_date') ? ' has-error' : '' }}">

                                <label for="publish_date" class="col-md-4 control-label">@lang('news.add.publish_date')</label>

                                <div class="col-md-6">

                                    <div class="input-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                                        <input type="text" class="form-control" value="{{ date('Y-m-d', !empty($news->publish_date) ? strtotime($news->publish_date) : time()) }}" name="publish_date" id="publish_date">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-th"></span>
                                        </div>
                                    </div>

                                    @if ($errors->has('publish_date'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('publish_date') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('preview_text') ? ' has-error' : '' }}">
                                <label for="preview_text" class="col-md-4 control-label">@lang('news.add.preview_text')</label>

                                <div class="col-md-6">
                                    <textarea id="preview_text" class="form-control" name="preview_text" required rows="3">{{ $news->preview_text }}</textarea>

                                    @if ($errors->has('preview_text'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('preview_text') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('detail_text') ? ' has-error' : '' }}">
                                <label for="detail_text" class="col-md-4 control-label">@lang('news.add.detail_text')</label>

                                <div class="col-md-6">
                                    <textarea id="detail_text" class="form-control" name="detail_text" rows="5">{{ $news->detail_text }}</textarea>

                                    @if ($errors->has('detail_text'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('detail_text') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        @lang('news.add.save')
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection