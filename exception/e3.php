<?php
/*
excepitons example for connecting database with different servers
*/

class ServerLoadException extends Exception
{
}
;
class NetworkException extends Exception
{
}
;
class StorageException extends Exception
{
}
;

interface NetworkStorage
{
    function getName();
    function connect();
}

class MySQLServer implements NetworkStorage
{
    function getName()
    {
        return 'MySQL';
    }
    function connect()
    {
        throw new ServerLoadException('ServerLoadException', 1001);
    }
}

class PostgreSQLServer implements NetworkStorage
{
    function getName()
    {
        return 'PostgreSQL';
    }
    function connect()
    {
        throw new NetworkException('NetworkException', 1002);
    }
}

class MSSQLServer implements NetworkStorage
{
    function getName()
    {
        return 'MSSQL';
    }
    function connect()
    {
        return $this;
    }
}



class ConnectionPool
{
    private $connection;
    private $storage;
    function __construct($storage)
    {
        $this->storage = $storage;
    }
    // function addStorage(NetworkStorage $storage)
    // {
    //     array_push($this->storage, $storage);
    // }

    function getConnection()
    {
        foreach ($this->storage as $storage) {
            try {
                $this->connection = $storage->connect();
            } catch (NetworkException $e) {
                echo "{$storage->getName()} is busy NetworkException : {$e->getCode()}\n";
            } catch (ServerLoadException $e) {
                echo "{$storage->getName()} is loading ServerLoadException : {$e->getCode()}\n";
            } catch (StorageException $e) {
                echo "{$storage->getName()} is full StorageException : {$e->getCode()}\n";
            }
            if ($this->connection) {
                return $this->connection;
            }
        }
        return false;
    }
}


//create networkstorages
$ns1 = new MySQLServer();
$ns2 = new PostgreSQLServer();
$ns3 = new MSSQLServer();

//get connection
$cp1 = new ConnectionPool([$ns1, $ns2, $ns3]);

// $cp1->addStorage($ns1);
// $cp1->addStorage($ns2);
// $cp1->addStorage($ns3);

var_dump($cp1->getConnection()->getName());

// var_dump($new_pool);