<?php
/**
 * Created by PhpStorm.
 * User: abuzar
 * Date: 17-2-2019
 * Time: 21:27
 */

require_once "model/HTMLElements.php";
require_once "model/Model.php";

class Reserve
{

    public function __construct()
    {
        $this->HtmlElements = new HtmlElements();
        $this->Model = new Model();

    }

    public function reserveren()
    {
        $status = 1;
        if(isset($_POST['submit'])){
            extract($_POST);


            $result = $this->Model->read("SELECT * FROM `reservering` WHERE date BETWEEN (\\"$date\\" - INTERVAL 2 HOUR)  AND (\\"$date\\" + INTERVAL 2 HOUR) AND tafel = $tafel");
            if(!empty($result)) {
                header('Location: ?fail');exit;
            }
            $this->Model->create("INSERT INTO reservering(klantnaam,telefoon,aantal_personen,date,tafel,opmerking,status) VALUES ('$naam',$telefoon,$aantal,'$date',$tafel,'$opmerking',$status)");
        }
        include "view/Reserveren.php";
    }

    public function reserveringen()
    {
        $array = $this->Model->read("SELECT * FROM `reservering`");
        $table2 = $this->HtmlElements->clickableLink($array);
        $table = $this->HtmlElements->printTable($table2);
        include "view/Reserveringen.php";

    }


    public function order()
    {
        $id = $_GET['id'];
        $voorgerechtTabel = $this->Model->read("SELECT menuitem,prijs FROM menuitem NATURAL JOIN subgerecht NATURAL JOIN gerecht WHERE gerechtcode='na'");
        $nagerechtTabel = $this->Model->read("SELECT menuitem,prijs FROM menuitem NATURAL JOIN subgerecht NATURAL JOIN gerecht WHERE gerechtcode='vg'");
        $drankTabel = $this->Model->read("SELECT menuitem,prijs FROM menuitem NATURAL JOIN subgerecht NATURAL JOIN gerecht WHERE gerechtcode='drk'");
        $drank = $this->HtmlElements->printTable($drankTabel);
        $voorgerecht = $this->HtmlElements->printTable($voorgerechtTabel);
        $nagerecht = $this->HtmlElements->printTable($nagerechtTabel);

        $bestellingTabel = $this->Model->read("SELECT * FROM bestelling WHERE reservering_id = $id");

        $bestelling = $this->HtmlElements->printTable($bestellingTabel);


        include "view/Order.php";
    }

}
