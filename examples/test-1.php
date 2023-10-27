<?php

require_once __DIR__ .'/__init.php';

use LTL\ListMethods\PublicMethods\Interfaces\PublicMethodsListableInterface;
use LTL\ListMethods\PublicMethods\Interfaces\StaticPublicMethodsListableInterface;
use LTL\ListMethods\PublicMethods\Traits\PublicMethodsListable;
use LTL\ListMethods\PublicMethods\Traits\StaticPublicMethodsListable;

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

abstract class B implements StaticPublicMethodsListableInterface
{
    use StaticPublicMethodsListable;

    public function a(string $test): void
    {
    }

    public function b(): string
    {
        return 'test 5';
    }
}


dd(B::getMethods());
