<?php
namespace Sonar\Valiable\Test;

use Sonar\Valiable\Valiable;
use Mockery;

class ValiableTest extends TestCase
{
    protected $cache;

    public function setUp()
    {
        parent::setUp();
        $this->cache = Mockery::mock('Illuminate\Contracts\Cache\Repository');
    }
    public function tearDown()
    {
        Mockery::close();
    }

    public function testInstance()
    {
        $obj = new Valiable($this->cache);
        $this->assertTrue($obj instanceof Valiable);
    }
    public function testget()
    {
        $this->cache->shouldReceive('get')->andReturn(base64_encode(serialize(1)));
        $obj = new Valiable($this->cache);
        $this->assertEquals($obj->get('hoge'),1);
    }
    public function testgetValue()
    {
        $this->cache->shouldReceive('get')->andReturn(base64_encode(serialize(['a' => '1','b' => 2])));
        $obj = new Valiable($this->cache);
        $this->assertEquals($obj->getValue('hoge','a'),1);
    }
    /**
     * @expectedException Exception
     */
    public function testgetValueException1()
    {
        $this->cache->shouldReceive('get')->andReturn(base64_encode(serialize(['a' => '1','b' => 2])));
        $obj = new Valiable($this->cache);
        $this->assertEquals($obj->getValue('hoge',null),1);
    }
    /**
     * @expectedException Exception
     */
    public function testgetValueException2()
    {
        $this->cache->shouldReceive('get')->andReturn(base64_encode(serialize(['a' => '1','b' => 2])));
        $obj = new Valiable($this->cache);
        $this->assertEquals($obj->getValue('hoge','c'),1);
    }

    public function testgetNames()
    {
        $this->cache->shouldReceive('get')->andReturn(base64_encode(serialize(1)));
        $obj = new Valiable($this->cache);
        $this->assertEquals($obj->getNames('hoge'),1);
    }

    public function testgetNames2()
    {
        $this->cache->shouldReceive('get')->andReturn(null);
        $obj = new Valiable($this->cache);
        $this->assertEquals($obj->getNames('hoge'),[]);
    }
    public function testset()
    {
        $this->cache->shouldReceive('forever')->andReturn(null);
        $this->cache->shouldReceive('get')->andReturn(null);
        $obj = new Valiable($this->cache);
        $this->assertNull($obj->set('hoge',1));
    }
    public function testimportYaml()
    {
        $a = <<<__EOD__
accounts:
  is_lock:
    name: "test"
    value:
      "1": "test"
__EOD__;
        $this->cache->shouldReceive('forever')->andReturn(null);
        $this->cache->shouldReceive('get')->andReturn(null);
        $obj = new Valiable($this->cache);
        $this->assertNull($obj->importYaml($a));
    }
    public function testclear()
    {
        $this->cache->shouldReceive('get')->andReturn(base64_encode(serialize(['a' => '1','b' => 2])));
        $this->cache->shouldReceive('forget')->andReturn(null);
        $obj = new Valiable($this->cache);
        $this->assertNull($obj->clear());

    }


}
