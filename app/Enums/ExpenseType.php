<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class ExpenseType extends Enum
{
    const Viagem =   0;
    const Hospedagem =   1;
    const Alimentação = 2;
    const Uber = 3;
    const Outros = 4;
}
