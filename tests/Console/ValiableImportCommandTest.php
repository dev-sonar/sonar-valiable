<?php
namespace Sonar\Valiable\Test\Console;

use Sonar\Valiable\Console\ValiableImportCommand;
use Sonar\Valiable\Test\TestCase;
use Sonar\Valiable\Valiable;

use Illuminate\Filesystem\Filesystem;

use Mockery;

require_once __DIR__ . "/../helpers.php";

class ValiableImportCommandTest extends TestCase
{
    public function __destruct()
    {
        Mockery::close();
    }

    public function __construct()
    {
        $this->valiable = Mockery::mock(Valiable::class);
        $this->file = Mockery::mock(Filesystem::class);
	parent::__construct();
    }

    public function testInstance()
    {
        $obj = new ValiableImportCommand($this->valiable,$this->file);
        $this->assertTrue($obj instanceof ValiableImportCommand);
    }

    public function testFire()
    {
        $mock = Mockery::mock(Stdclass::class);
        $mock->shouldReceive('getPathname')->andReturn('hoge');

        $this->file->shouldReceive('allFiles')->andReturn([$mock]);
        $this->file->shouldReceive('get')->andReturn('hoge');
        $this->valiable->shouldReceive('importYaml')->andReturn(null);

        $obj = new ValiableImportCommand($this->valiable,$this->file);

        $this->assertNull($obj->fire());
    }
    public function testFire2()
    {
        $mock = Mockery::mock(Stdclass::class);
        $mock->shouldReceive('getPathname')->andReturn('hoge.yml');

        $this->file->shouldReceive('allFiles')->andReturn([$mock]);
        $this->file->shouldReceive('get')->andReturn('hoge');
        $this->valiable->shouldReceive('importYaml')->andReturn(null);

        $obj = new ValiableImportCommand($this->valiable,$this->file);

        $this->assertNull($obj->fire());
    }

}
