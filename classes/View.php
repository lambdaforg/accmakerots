<?php
class View
{
   // public static $twig = null;

    public static function render($view, $args = [])
    {
        extract($args, EXTR_SKIP);

        $file = dirname(__DIR__) . "/App/Views/$view";  // relative to Core directory

        if (is_readable($file)) {
            require $file;
        } else {
            throw new \Exception("$file not found");
        }
    }


    /**
     * @param $template
     * @param array $args
     */
    public static function renderTemplate($template, $args = [])
    {
        $twig = null;

        if ($twig === null) {
            $loader = new \Twig\Loader\FilesystemLoader(dirname(__DIR__) . '\Views');
            $twig = new \Twig\Environment($loader,[
                'debug' => true
            ]);
            $twig->addExtension(new \Twig\Extension\DebugExtension());

            //"Próbna wersja path do twig"
            foreach(Route::$validRoutes as $key){
               $twig->addGlobal("$key", "./$key");
          }
            $twig->addGlobal('userisLogIn',  User::isLogIn());
        }

        echo $twig->render($template, $args);
    }
}