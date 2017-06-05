<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Objects_model extends Model
{
    public function getCats()
    {
        if (!is_dir("../public/objects"))
            return false;
        $dirs = scandir("../public/objects");
        $dirs = $this->removeFileNames($dirs);
        return $dirs;
    }

    public function getObjects($cat)
    {
        if (!is_dir("../public/objects/$cat"))
            return false;
        $objects = scandir("../public/objects/$cat");
        $objects = $this->removeFileNames($objects);
        foreach ($objects as &$object) {
            $name = $object;
            $object = [];
            $object['name'] = $name;
            if (file_exists("../public/objects/$cat/$name/image.png"))
                $object['pic'] = "../objects/$cat/$name/image.png";
            if (file_exists("../public/objects/$cat/$name/form.html"))
                $object['form'] = "../objects/$cat/$name/form.html";
        }
        unset($object);
        return $objects;
    }

    private function removeFileNames($array)
    {
        foreach ($array as $k => $item)
            if (strpos($item, ".") !== false)
                unset($array[$k]);
        return $array;
    }
}
