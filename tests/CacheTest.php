<?php

use PHPUnit\Framework\TestCase;

class CacheTest extends TestCase
{
    public function testCheckCache()
    {
        $cache = new Cache();
        $this->assertInstanceOf(Cache::class, $cache);
    }

    public function testSetCache()
    {
        $cache = new Cache();
        $result = $cache->set('test', 'test');

        $this->assertEquals(true, $result);
    }

    public function testGetCache()
    {
        $cache = new Cache();
        $result = $cache->get('test');

        $this->assertEquals('test', $result);
    }

}