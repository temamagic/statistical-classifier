<?php

namespace Camspiers\StatisticalClassifier\Index;

use PHPUnit_Framework_TestCase;

class IndexTest extends PHPUnit_Framework_TestCase
{
    protected $index;

    protected function setUp()
    {
        $this->index = new Index();
    }

    public function testPrepared()
    {
        $this->assertFalse($this->index->isPrepared());
        $this->index->setPrepared(true);
        $this->assertTrue($this->index->isPrepared());
    }

    public function testData()
    {
        $this->assertNull($this->index->getData());
        $this->index->setData($data = array('test'));
        $this->assertEquals($data, $this->index->getData());
    }

    public function testPartitions()
    {
        $this->assertEquals(array(), $this->index->getPartitions());
        $this->index->setPartition('test', true);
        $this->assertEquals(array('test'), $this->index->getPartitions());
        $this->assertTrue($this->index->getPartition('test'));
        $this->index->removePartition('test');
        $this->assertEquals(array(), $this->index->getPartitions());
    }
    /**
     * @expectedException        RuntimeException
     * @expectedExceptionMessage The index partition 'test' does not exist
     */
    public function testGetPartition()
    {
        $this->index->getPartition('test');
    }
}