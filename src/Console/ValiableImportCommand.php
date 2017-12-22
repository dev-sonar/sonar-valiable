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
    public function handle()
    {
        return $this->fire();
    }

    public function fire()
    {
        $path = storage_path('app/sonar_valiables');
        $files = $this->filesystem->allFiles($path);

        if ( is_array($files) === false || count($files) == 0 ) {
            throw new \Exception('ファイルが見つかりません。[' . $path . ']');
        }
        foreach ( $files as $rec ) {
            if ( preg_match("/\.yml$/",$rec->getPathname()) ) {
                $this->valiable->importYaml($this->filesystem->get($rec->getPathname()));
            }
        }
    }

}

