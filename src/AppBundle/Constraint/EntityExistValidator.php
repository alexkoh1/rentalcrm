<?php
/**
 * Created by PhpStorm.
 * User: tim
 * Date: 6/1/17
 * Time: 10:14 AM
 */

namespace AppBundle\Constraint;


use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

class EntityExistValidator extends ConstraintValidator
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    public function validate($value, Constraint $constraint)
    {
        if (!$constraint instanceof EntityExist) {
            throw new UnexpectedTypeException($constraint, __NAMESPACE__.'\Choice');
        }
        $entity = $this->entityManager->getRepository($constraint->className)->find($value);
        if (!$entity) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ string }}', $value)
                ->addViolation();
        }
    }
}