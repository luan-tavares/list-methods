<?php

namespace LTL\ListMethods\PublicMethods;

use ReflectionClass;
use ReflectionMethod;

abstract class PublicMethods
{
    public static function list(string $class, bool $canBeStatic = false): array
    {
        $reflectionClass = new ReflectionClass($class);

        return self::listPublicMethods($reflectionClass, $canBeStatic);
    }

    private static function listPublicMethods(ReflectionClass $reflectionClass, bool $canBeStatic): array
    {
        $publicMethods = $reflectionClass->getMethods(ReflectionMethod::IS_PUBLIC);

        $list = [];

        foreach ($publicMethods as $reflectionMethod) {
            if (!self::isCorrectMethod($reflectionMethod, $reflectionClass, $canBeStatic)) {
                continue;
            }
            
            $list[] = $reflectionMethod->name;
        }

        return $list;
    }

    private static function isCorrectMethod(ReflectionMethod $reflectionMethod, ReflectionClass $reflectionClass, bool $canBeStatic): bool
    {
        if ($reflectionMethod->isStatic() && !$canBeStatic) {
            return false;
        }

        if ($reflectionMethod->name === 'getMethods') {
            return false;
        }

        if ($reflectionMethod->class !== $reflectionClass->name) {
            return false;
        }
            
        if (substr($reflectionMethod->name, 0, 2) === '__') {
            return false;
        }

        return true;
    }
}
