<?php
namespace Sonar\Valiable\Test;

use Illuminate\Contracts\Container\Container;
use Sonar\Valiable\Valiable;
use Mockery;

require_once __DIR__ . '/functions_app.php';
require_once __DIR__ . '/../src/functions_include.php';

class functionsTest extends TestCase
{
    public function tearDown()
    {
        Mockery::close();
    }
    public function testfunctions()
    {
        $this->assertNull(val('hoge','hoge2'));
        $this->assertNull(val_all('hoge'));
        $this->assertNull(val_table('Table','param',1));
        $this->assertNull(val_table_all('Table','param'));

    }
}
