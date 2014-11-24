<?php

namespace Saxulum\AnnotationGenerator\Node\ValueNode;

class IntegerNode extends AbstractValueNode
{
    /**
     * @var int
     */
    protected $value;

    public function __construct($value)
    {
        $this->value = (int) $value;
    }

    /**
     * @return string
     */
    public function simplePrint()
    {
        return (string) $this->value;
    }

    /**
     * @param  int    $level
     * @param  int    $tabSize
     * @return string
     */
    public function prettyPrint($level, $tabSize)
    {
        return (string) $this->value;
    }
}
