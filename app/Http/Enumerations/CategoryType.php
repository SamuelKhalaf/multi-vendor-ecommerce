<?php
namespace App\Http\Enumerations;

use Illuminate\Validation\Rules\Enum;

final class CategoryType extends Enum
{
    const mainCategory = 1;
    const subCategory = 2;

}
