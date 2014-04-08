<?php

namespace Saxulum\AnnotationGenerator\Node\ValueNode;

use Saxulum\AnnotationGenerator\Node\PropertyAssignNode\AbstractPropertyNode;

class AnnotationNode extends AbstractValueNode
{
    /**
     * @var string
     */
    protected $class;

    /**
     * @var AbstractPropertyNode[]
     */
    protected $nodes;

    /**
     * @param string $class
     * @param AbstractPropertyNode[] $nodes
     * @throws \InvalidArgumentException
     */
    public function __construct($class, array $nodes = array())
    {
        $this->class = (string) $class;

        foreach($nodes as $node) {
            if(!$node instanceof AbstractPropertyNode) {
                throw new \InvalidArgumentException('Only Property Nodes are allowed!');
            }
            $this->nodes[] = $node;
        }
    }

    /**
     * @return string
     */
    public function simplePrint()
    {
        $serialized = '@' . $this->class . '(';
        foreach($this->nodes as $node) {
            $serialized .= $node->simplePrint() . ', ';
        }
        $serialized = substr($serialized, 0, -2) . ')';

        return $serialized;
    }

    /**
     * @param int $level
     * @param int $tabSize
     * @return string
     */
    public function prettyPrint($level, $tabSize)
    {
        $spacesNode = $level * $tabSize;
        $spacesChildNodes = ($level + 1) * $tabSize;

        $serialized = '@' . $this->class . "(\n";
        foreach($this->nodes as $node) {
            $serialized .= str_repeat(' ', $spacesChildNodes) . $node->prettyPrint($level + 1, $tabSize) . ",\n";
        }

        $serialized = substr($serialized, 0, -2) . "\n";

        if($spacesNode) {
            $serialized .= str_repeat(' ', $spacesNode);
        }

        $serialized .= ')';

        return $serialized;
    }
}