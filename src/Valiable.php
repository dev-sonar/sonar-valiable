<?php
namespace Sonar\Valiable;

use Illuminate\Cache\Repository as Cache;
use Symfony\Component\Yaml\Yaml;

class Valiable
{
    protected $prefix = "sonar_valiable_";
    protected $name_list = "sonar_valiables";
    private $cache;

    public function __construct(Cache $cache)
    {
        $this->cache = $cache;
    }
    public function get($name)
    {
        $data = $this->cache->get($this->prefix . $name);

        return $data ? $this->decode($data) : null;
    }
    public function getValue($name,$key)
    {
        if ( is_null($key) ) {
            throw new \Exception('value is null');
        }
        $data = $this->cache->get($this->prefix . $name);
        if ( ! $data ) return null;

        $data = $this->decode($data);
        if ( isset($data[$key]) === false  ) {
            throw new \Exception('value is not found. key=' . $key);
        }
        return $data[$key];
    }
    public function getNames()
    {
        $names = $this->cache->get($this->name_list);
        if ( $names ) {
            $names = $this->decode($names);
        } else {
            $names = [];
        }
        return $names;
    }
    public function set($name,$data)
    {
        $this->cache->forever($this->prefix . $name,$this->encode($data));
        $this->addNames($name);
    }
    public function importYaml($yaml_data)
    {
        $data = Yaml::parse($yaml_data);
        if ( is_array($data) === false) {
            return;
        }
        foreach ( $data as $name => $rec ) {
            foreach ( $rec as $key => $values ) {
                if ( isset($values['value']) === true) {
                    $this->set($name . '_' . $key,$values['value']);
                } else {
                    throw new \Exception('valueが見つかりません。key=' . $key);
                }
            }
        }
    }
    public function clear()
    {
        $names = $this->getNames();
        if ( count($names) > 0 ) {
            foreach ( $names as $name ) {
                $this->cache->forget($this->prefix . $name);
            }
        }
        $this->cache->forget($this->name_list);
    }
    protected function addNames($name)
    {
        $names = $this->getNames();
        if ( in_array($name,$names) === false ) {
            $names[] = $name;
        }
        $this->cache->forever($this->name_list,$this->encode($names));
    }
    protected function encode($data)
    {
        return base64_encode(serialize($data));
    }
    protected function decode($data)
    {
        return unserialize(base64_decode($data));
    }
}
