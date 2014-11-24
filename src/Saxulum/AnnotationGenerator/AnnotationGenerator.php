<?php

namespace Saxulum\AnnotationGenerator;

use Saxulum\AnnotationGenerator\Node\ValueNode\AnnotationNode;

class AnnotationGenerator
{
    /**
     * @param  AnnotationNode $node
     * @return string
     */
    public function simplePrint(AnnotationNode $node)
    {
        return $node->simplePrint();
    }

    /**
     * @param  AnnotationNode $node
     * @return string
     */
    public function prettyPrint(AnnotationNode $node)
    {
        return $node->prettyPrint(0, 4);
    }
}
