<?php
/**
 * Created by PhpStorm.
 * User: abuzar
 * Date: 17-2-2019
 * Time: 21:27
 */

require_once "model/HTMLElements.php";
require_once "model/Model.php";

class Controller
{

    public function __construct()
    {
        $this->HtmlElements = new HtmlElements();
        $this->Model = new Model();

    }

    public function reserveren()
    {
        include "view/form.php";

        if(isset($_POST['submit'])){
//            exctract neemt de post variable mee en zet ze in variabl dus
//            name='carlist' = $carlist=wat is gekozen
            extract($_POST);

            $this->Model->create("INSERT INTO reservering(auto) VALUES ('$carlist')");
        }
    }



}
