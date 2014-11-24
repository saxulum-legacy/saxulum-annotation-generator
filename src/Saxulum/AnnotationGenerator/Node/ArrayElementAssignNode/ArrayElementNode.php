<?php

namespace Saxulum\AnnotationGenerator\Node\ArrayElementAssignNode;

use Saxulum\AnnotationGenerator\Node\ValueNode\AbstractValueNode;

class ArrayElementNode extends AbstractArrayElementNode
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var AbstractValueNode
     */
    protected $node;

    public function __construct($name, AbstractValueNode $node)
    {
        $this->name = (string) $name;
        $this->node = $node;
    }

    /**
     * @return string
     */
    public function simplePrint()
    {
        return '"' . $this->name . '"=' . $this->node->simplePrint();
    }

    /**
     * @param  int    $level
     * @param  int    $tabSize
     * @return string
     */
    public function prettyPrint($level, $tabSize)
    {
        return '"' . $this->name . '"=' . $this->node->prettyPrint($level, $tabSize);
    }
}
