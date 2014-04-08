<?php

namespace Saxulum\AnnotationGenerator\Node\ValueNode;

use Saxulum\AnnotationGenerator\Node\ArrayElementAssignNode\AbstractArrayElementNode;

class ArrayNode extends AbstractValueNode
{
    /**
     * @var AbstractArrayElementNode[]
     */
    protected $nodes;

    /**
     * @param AbstractArrayElementNode[] $nodes
     * @throws \InvalidArgumentException
     */
    public function __construct(array $nodes = array())
    {
        foreach($nodes as $node) {
            if(!$node instanceof AbstractArrayElementNode) {
                throw new \InvalidArgumentException('Only Array Element Nodes are allowed!');
            }
            $this->nodes[] = $node;
        }
    }

    /**
     * @return string
     */
    public function simplePrint()
    {
        $serialized = '{';
        foreach($this->nodes as $node) {
            $serialized .= $node->simplePrint() . ', ';
        }
        $serialized = substr($serialized, 0, -2) . '}';

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

        $serialized = "{\n";
        foreach($this->nodes as $node) {
            $serialized .= str_repeat(' ', $spacesChildNodes) . $node->prettyPrint($level + 1, $tabSize) . ",\n";
        }

        $serialized = substr($serialized, 0, -2) . "\n";

        if($spacesNode) {
            $serialized .= str_repeat(' ', $spacesNode);
        }

        $serialized .= '}';

        return $serialized;
    }
}