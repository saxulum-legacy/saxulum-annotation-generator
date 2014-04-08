<?php

namespace Saxulum\AnnotationGenerator\Node;

interface NodeInterface
{
    /**
     * @return string
     */
    public function simplePrint();

    /**
     * @param int $level
     * @param int $tabSize
     * @return string
     */
    public function prettyPrint($level, $tabSize);
}