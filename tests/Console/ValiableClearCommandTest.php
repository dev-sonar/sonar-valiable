<?php
namespace Sonar\Valiable\Test\Console;

use Sonar\Valiable\Console\ValiableClearCommand;
use Sonar\Valiable\Test\TestCase;
use Sonar\Valiable\Valiable;

use Mockery;

require_once __DIR__ . "/../helpers.php";

class ValiableClearCommandTest extends TestCase
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
        $obj = new ValiableClearCommand($this->valiable);
        $this->assertTrue($obj instanceof ValiableClearCommand);
    }

    public function testFire()
    {
        $this->valiable->shouldReceive('clear');

        $obj = new ValiableClearCommand($this->valiable);

        $this->assertNull($obj->fire());
        $this->assertNull($obj->handle());
    }


}
