<?php

namespace Fabstract\PHPGenerator;

class PHPNamespace
{
    /** @var PHPClass[] */
    public $class_list = [];
    /** @var PHPNamespace[] */
    public $child_namespace_list = [];
    /** @var PHPNamespace */
    public $parent_namespace = null;
    /** @var string */
    public $name = null;

    public function write($root_path)
    {
        foreach ($this->class_list as $class) {
            $class->write($root_path, $this);
        }

        foreach ($this->child_namespace_list as $namespace) {
            $path = $root_path . '/' . $namespace->name;
            self::createFolder($path);
            $namespace->write($path);
        }
    }

    public static function createFolder($path)
    {
        if (!file_exists($path)) {
            mkdir($path);
        }
    }

    public function getNamespacePath()
    {
        $path = $this->name;
        if ($this->parent_namespace !== null) {
            $path = $this->parent_namespace->getNamespacePath() . '\\' . $path;
        }

        return $path;
    }
}
