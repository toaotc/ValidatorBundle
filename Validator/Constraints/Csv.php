<?php

namespace Toa\Bundle\ValidatorBundle\Validator\Constraints;

use Toa\Component\Validator\Constraints\Csv as BaseCsv;

/**
 * Csv
 *
 * @author Enrico Thies <enrico.thies@gmail.com>
 *
 * @Annotation
 */
class Csv extends BaseCsv
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
