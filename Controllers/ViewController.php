<?php



class ViewController extends Controller
{
    private function getPosts(){
       return $this->database->query("SELECT * FROM posts ORDER BY id DESC")->fetchAll();
     }
     

    public function displayPosts($nameView = 'index')
    {
            $posts = $this->getPosts();

			self::crateView($nameView, [
                'posts' => $posts
            ]);
    }

    public function displayAccountPage($nameView = 'Login\index'){

        if(LoginController::login($nameView)){
            $temp = "jesteś zalogowany";
            self::crateView($nameView, [
                'errors' => $temp
            ]);
            return;
        }

        $this->displayPosts();
    }
}