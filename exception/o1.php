<?php
class ServerLoadException extends Exception
{
};
class NetworkLoadException extends Exception
{
};
class DiskfullException extends Exception
{
};

interface NetworkStorage
{
    function connect();
    function getName();
}

class MySQLServer implements NetworkStorage
{
    private $name;

    function __construct()
    {
        $this->name = 'MySQL';
    }
    function connect()
    {
        throw new DiskfullException;
    }
    function getName()
    {
        return $this->name;
    }
}
class PostgreSQLServer implements NetworkStorage
{
    private $name;

    function __construct()
    {
        $this->name = 'PostgreSQL';
    }
    function connect()
    {
        //  throw new NetworkLoadException;
        return $this;
    }
    function getName()
    {
        return $this->name;
    }
}
class MSSQLServer implements NetworkStorage
{
    public $name;

    function __construct()
    {
        $this->name = 'MSSQL';
    }
    function connect()
    {
        throw new NetworkLoadException;
    }
    function getName()
    {
        return $this->name;
    }
}


class ConnectionPool
{
    private $connection;
    private $storage;
    function __construct()
    {
        $this->storage = array();;
    }

    function addStorage($storage)
    {
        array_push($this->storage, $storage);
    }

    function getStorage()
    {
        return $this->storage;
    }

    function getConnection()
    {
        // var_dump($this->storage);
        foreach ($this->storage as $storage) {
            try {
                $this->connection = $storage->connect();
            } catch (ServerLoadException $e) {
                echo $storage->getName() . " has ServerLoad Exception\n";
            } catch (NetworkLoadException $e) {
                echo $storage->getName() . " has NetworkLoad Exception\n";
            } catch (DiskfullException $e) {
                echo $storage->getName() . " has Diskfull Exception\n";
            }

            if ($this->connection) {
                break;
            }
        }

        if ($this->connection) {
            return $this->connection;
        }
        return false;
    }
}


$server_mysql = new MySQLServer();
$server_postgresql = new PostgreSQLServer();
$server_mssql = new MSSQLServer();
$server_mysql2 = new MySQLServer();

$cp = new ConnectionPool();
$cp->addStorage($server_mysql);
$cp->addStorage($server_mssql);
$cp->addStorage($server_mysql2);
$cp->addStorage($server_postgresql);

$connection = $cp->getConnection();

print_r($cp->getStorage());
