<?php

namespace Saxulum\AnnotationGenerator\Node\PropertyAssignNode;

use Saxulum\AnnotationGenerator\Node\ValueNode\AbstractValueNode;

class PropertyNode extends AbstractPropertyNode
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
        return $this->name . '=' . $this->node->simplePrint();
    }

    /**
     * @param int $level
     * @param int $tabSize
     * @return string
     */
    public function prettyPrint($level, $tabSize)
    {
        return $this->name . '=' . $this->node->prettyPrint($level, $tabSize);
    }
}