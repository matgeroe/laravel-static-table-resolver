<?php

namespace MatthiasWilbrink\TableResolver\tests\TestClasses;

use Illuminate\Database\Eloquent\Model;
use MatthiasWilbrink\TableResolver\Concerns\ResolvesTable;

class InheritTestClass extends Model
{
    use ResolvesTable;
}
