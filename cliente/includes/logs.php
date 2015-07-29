<?php

/**
 * Created by PhpStorm.
 * User: Gilberto
 * Date: 27/07/2015
 * Time: 9:59
 */
//$logs = new Logs();

/*class Logs
{
    private $message;
    private $status;

    public function wLog($mensaje, $nivel, $session)
    {

        if ($mensaje == '') {
            return array($this->status => false, $this->message => 'NO_MENSAJE');
        }
        if ($nivel == '') {
            return array($this->status => false, $this->message => 'NO_NIVEL');
        }

        if ($session == '') {
            return array($this->status => false, $this->message => 'NO_SESSION');
        }

        if (($remote_addr = $_SERVER['REMOTE_ADDR']) == '') {
            $remote_addr = "REMOTE_ADDR_UNKNOWN";
        }

        if (($request_uri = $_SERVER['REQUEST_URI']) == '') {
            $request_uri = "REQUEST_URI_UNKNOWN";
        }

        $sql = "INSERT INTO bis_logs (IP, URI, NIVEL, MENSAJE, IDSESSION) VALUES('$remote_addr', '$request_uri','$nivel','$mensaje','$session')";

        $result = mysql_query($sql);

        if ($result) {
            return array($this->status => true);
        } else {
            return array($this->status => false, $this->message => 'No es posible escribir en la base de datos.');
        }
    }
}*/