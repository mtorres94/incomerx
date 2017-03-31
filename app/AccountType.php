<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;

class AccountType extends Model
{
    protected $table = "mst_account_types";

    protected $fillable = [
        'id', 'name'];

    public $timestamps = false;

}
