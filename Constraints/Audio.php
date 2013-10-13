<?php

namespace Toa\Bundle\ValidatorBundle\Constraints;

use Toa\Component\Validator\Constraints\Audio as BaseConstraint;

/**
 * Audio
 *
 * @author Enrico Thies <enrico.thies@gmail.com>
 *
 * @Annotation
 */
class Audio extends BaseConstraint
{
    /** @var Toa\Component\Validator\Constraints\AudioValidator */
    public $service = 'toa_validator.validator.audio';

    /**
     * {@inheritdoc}
     */
    public function validatedBy()
    {
        return $this->service;
    }
}
