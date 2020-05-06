<?php
namespace App\Service;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Controller\ArgumentValueResolverInterface;
use Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadata;

class IsMacArgumentValueResolver implements ArgumentValueResolverInterface {
  public function supports(Request $request, ArgumentMetadata $argument){
    // TODO: Implement supports() method.
  }

  public function resolve(Request $request, ArgumentMetadata $argument){
    // TODO: Implement resolve() method.
  }
}