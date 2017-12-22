<?php
namespace Sonar\Valiable\Console;

use Illuminate\Console\Command;

use Sonar\Valiable\Valiable;

class ValiableClearCommand extends Command
{
    protected $name = 'valiable:clear';
    protected $description = 'clear valiable';
    protected $valiable;
    protected $filesystem;

    public function __construct(Valiable $valiable)
    {
        $this->valiable = $valiable;
        parent::__construct();
    }

    public function handle()
    {
        return $this->fire();
    }

    public function fire()
    {
        $this->valiable->clear();
    }
}

