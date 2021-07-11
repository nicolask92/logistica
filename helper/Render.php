<?php

include_once 'helper/SessionManager.php';

class Render{
    private $mustache;

    public function __construct($partialsPathLoader){
        Mustache_Autoloader::register();
        $this->mustache = new Mustache_Engine(
            array(
            'partials_loader' => new Mustache_Loader_FilesystemLoader( $partialsPathLoader )
        ));
    }

    public function render($contentFile , $data = array() ){
        $sm = new SessionManager();
        if ($sm->chequearSesion()) {
            $data[$_SESSION['rol']] = true;
            $data['nombreCompleto'] = $_SESSION['nombreCompleto'];
        }
        $contentAsString =  file_get_contents($contentFile);
        return  $this->mustache->render($contentAsString, $data);
    }
}