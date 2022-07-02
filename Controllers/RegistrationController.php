<?php



class RegistrationController extends Controller
{
  //  private function getPosts(){
  //   return $this->database->query("SELECT * FROM posts ORDER BY id DESC");
   //  }
		 
	private function checkForm(){
			
			if(!isset($_POST['submit']) ){
					return false;
			}
		
			return true;
		
	}

    public function displayPosts($nameView)
    {
			$type = "success";
			$message = "";
			
			if($this->checkForm())
			{
			    $user = new User($_POST['username'], $_POST['password'], $_POST['email']);

				$message = $user->getErrorHandling(); 
			    if($message === ""){
			        $message = "Zarejestrowałeś się pomyślnie";
					$type = "success";
				}else
				$type = "error";
			}
           else{
               $message = "blad";
               $type = "error";
           }
		   
			self::crateView($nameView, [
                'type' => $type,
				'message' => $message
            ]);
    }
	
	
}
