<?php

include_once 'Comment.php';

class CommentController
{


     public function insert($var)
    {
        $db = new Comment();
        $emailUser = $db->chekUser($var["email"]);
        if(empty( $emailUser )){
            $db->insertUser($var["fio"], $var["email"], $var["idRegion"], $var["idDistrict"], $var["idCity"]);
            echo "<div id='chekUser'> Записано!</div>";
        }else{
            $emailUser = $emailUser[0];

            $region = $db->getDistrictFromBd($emailUser[id_region]);
            $region = $region[0]["ter_name"];
            $district = $db->getDistrictFromBd($emailUser[id_district]);
            $district = $district[0]["ter_name"];

            echo "<div id='chekUser'> Пользователь '$emailUser[fio]' c email: '$emailUser[email]' с адресом проживания $region $emailUser[city] $district уже зарегестрирован</div>";
        }

    }
    public function getCity($id_region)
    {
       
        $db = new Comment();
        $citys = $db->getCityFromBd($id_region);

        $options='<select data-placeholder="Выберите город..." class="chosen-select chosen-select-city" tabindex="1">';

            foreach ($citys as $city) {

                $options.= "<option value='$city[ter_pid]' data-city='$city[ter_id]'>$city[ter_name]</option>"; 

            }
            $options.= '</select>
            <script src="chosen/docsupport/init.js" type="text/javascript" charset="utf-8"></script>
            ';
            echo $options;
            // var_dump($options);die();
        
    }

    public function getDistrict($pid_city)
    {
       
        $db = new Comment();
        $citys = $db->getDistrictFromBd($pid_city);
        // var_dump($citys[0]["ter_name"]);die();
       
            echo $citys[0]["ter_name"];
            // var_dump($options);die();
        
    }


    /*
    выбор данных в БД
    */
    public function index()
    {

        $db = new Comment();
        // $comment = $db->getComment();
        $region = $db->getRegion();
        include_once 'views/layout.php';
    }


}