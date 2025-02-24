<?php
class MyException extends Exception
{
}
;
class NetworkException extends Exception
{
}
;


function testException()
{
    throw new MyException('MyException', 101);
}


try {
    testException();
} catch (NetworkException $e) {
    echo 'NetworkException caught';
} catch (MyException $e) {
    echo 'MyException caught';
    // echo $e->getMessage();
} catch (Exception $e) {
    echo 'Exception caught';
} finally {
    echo "\nFinally I am here";
}