<?php

namespace App\Components;

use App\Category;

class Recursive
{

    private $data;
    private $htmlSelect = '';

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function CategoryRecursive($parentId, $id = 0, $text = ''): string
    {
        foreach ($this->data as $value) {
            if ($value['parent_id'] == $id) {
                if (!empty($parentId) && $parentId == $value['id']) {
                    $this->htmlSelect .= "<option selected value='" . $value['id'] . "'>" . $text . $value['name'] . "</option>";
                } else {
                    if($value['parent_id']==0){
                        $this->htmlSelect .= "<option value='" . $value['id'] . "' style='font-weight: bold;' >" . $text . $value['name'] . "</option>";
                    }
                   else $this->htmlSelect .= "<option value='" . $value['id'] . "'>" . $text . $value['name'] . "</option>";
                }
                $this->CategoryRecursive($parentId, $value['id'], $text . '► ');
            }
        }
        return $this->htmlSelect;
    }
    
    public function CategoryRecursive_v2($parentId, $id = 0, $text = '')
    {
        foreach ($this->data as $value) {
            if ($value['parent_id'] == $id) {
                if (!empty($parentId) && $parentId == $value['id']) {
                    $this->htmlSelect .= "<option selected value='" . $value['id'] . "'>" . $text . $value['name'] . "</option>";
                } else {
                    if($value['parent_id']==0){
                        $this->htmlSelect .= "<option disabled value='" . $value['id'] . "' style='font-weight: bold;' >" . $text . $value['name'] . "</option>";
                    }
                   else $this->htmlSelect .= "<option value='" . $value['id'] . "'>" . $text . $value['name'] . "</option>";
                }
                $this->CategoryRecursive_v2($parentId, $value['id'], $text . '► ');
            }
        }
        return $this->htmlSelect;
    }
}
