<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table = "persons";

    protected $fillable = [

        "firtsName", "lastName", "country",
        "documentNumber", "city", "street",
        "number", "single"

    ];

    protected $hidden = [

        "updated_at", "created_at"

    ];
}
