<?php

namespace Toa\Bundle\ValidatorBundle\Constraints;

use Toa\Component\Validator\Constraints\Csv as BaseConstraint;

/**
 * Csv
 *
 * @author Enrico Thies <enrico.thies@gmail.com>
 *
 * @Annotation
 */
class Csv extends BaseConstraint
{
    /** @var Toa\Component\Validator\Constraints\CsvValidator */
    public $service = 'toa_validator.validator.csv';

    /**
     * {@inheritdoc}
     */
    public function validatedBy()
    {
        return $this->service;
    }
}
