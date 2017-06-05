<?php
/**
 * Created by PhpStorm.
 * User: andri
 * Date: 13.01.2017
 * Time: 13:20
 */

namespace App\Http\Controllers;


use App\Objects_model;
use App\Users;

class MainController extends Controller
{
    private $Objects;

    public function __construct()
    {
        $this->Objects = new Objects_model;
    }

    public function index()
    {
//        $cats = $this->Objects->getCats();
//        $objects = array();
//        foreach ($cats as &$cat) {
//            $cat_name = $cat;
//            $cat = [];
//            $cat['name'] = $cat_name;
//            $cat['objects'] = $this->Objects->getObjects($cat_name);
//            $objects = $cat['objects'];
//        }
//        $new_objects = [];
//        foreach ($objects as $object) {
//            $new_objects[$object['name']] = $object;
//        }
//        $new_objects = json_encode($new_objects);
//        return view('main.main_page', ["cats" => $cats, "objects" => $new_objects]);
    }
}