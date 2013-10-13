<?php

namespace Toa\Bundle\ValidatorBundle\Constraints;

use Toa\Component\Validator\Constraints\Video as BaseConstraint;

/**
 * Video
 *
 * @author Enrico Thies <enrico.thies@gmail.com>
 *
 * @Annotation
 */
class Video extends BaseConstraint
{
    /** @var Toa\Component\Validator\Constraints\VideoValidator */
    public $service = 'toa_validator.validator.video';

    /**
     * {@inheritdoc}
     */
    public function validatedBy()
    {
        return $this->service;
    }
}
