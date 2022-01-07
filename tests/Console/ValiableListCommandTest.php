<?php
namespace Sonar\Valiable\Test\Console;

use Sonar\Valiable\Console\ValiableListCommand;
use Sonar\Valiable\Test\TestCase;
use Sonar\Valiable\Valiable;

use Mockery;

require_once __DIR__ . "/../helpers.php";

class MockValiableListCommand extends ValiableListCommand
{
    public function table($headers, $rows, $tableStyle = 'default', array $columnStyles=array())
    {
        return null;
    }

}

class ValiableListCommandTest extends TestCase
{
    public function __destruct()
    {
        Mockery::close();
    }

    public function __construct()
    {
        $this->valiable = Mockery::mock(Valiable::class);
	parent::__construct();
    }

    public function testInstance()
    {
        $obj = new ValiableListCommand($this->valiable);
        $this->assertTrue($obj instanceof ValiableListCommand);
    }

    public function testFire()
    {
        $this->valiable->shouldReceive('getNames')->andReturn(['hoge' => 1]);
        $this->valiable->shouldReceive('get')->andReturn(1);

        $obj = new MockValiableListCommand($this->valiable);

        $this->assertNull($obj->fire());
        $this->assertNull($obj->handle());

    }


}
