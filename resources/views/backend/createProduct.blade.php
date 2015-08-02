@extends('backend.layout')
@section('title','New Product Entry Page')


@section('body')
    <!-- Make sure the path to CKEditor is correct. -->
{!! Form::open(array('url' => 'admin/products','class'=>'form-horizontal')) !!}
{!! Form::text('sku',null,['placeholder'=>'SKU','class'=>'form-control']) !!}
{!! Form::text('price',null,['placeholder'=>'Price','class'=>'form-control']) !!}
{!! Form::select('currency',['€'=>'Euro','$'=>'USD'],null,['class'=>'form-control']) !!}
{!! Form::text('title',null,['placeholder'=>'Title','class'=>'form-control']) !!}
{!! Form::text('alias',null,['placeholder'=>'Alias','class'=>'form-control']) !!}
{!! Form::textarea('description','This is my textarea to be replaced with CKEditor.',['size'=>'80x10','id'=>'description']) !!}
{!! Form::select('city',['Munich'=>'Munich','Bangalore'=>'Bangalore'],null,['class'=>'form-control']) !!}
<div id="datetimepicker5">
{!! Form::text('publishDate',null, ['data-format'=>'dd-MM-yyyy', 'class'=>'form-control add-on', 'placeholder'=>'Publish Date']) !!}
</div>
{!! Form::text('tag',null,['placeholder'=>'Tag','class'=>'form-control']) !!}
{!! Form::text('coverImage',null,['placeholder'=>'Cover Image','class'=>'form-control']) !!}
{!! Form::text('vendor',null,['placeholder'=>'Vendor','class'=>'form-control']) !!}
{!! Form::checkbox('Active'); !!} Active<br/>

{!! Form::submit('Save') !!}

{!! Form::close() !!}
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