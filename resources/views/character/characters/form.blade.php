<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="col-md-4 control-label">{{ 'Name' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="name" type="text" id="name" value="{{ $character->name or ''}}" >
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('m') ? 'has-error' : ''}}">
    <label for="m" class="col-md-4 control-label">{{ 'M' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="m" type="number" id="m" value="{{ $character->m or ''}}" >
        {!! $errors->first('m', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('ws') ? 'has-error' : ''}}">
    <label for="ws" class="col-md-4 control-label">{{ 'Ws' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="ws" type="number" id="ws" value="{{ $character->ws or ''}}" >
        {!! $errors->first('ws', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('bs') ? 'has-error' : ''}}">
    <label for="bs" class="col-md-4 control-label">{{ 'Bs' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="bs" type="number" id="bs" value="{{ $character->bs or ''}}" >
        {!! $errors->first('bs', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('s') ? 'has-error' : ''}}">
    <label for="s" class="col-md-4 control-label">{{ 'S' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="s" type="number" id="s" value="{{ $character->s or ''}}" >
        {!! $errors->first('s', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('t') ? 'has-error' : ''}}">
    <label for="t" class="col-md-4 control-label">{{ 'T' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="t" type="number" id="t" value="{{ $character->t or ''}}" >
        {!! $errors->first('t', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('w') ? 'has-error' : ''}}">
    <label for="w" class="col-md-4 control-label">{{ 'W' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="w" type="number" id="w" value="{{ $character->w or ''}}" >
        {!! $errors->first('w', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('i') ? 'has-error' : ''}}">
    <label for="i" class="col-md-4 control-label">{{ 'I' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="i" type="number" id="i" value="{{ $character->i or ''}}" >
        {!! $errors->first('i', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('a') ? 'has-error' : ''}}">
    <label for="a" class="col-md-4 control-label">{{ 'A' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="a" type="number" id="a" value="{{ $character->a or ''}}" >
        {!! $errors->first('a', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('ld') ? 'has-error' : ''}}">
    <label for="ld" class="col-md-4 control-label">{{ 'Ld' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="ld" type="number" id="ld" value="{{ $character->ld or ''}}" >
        {!! $errors->first('ld', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('sv') ? 'has-error' : ''}}">
    <label for="sv" class="col-md-4 control-label">{{ 'Sv' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="sv" type="number" id="sv" value="{{ $character->sv or ''}}" >
        {!! $errors->first('sv', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('specialRules') ? 'has-error' : ''}}">
    <label for="specialRules" class="col-md-4 control-label">{{ 'Specialrules' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="specialRules" type="text" id="specialRules" value="{{ $character->specialRules or ''}}" >
        {!! $errors->first('specialRules', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('equipment') ? 'has-error' : ''}}">
    <label for="equipment" class="col-md-4 control-label">{{ 'Equipment' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="equipment" type="text" id="equipment" value="{{ $character->equipment or ''}}" >
        {!! $errors->first('equipment', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('xp') ? 'has-error' : ''}}">
    <label for="xp" class="col-md-4 control-label">{{ 'Xp' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="xp" type="number" id="xp" value="{{ $character->xp or ''}}" >
        {!! $errors->first('xp', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
