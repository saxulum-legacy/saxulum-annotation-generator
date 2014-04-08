<?php

namespace Saxulum\AnnotationGenerator\Node\ValueNode;

class StringNode extends AbstractValueNode
{
    /**
     * @var string
     */
    protected $value;

    public function __construct($value)
    {
        $this->value = (string) $value;
    }

    /**
     * @return string
     */
    public function simplePrint()
    {
        return '"' . $this->value . '"';
    }

    /**
     * @param int $level
     * @param int $tabSize
     * @return string
     */
    public function prettyPrint($level, $tabSize)
    {
        return '"' . $this->value . '"';
    }
}