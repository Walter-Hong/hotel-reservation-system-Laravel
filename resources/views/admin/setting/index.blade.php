@extends('admin.app')

@section('title')
    后台管理-系统设置
@stop

@section('page')
    <div class="row">
        <h1 class="page-header">系统设置</h1>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-btn fa-cog"></i> 这些内容将在各个页面显示
                </div>
                <div class="panel-body">
                    <form action="{{ route('admin.setting.update') }}" method="POST">
                    {!! csrf_field() !!}
                    <!-- Compna field -->
                        <div class="form-group{{ $errors->has('company') ? ' has-error' : '' }}">
                            <label for="company">酒店名称 <i class="required">*</i></label>
                            <input type="text" class="form-control" id="company" name="company"
                                   value="{{ old('company') ?: $setting->company }}">
                            @if ($errors->has('company'))
                                <span class="help-block">
                                <strong>{{ $errors->first('company') }}</strong>
                            </span>
                            @endif
                        </div>
                        <!-- Welcome field -->
                        <div class="form-group{{ $errors->has('welcome_title') ? ' has-error' : '' }}">
                            <label for="welcome_title">图片欢迎语标题 <i class="required">*</i></label>
                            <input type="text" class="form-control" id="welcome_title" name="welcome_title"
                                   value="{{ old('welcome_title') ?: $setting->welcome_title }}">
                            @if ($errors->has('welcome_title'))
                                <span class="help-block">
                                <strong>{{ $errors->first('welcome_title') }}</strong>
                            </span>
                            @endif
                        </div>
                        <!-- Welcome field -->
                        <div class="form-group{{ $errors->has('welcome_content') ? ' has-error' : '' }}">
                            <label for="welcome_content">图片欢迎语内容 <i class="required">*</i></label>
                            <textarea class="form-control" id="welcome_content" name="welcome_content"
                                      rows="3">{{ old('welcome_content') ?: $setting->welcome_content }}</textarea>
                            @if ($errors->has('welcome_content'))
                                <span class="help-block">
                                <strong>{{ $errors->first('welcome_content') }}</strong>
                            </span>
                            @endif
                        </div>
                        <!-- Serve field -->
                        <div class="form-group{{ $errors->has('service_title') ? ' has-error' : '' }}">
                            <label for="service_title">服务标题 <i class="required">*</i></label>
                            <input type="text" class="form-control" id="service_title" name="service_title"
                                   value="{{ old('service_title') ?: $setting->service_title }}">
                            @if ($errors->has('service_title'))
                                <span class="help-block">
                                <strong>{{ $errors->first('service_title') }}</strong>
                            </span>
                            @endif
                        </div>
                        <!-- Serve field -->
                        <div class="form-group{{ $errors->has('service_content') ? ' has-error' : '' }}">
                            <label for="service_content">服务内容 <i class="required">*</i></label>
                            <textarea class="form-control" id="service_content" name="service_content"
                                      rows="3">{{ old('service_content') ?: $setting->service_content }}</textarea>
                            @if ($errors->has('service_content'))
                                <span class="help-block">
                                <strong>{{ $errors->first('service_content') }}</strong>
                            </span>
                            @endif
                        </div>
                        <!-- Weibo field -->
                        <div class="form-group">
                            <label for="weibo">微博</label>
                            <input type="text" class="form-control" id="weibo" name="weibo"
                                   value="{{ old('weibo') ?: $setting->weibo }}">
                        </div>
                        <!-- Fackbook field -->
                        <div class="form-group">
                            <label for="facebook">Facebook</label>
                            <input type="text" class="form-control" id="facebook" name="facebook"
                                   value="{{ old('facebook') ?: $setting->facebook }}">
                        </div>
                        <!-- Twitter field -->
                        <div class="form-group">
                            <label for="twitter">Twitter</label>
                            <input type="text" class="form-control" id="twitter" name="twitter"
                                   value="{{ old('twitter') ?: $setting->twitter }}">
                        </div>
                        <input type="submit" class="btn btn-primary" value="确定">
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop