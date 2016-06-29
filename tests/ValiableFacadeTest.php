<?php
namespace Sonar\Valiable\Test;

use Illuminate\Contracts\Foundation\Application;
use Illumicate\Contracts\Events\Dispatcher;
use Sonar\Valiable\ValiableFacade;

use Mockery;

class ValiableFacadeTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
    }
    public function testboot()
    {
        $this->assertNotNull(ValiableFacade::shouldReceive());
//        $this->assertEquals("sonar_valiable",ValiableFacade::getFacadeAccessor());

    }

}
