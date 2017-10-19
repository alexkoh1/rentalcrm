<?php
namespace AppBundle\Constraint;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Validator\Constraint;

/**
 * Class EntityExist
 * @Annotation
 */
class EntityExist extends Constraint
{
    public $className;
    public $message = 'The string "{{ string }}" contains an illegal character: it can only contain letters or numbers.';

    public function validatedBy()
    {
        return get_class($this).'Validator';
    }
}