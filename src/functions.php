<?php
use Illuminate\Support\Str;

function val($param,$key)
{
    app('sonar_valiable')->getValue($param,$key);
}

function val_all($param)
{
    app('sonar_valiable')->get($param);
}

function val_table($table,$param,$key)
{
    if ( strtolower($table) != $table ) {
        $table = Str::plural(Str::camel($table));
    }
    app('sonar_valiable')->getValue($table . '_' . $param,$key);
}

function val_table_all($table,$param)
{
    if ( strtolower($table) != $table ) {
        $table = Str::plural(Str::camel($table));
    }
    app('sonar_valiable')->get($table . '_' . $param);
}
