<?php

interface Str
{
    public function m($data);
}

class Str1 implements Str
{
    public function m($data)
    {
        return 3;
    }
}

class Str2 implements Str
{
    public function m($data)
    {
        return 555;
    }
}

class Service1
{
    /**
     * @var Str
     */
    private $strat;

//    /**
//     * @param Str $strat
//     */
//    public function setStrat($strat)
//    {
//        $this->strat = $strat;
//    }

    public function __construct($str)
    {
        $this->strat = $str;
    }


    public function doSmth($data)
    {
        $this->pripareData($data);

        return $this->strat->m($data);
    }

    private function pripareData($data)
    {
        // ...
    }
}

//$str = new Str1();
//$s = new Service1();
//$s->setStrat($str);
//
//echo $s->doSmth(1).PHP_EOL;
//
//$str2 = new Str2();
//$s->setStrat($str2);


//echo $s->doSmth(1).PHP_EOL;

class Container
{
    public function getService($name)
    {
        $method = 'create'.$name;

        return $this->$method();
    }

    private function createsomeService()
    {
        $str = new Str1();
        return new Service1($str);
    }
}

$container = new Container();

$service = $container->getService('someService');
echo $service->doSmth(1).PHP_EOL;
