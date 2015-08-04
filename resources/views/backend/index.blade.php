@extends('backend.layout')
@section('title',ucfirst($tableName)." Table")

@section('body')
<?php
    $keys = $table->toArray();
    if($table->toArray()){
        $keys = array_keys( $table->toArray()[0]);
    }
?>
    <div class="col-md-12">
        <a href="/admin/{!! $tableName !!}/create" class="btn btn-default" style="margin-bottom:15px">Create a new {!! ucfirst($tableName) !!}</a>
        <table class="table  table-striped  table-hover table-bordered table-responsive">
        <?php
            echo "<tr>";
            foreach($keys as $key){
                echo "<th>".ucfirst(preg_replace('/[A-Z]/',' $0',$key))."</th>";
            }
            echo "</tr>";


            foreach($table->toArray() as $row){
                echo "<tr>";

                foreach($row as $val){
                    echo "<td>$val</td>";
                }
                echo "</tr>";
            }
        ?>
        </table>
    </div>
@stop
