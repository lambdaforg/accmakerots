<?php



class StatisticsController extends Controller
{
    private $constViewName = 'Stat\Level';

    private function getStatLevel(){
       return $this->database->query("SELECT name,vocations_list.nameVoc as nameVoc, level FROM players join `vocations_list` on players.vocation = vocations_list.id ORDER BY level DESC")->fetchAll();
     }
    private function getStatMagicLevel(){
        return $this->database->query("SELECT name,vocations_list.nameVoc as nameVoc, maglevel AS level FROM players join `vocations_list` on players.vocation = vocations_list.id ORDER BY maglevel DESC")->fetchAll();
    }

    private function getRegularSkillsStat($param){
       // $query = "SELECT name,vocation, skills.id as level FROM `skills` inner join `players` on skills.player = players.id inner join `vocations_list` on skills.vocation = vocations_list.id where skills.id = ?";
        
        $query = "SELECT players.name, vocations_list.id, vocations_list.nameVoc as nameVoc, skills.skill, skills.id as level FROM `players` join `vocations_list` on players.vocation = vocations_list.id join `skills`on players.id = skills.player where skills.id = ? ORDER BY level DESC";
        switch($param){
            case 'fist':
                return $this->database->query($query , 0)->fetchAll();
            break;
            case 'club':
                return $this->database->query($query , 1)->fetchAll();
            break;
            case 'sword':
                return $this->database->query($query , 2)->fetchAll();
            break;
            case 'axe':
                return $this->database->query($query , 3)->fetchAll();
            break;
            case 'distance':
                return $this->database->query($query , 4)->fetchAll();
            break;
            case 'shielding':
                return $this->database->query($query , 5)->fetchAll();
            break;
            case 'fishing':
                return $this->database->query($query , 6)->fetchAll();
            break;
        }

    }

    public function displayLevel($nameView)
    {
            $players = null;
            switch($nameView){

                case 'Stat\Level':
                    $players = $this->getStatLevel();   
                break;
                case 'Stat\MagLevel':
                    $players = $this->getStatMagicLevel();   
                break;
                case 'Stat\Fist':
                    $players = $this->getRegularSkillsStat("fist");   
                break;
                case 'Stat\Axe':
                    $players = $this->getRegularSkillsStat("axe");   
                break;
                case 'Stat\Club':
                    $players = $this->getRegularSkillsStat("club");   
                break;
                case 'Stat\Sword':
                    $players = $this->getRegularSkillsStat("sword");   
                break;
                case 'Stat\Distance':
                    $players = $this->getRegularSkillsStat("distance");   
                break;
                case 'Stat\Shielding':
                    $players = $this->getRegularSkillsStat("shielding");   
                break;
                case 'Stat\Fishing':
                    $players = $this->getRegularSkillsStat("fishing");   
                break;
            }

            //self::debug_to_console( $players);
            
            if($players === null) {
                $players = [];
            }
            $typeView =  trim($nameView, "Stat");
            $typeView =  trim($typeView, "\'");
			self::crateView($this->constViewName, [
                'players' => $players,
                'typeView' =>  $typeView
            ]);
    }
}