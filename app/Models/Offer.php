<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    //

protected $fillable = [ "title",
                        "description",
                        "country",
                        "city",
                        "location",
                        "type",
                        "category",
                        "details",
                        "price",
                        "builtIn",
                        "garage",
                        "area",
                        "agentFees"];
}
