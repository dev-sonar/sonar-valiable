<?php
namespace Sonar\Valiable\Console;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

use Sonar\Valiable\Valiable;

class ValiableImportCommand extends Command
{
    protected $name = 'valiable:import';
    protected $description = 'import valiable from yaml files';
    protected $valiable;
    protected $filesystem;

    public function __construct(Valiable $valiable,Filesystem $filesystem)
    {
        $this->valiable = $valiable;
        $this->filesystem = $filesystem;
        parent::__construct();
    }

    public function fire()
    {
        $path = storage_path('app/sonar_valiables');

        foreach ( $this->filesystem->allFiles($path) as $rec ) {
            $this->valiable->importYaml($this->filesystem->get($rec->getPathname()));
        }
    }

}

