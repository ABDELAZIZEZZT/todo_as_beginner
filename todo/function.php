<?php
function searchAboutId($id){
    $task = readFromJsonFile("../tasks.json");
    if($task==null)return false;
    else{
        foreach($task as $tas)
        {
            if($id==$tas["id"])return true;
        }
    }
}
function readFromJsonFile($path)
{
    return json_decode(file_get_contents($path), true);
}
function findIndexInArray($list, $name) {
    foreach ($list as $index ) {
        if ($index == $name) {
            return $index;
        }
    }
    
    return -1; // Return -1 if value is not found in the array
}

