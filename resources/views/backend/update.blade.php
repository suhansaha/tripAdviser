@extends('backend.layout')
@section('title',ucfirst($tableName)." Table")

@section('body')
    <div class="col-md-6 col-md-offset-3">
        {!! Form::open(array('url' => 'admin/'.$tableName.'/'.$table->id,'class'=>'form-horizontal','method'=>'put')) !!}

@foreach( $fillables as $field)
        <?php
            $label = ucfirst(preg_replace('/[A-Z]/',' $0',$field));
        ?>
        <div class="form-group">
            {!! Form::label($label, null,['id' => $field."Label",'class'=>'col-sm-3 control-label']) !!}
            <div class="col-sm-9">
    @if($field == "password")
                {!! Form::password($field,['id' => $field,'placeholder' => $label,'class'=>'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('confirm '.$label, null,['id' => $field."LabelCnf",'class'=>'col-sm-3 control-label']) !!}
            <div class="col-sm-9">
                {!! Form::password($field."cnf",['id' => $field."cnf",'placeholder' => "Repeat ".$label,'class'=>'form-control']) !!}
    @else
                {!! Form::text($field, $table->$field,['id' => $field,'placeholder' => $label,'class'=>'form-control']) !!}
    @endif
            </div>
        </div>
@endforeach

        {!! Form::hidden('tableName', $tableName) !!}
        {!! Form::submit('submit') !!}

        {!! Form::close() !!}
    </div>
@stop
