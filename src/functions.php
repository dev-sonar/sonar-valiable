<?php
use Illuminate\Support\Str;

function val($param,$key)
{
    app('Sonar\Valiable\Valiable')->getValue($param,$key);
}

function val_all($param)
{
    app('Sonar\Valiable\Valiable')->get($param);
}

function val_table($table,$param,$key)
{
    if ( strtolower($table) != $table ) {
        $table = Str::plural(Str::camel($table));
    }
    app('Sonar\Valiable\Valiable')->getValue($table . '_' . $param,$key);
}

function val_table_all($table,$param)
{
    if ( strtolower($table) != $table ) {
        $table = Str::plural(Str::camel($table));
    }
    app('Sonar\Valiable\Valiable')->get($table . '_' . $param);
}
