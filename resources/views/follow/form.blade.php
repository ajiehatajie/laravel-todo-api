<div class="form-group{{ $errors->has('costumer_id') ? 'has-error' : ''}}">
    {!! Form::label('costumer_id', 'Costumer Id', ['class' => 'control-label']) !!}
    {!! Form::number('costumer_id', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('costumer_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('follow_up') ? 'has-error' : ''}}">
    {!! Form::label('follow_up', 'Follow Up', ['class' => 'control-label']) !!}
    {!! Form::number('follow_up', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('follow_up', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('date_follow') ? 'has-error' : ''}}">
    {!! Form::label('date_follow', 'Date Follow', ['class' => 'control-label']) !!}
    {!! Form::date('date_follow', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('date_follow', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('result') ? 'has-error' : ''}}">
    {!! Form::label('result', 'Result', ['class' => 'control-label']) !!}
    {!! Form::textarea('result', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('result', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
