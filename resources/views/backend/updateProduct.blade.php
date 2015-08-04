@extends('backend.layout')
@section('title','New Product Entry Page')


@section('body')
<div class="col-md-12">
<?php
    $currencies = [];
    foreach(\App\currencies::all() as $var){
        $currencies[$var->id] = $var->symbol.' - '.$var->name;
    }
    $vendors = [];
    foreach(\App\User::all() as $var){
        $vendors[$var->id] = $var->firstName.' '.$var->lastName;
    }
    $cities = [];
    foreach(\App\cities::all() as $var){
        $cities[$var->id] = $var->name.' - '.$var->country;
    }
?>
{!! Form::open(['url' => 'admin/products/'.$product->id,'class'=>'form-horizontal','files' => true,'method'=>'put']) !!}

<div class="form-group col-md-6">
    {!! Form::label('SKU') !!}
    {!! Form::text('sku',$product->SKU,['placeholder'=>'Enter a unique alpha numeric value','class'=>'form-control','id'=>'sku']) !!}
</div>
<div class="form-group col-md-6" style="margin-left: 15px">
    {!! Form::label('ALias') !!}
    {!! Form::text('alias',$product->text->alias,['placeholder'=>'Alias','class'=>'form-control']) !!}
</div>
<div class="form-group col-md-6">
    {!! Form::label('Price') !!}
    {!! Form::text('price',$product->price,['placeholder'=>'Enter product price','class'=>'form-control']) !!}
</div>
<div class="form-group col-md-6" style="margin-left: 15px">
    {!! Form::label('Currency') !!}
    {!! Form::select('currency',$currencies,[$product->currency->id],['class'=>'form-control']) !!}
</div>
<div class="form-group col-md-12">
    {!! Form::label('Price Condition') !!}
    {!! Form::text('condition',$product->text->condition,['placeholder'=>'Enter additional condition for price','class'=>'form-control']) !!}
</div>
<div class="form-group col-md-12">
    {!! Form::label('Title') !!}
    {!! Form::text('title',$product->text->title,['placeholder'=>'Enter title of the product','class'=>'form-control']) !!}
</div>
<div class="form-group col-md-12">
    {!! Form::label('Description') !!}
    {!! Form::textarea('description',$product->text->description,['size'=>'80x10','id'=>'description']) !!}
</div>
<div class="form-group col-md-4">
    {!! Form::label('Vendor') !!}
    {!! Form::select('vendor',$vendors,[$product->vendor->id],['class'=>'form-control']) !!}
</div>
<div class="form-group col-md-4" style="margin-left: 15px">
    {!! Form::label('City') !!}
    {!! Form::select('city',$cities,[$product->city->id],['class'=>'form-control']) !!}
</div>
<div id="datetimepicker5" class="col-md-4" style="margin-left: 15px">
    <div class="form-group">
        {!! Form::label('Publish Date') !!}
        {!! Form::text('publishDate',$product->publishDate, ['data-format'=>'dd-MM-yyyy', 'class'=>'form-control add-on', 'placeholder'=>'Publish Date']) !!}
    </div>
</div>
<div class="form-group col-md-12">
    {!! Form::label('Tag') !!}
    {!! Form::text('tag',null,['placeholder'=>'Tag','class'=>'form-control']) !!}
</div>
<div class="form-group col-md-12">
    {!! Form::label('Cover Image') !!}
    {!! Form::file('coverImage'); !!}
</div>
<div class="form-group col-md-12">
    {!! Form::label('Images') !!}
    {!! Form::file('image1'); !!}
    {!! Form::file('image2'); !!}
    {!! Form::file('image3'); !!}
    {!! Form::file('image4'); !!}
    {!! Form::file('image5'); !!}
</div>
<div class="form-group col-md-12">
    <label>
        {!! Form::checkbox('Active',null,$product->active) !!} Active<br/>
    </label>
</div>
<div class="form-group col-md-12">
    {!! Form::submit('Save',['class'=>'btn btn-default']) !!}
</div>

{!! Form::close() !!}
</div>
@stop

@section('script')
    <script src="{!! asset('ckeditor/ckeditor.js') !!}"></script>
    <script>
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace( 'description' );
        $(function() {
            $('#datetimepicker5').datetimepicker({
                pickTime: false
            });
        });
    </script>
@stop