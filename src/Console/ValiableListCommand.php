<?php
namespace Sonar\Valiable\Console;

use Illuminate\Console\Command;

use Sonar\Valiable\Valiable;

class ValiableListCommand extends Command
{
    protected $name = 'valiable:list';
    protected $description = 'show valiable list';
    protected $valiable;
    protected $filesystem;

    public function __construct(Valiable $valiable)
    {
        $this->valiable = $valiable;
        parent::__construct();
    }

    public function fire()
    {
        $names = $this->valiable->getNames();
        $tmp = [];
        $len = 0;
        foreach ( $names as $name ) {
            $len = strlen($name) > $len ? strlen($name) : $len;
            $tmp[] = [
                'name' => $name,
                'items' => serialize($this->valiable->get($name)),
            ];
        }
        $headers = ['name','items'];
        $this->table($headers,$tmp);
    }
}

