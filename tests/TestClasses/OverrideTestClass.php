<?php

namespace MatthiasWilbrink\TableResolver\tests\TestClasses;

use Illuminate\Database\Eloquent\Model;
use MatthiasWilbrink\TableResolver\Concerns\ResolvesTable;

class OverrideTestClass extends Model
{
    use ResolvesTable;

    protected $table = "other_items";

}
