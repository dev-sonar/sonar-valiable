<?php
namespace Sonar\Valiable\Test;

use Illuminate\Contracts\Foundation\Application;
use Illumicate\Contracts\Events\Dispatcher;
use Sonar\Valiable\ValiableServiceProvider;

require_once __DIR__ . "/helpers.php";
use Mockery;

class ValiableServiceProviderTest extends TestCase
{
    public function setUp()
    {
        $this->application = Mockery::mock(Application::class,\ArrayAccess::class);
        $this->event = Mockery::mock(Dispacher::class);
        parent::setUp();
    }
    public function testboot()
    {

        $obj = new ValiableServiceProvider(['events' => $this->event]);
        $this->assertNull($obj->boot());
    }
    public function testprovides()
    {

        $obj = new ValiableServiceProvider(['events' => $this->event]);
        $this->assertEquals($obj->provides(),['sonar_valiable']);
    }

    public function testRegister()
    {
        $this->event->shouldReceive('listen');
        $this->application->shouldReceive('offsetGet')->with('events')->andReturn($this->event);
        $this->application->shouldReceive('singleton');
        $obj = new ValiableServiceProvider($this->application);
       // ['app' => $this->application,'events' => $this->event]);
        $this->assertNull($obj->register());

    }

}
