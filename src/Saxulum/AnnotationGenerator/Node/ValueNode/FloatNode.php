<?php

namespace Saxulum\AnnotationGenerator\Node\ValueNode;

class FloatNode extends AbstractValueNode
{
    /**
     * @var float
     */
    protected $value;

    public function __construct($value)
    {
        $this->value = (float) $value;
    }

    /**
     * @return string
     */
    public function simplePrint()
    {
        return (string) $this->value;
    }

    /**
     * @param int $level
     * @param int $tabSize
     * @return string
     */
    public function prettyPrint($level, $tabSize)
    {
        return (string) $this->value;
    }
}