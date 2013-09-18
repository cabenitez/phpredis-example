<?php

    $redis = new Redis();
    try {
        $redis->connect('127.0.0.1', 6379);
        $redis->set('saludo', 'Hola Mundo!');
        $saludo_valor = $redis->get('saludo');
        
        if ($saludo_valor){
            echo "<h1>Este es un test de Redis y PHP utilizando el cliente phpredis:</h1>";
            echo "1. La clave 'saludo' almacena el valor: '{$saludo_valor}'.";
            echo "<br />";
            if ($redis->delete('saludo')){
                echo "2. Ahora hemos borrado la clave 'saludo' nuevamente.";
            }
        }else{
            echo "No se ha podido obtener el valor para la clave 'saludo'.";
        }

    } catch (RedisException $e){
        $exceptionMsg = $e->getMessage();
        echo "{$exceptionMsg}. No es posible conectar a Redis";
    }

?>