<?php

namespace Dannymcc\Redirect\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class Redirect extends Model
{
    protected $table = 'redirects';

    public function getTable()
    {
        return Config::get('redirect.table', $this->table);
    }
}