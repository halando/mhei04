<?php



class User{    private $nev;
    private $email;
    private $jelszo;
    public function __construct($nev,$email,$jelszo) {
        $this->nev=$nev;
        $this->email=$email;
        $this->jelszo=$jelszo;
    }
    public function __toString() {
        $valasz=<<<Szoveg
                <tr>
                    <td>$this->nev</td>
                    <td>$this->email</td>
                    <td>$this->jelszo</td>
                </tr>
Szoveg;
        return $valasz;
    }
    function __serialize() {
        return [
            "nev"=>$this->nev, 
            "email"=>$this->email, 
            "jelszo"=>$this->jelszo];
    }
    function __unserialize(array $data) {
        $this->nev=$data["nev"];
        $this->email=$data["email"];
        $this->jelszo=$data["jelszo"];
    }
}

session_start();
try{
    @$userek=$_SESSION["userek"];
    //var_dump($_SESSION);
}catch(Exception $ex){
    $userek=[];
}


if($_SERVER["REQUEST_METHOD"]=="PUT"){
    $reszek=explode("|",file_get_contents("php://input"));
    $userek[]=new User($reszek[0],$reszek[1],$reszek[2]);
    $_SESSION["userek"]=$userek;

    //echo $_SERVER["REQUEST_METHOD"].": ". file_get_contents("php://input");
    echo "";
}else{
    if(count($userek)>0){
        $valasz="";
        foreach($userek as $u){
            $valasz.=$u;
        }
        echo $valasz;
    }
}
?>