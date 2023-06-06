<?php

namespace app\SpaceItfip\Controladores;

use Exception;

class Herramientas
{

    /**
     * [obtenerVariablesDeEntorno description]
     * @param  [type] $llave [description]
     * @return [type]      [description]
     */
    public static function obtenerVariablesDeEntorno($llave)
    {
        if (defined('_ENV_CACHE')) {
            /**
             * [$variables description]
             * @var [type]
             */
            $variables = _ENV_CACHE;
        } else {
            /**
             * [$archivo description]
             * @var [type]
             */
            $archivo = [
                'env.php',
                'env.host.php',
            ];
            /**
             * [$_f description]
             * @var integer
             */
            $_f = 0;
            if (!file_exists($archivo[0])
                ||
                'localhost' !== $_SERVER['SERVER_NAME']) {
                $_f = 1;
                if (!file_exists($archivo[1])) {
                    throw new Exception("Los archivos de variables de entorno ($archivo[0], $archivo[1]) no existen. Por favor crearlos");
                }

            }
            $variables = parse_ini_file($archivo[$_f]);
            define('_ENV_CACHE', $variables);
        }
        if (isset($variables[$llave])) {
            return $variables[$llave];
        } else {
            throw new Exception("La llave especificada ($llave) no existen en el archivo de las variables de entorno");
        }

    }

}
