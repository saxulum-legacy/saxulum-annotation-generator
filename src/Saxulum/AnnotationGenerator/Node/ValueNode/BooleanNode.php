<?php

namespace Saxulum\AnnotationGenerator\Node\ValueNode;

class BooleanNode extends AbstractValueNode
{
    /**
     * @var bool
     */
    protected $value;

    public function __construct($value)
    {
        $this->value = (bool) $value;
    }

    /**
     * @return string
     */
    public function simplePrint()
    {
        return $this->value ? 'true' : 'false';
    }

    /**
     * @param  int    $level
     * @param  int    $tabSize
     * @return string
     */
    public function prettyPrint($level, $tabSize)
    {
        return $this->value ? 'true' : 'false';
    }
}
