{{--<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">--}}
    {{--<label for="name" class="col-md-4 control-label">{{ 'Name' }}</label>--}}
    {{--<div class="col-md-6">--}}
        {{--<input class="form-control" name="name" type="text" id="name" value="{{ $user->name or ''}}" >--}}
        {{--{!! $errors->first('name', '<p class="help-block">:message</p>') !!}--}}
    {{--</div>--}}
{{--</div><div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">--}}
    {{--<label for="email" class="col-md-4 control-label">{{ 'Email' }}</label>--}}
    {{--<div class="col-md-6">--}}
        {{--<input class="form-control" name="email" type="email" id="email" value="{{ $user->email or ''}}" >--}}
        {{--{!! $errors->first('email', '<p class="help-block">:message</p>') !!}--}}
    {{--</div>--}}
{{--</div>--}}
{{--</div><div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">--}}
    {{--<label for="email" class="col-md-4 control-label">{{ 'Email' }}</label>--}}
    {{--<div class="col-md-6">--}}
        {{--<input class="form-control" name="email" type="email" id="email" value="{{ $user->email or ''}}" >--}}
        {{--{!! $errors->first('email', '<p class="help-block">:message</p>') !!}--}}
    {{--</div>--}}
{{--</div>--}}

{{--</div><div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">--}}
    {{--<label for="email" class="col-md-4 control-label">{{ 'Email' }}</label>--}}
    {{--<div class="col-md-6">--}}
        {{--<input class="form-control" name="email" type="email" id="email" value="{{ $user->email or ''}}" >--}}
        {{--{!! $errors->first('email', '<p class="help-block">:message</p>') !!}--}}
    {{--</div>--}}
{{--</div>--}}


{{--<div class="form-group">--}}
    {{--<div class="col-md-offset-4 col-md-4">--}}
        {{--<input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">--}}
    {{--</div>--}}
{{--</div>--}}

<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <label for="name" class="col-md-4 control-label">Name</label>

    <div class="col-md-6">
        <input id="name" type="text" class="form-control" name="name" value="{{ $user->name or ''}}" required autofocus>

        @if ($errors->has('name'))
            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    <label for="email" class="col-md-4 control-label">E-Mail Address</label>

    <div class="col-md-6">
        <input id="email" type="email" class="form-control" name="email" value="{{ $user->email or '' }}" required>

        @if ($errors->has('email'))
            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
        @endif
    </div>
</div>

<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <button type="submit" class="btn btn-primary">
            Update
        </button>
    </div>
</div>