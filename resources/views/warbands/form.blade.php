<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="col-md-4 control-label">{{ 'Name' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="name" type="text" id="name" value="{{ $warband->name or ''}}" >
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="{{ $errors->has('users') ? 'has-error' : ''}}">
    <label hidden for="user_id">{{ 'User_id' }}</label>
        <input  name="user_id" type="hidden" id="user_id" value="{{ Auth::user()->id}}" >
        {!! $errors->first('user', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('rating') ? 'has-error' : ''}}">
    <label for="rating" class="col-md-4 control-label">{{ 'Rating' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="rating" type="number" id="rating" value="{{ $warband->rating or ''}}" >
        {!! $errors->first('rating', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('type') ? 'has-error' : ''}}">
    <label for="type_id" class="col-md-4 control-label">{{ 'Type' }}</label>
    <div class="col-md-6">
        <select name="type_id" class="form-control" id="type_id">
            @foreach ($types as $item)
                <option value="{{$item->id}}">{{ $item->name }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group {{ $errors->has('type') ? 'has-error' : ''}}">
    <label for="type_id" class="col-md-4 control-label">{{ 'Active' }}</label>
    <div class="col-md-6">
    <select name="active" id="active" class="form-control">
        <option value="1">Active</option>
        <option value="0">Inactive</option>
    </select>
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
