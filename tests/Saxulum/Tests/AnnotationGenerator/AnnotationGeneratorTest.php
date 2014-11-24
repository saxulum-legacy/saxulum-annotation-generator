<?php

namespace Saxulum\Tests\AnnotationGenerator;

use Saxulum\AnnotationGenerator\AnnotationGenerator;
use Saxulum\AnnotationGenerator\Node\ArrayElementAssignNode\ArrayKeyLessElementNode;
use Saxulum\AnnotationGenerator\Node\PropertyAssignNode\PropertyNode;
use Saxulum\AnnotationGenerator\Node\ValueNode\AnnotationNode;
use Saxulum\AnnotationGenerator\Node\ValueNode\ArrayNode;
use Saxulum\AnnotationGenerator\Node\ValueNode\BooleanNode;
use Saxulum\AnnotationGenerator\Node\ValueNode\StringNode;

class AnnotationGeneratorTest extends \PHPUnit_Framework_TestCase
{
    public function testNodeGeneration()
    {
        $node = new AnnotationNode('Doctrine\ORM\Mapping\JoinTable', array(
            new PropertyNode('name', new StringNode('users_phonenumbers')),
            new PropertyNode('joinColumns', new ArrayNode(array(
                new ArrayKeyLessElementNode(
                    new AnnotationNode('Doctrine\ORM\Mapping\JoinColumn', array(
                        new PropertyNode('name', new StringNode('user_id')),
                        new PropertyNode('referencedColumnName', new StringNode('id')),
                        new PropertyNode('unique', new BooleanNode(false)),
                        new PropertyNode('nullable', new BooleanNode(true)),
                    ))
                )
            ))),
            new PropertyNode('inverseJoinColumns', new ArrayNode(array(
                new ArrayKeyLessElementNode(
                    new AnnotationNode('Doctrine\ORM\Mapping\JoinColumn', array(
                        new PropertyNode('name', new StringNode('phonenumber_id')),
                        new PropertyNode('referencedColumnName', new StringNode('id')),
                        new PropertyNode('unique', new BooleanNode(true)),
                        new PropertyNode('nullable', new BooleanNode(true)),
                    ))
                )
            )))
        ));

        $generator = new AnnotationGenerator();
        $annotationString = $generator->prettyPrint($node);

        var_dump($annotationString);
    }
}
