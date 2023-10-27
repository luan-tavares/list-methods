<?php

namespace LTL\ListMethods\PublicMethods\Traits;

use LTL\ListMethods\PublicMethods\PublicMethods;

trait StaticPublicMethodsListable
{
    public static function getMethods(): array
    {
        return PublicMethods::list(self::class, true);
    }
}
