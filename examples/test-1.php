<?php

require_once __DIR__ .'/__init.php';

use LTL\ListMethods\PublicMethods\Interfaces\PublicMethodsListableInterface;
use LTL\ListMethods\PublicMethods\Traits\PublicMethodsListable;

class A implements PublicMethodsListableInterface
{
    use PublicMethodsListable;

    public function a(string $test): void
    {
    }

    public function b(): string
    {
        return 'test 5';
    }
}

$a = new A;

dd($a->getMethods());
