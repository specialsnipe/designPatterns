<?php

class Singleton
{
    private static ?self $instance = null;
    private string $name;

    /**
     * @return mixed
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }


    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function __clone(): void
    {
        // TODO: Implement __clone() method.
    }
    public function __wakeup(): void
    {
        // TODO: Implement __wakeup() method.
    }
}

$db = Singleton::getInstance();
$db->setName('db');
print_r($db->getName());
$db1 = Singleton::getInstance();
print_r($db1->getName());




