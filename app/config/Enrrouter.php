<?php 

class Enrrouter{

    public function __construct()

    {
        try {
            $url = $this->getUrl();

            $className = isset($url[0]) && !empty($url[0]) ? $url[0] . "Controller" : "HomeController";
            $methosName = isset($url[1]) && !empty($url[1]) ? $url[1] : "index";

            $fileName = __DIR__ . "/../controller/$className.php";

            if (file_exists($fileName)) {
                require_once __DIR__ . "/../controller/$className.php";

                if (class_exists($className)) {
                    $controller = new $className;
                } else {
                    throw new Exception("Error: El controlador no existe");
                }

                if (method_exists($controller, $methosName)) {
                    $controller->$methosName();
                }else{
                    throw new Exception("Error: El método no existe");
                }
            }else{
                throw new Exception("Error: la página que buscas no existe");
            }

            
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        
    }


    public function getUrl(){
        $url = isset($_GET['url']) ? $_GET['url'] : "";
        $url = filter_var($url, FILTER_SANITIZE_URL);

        return explode("/", $url);
    }
}