<?php

$categoryList=getCategoryListing($adminLink) ;
if (sizeof($categoryList) > 0) {
    echo "<table><tr>";
    echo "<th>ID</th><th>Url</th>";
    $languages=getLanguages($adminLink);
    foreach ($languages as $lang){
        echo "<th>" . $lang->lang . "</th>";
    }
    echo "<th colspan='2'>Acciones</th></tr>";
    $cont=0;
    foreach( $categoryList as $elem){
        echo "<tr><td>".$elem->id . "</td>";
        echo "<td>" . $elem->url . "</td>";
        foreach(array_keys($elem->translations) as $trans_id){
            echo "<td><input class='inputEditable' name='cat_" . $elem->id . "_lang_" . $trans_id . "' type='text' value='" . $elem->translations[$trans_id] . "' /></td>";
        }
        echo "<td class='tdOpts'><img class='modifOpts' src='img/modif.png' oncLick='modificaCat(\"".$elem->id."\")' id='modif" . $elem->id . "' style='display:block;'/> <img class='modifOpts' src='img/accept.png' id='accept".$elem->id."' style ='display: none;' onclick='acceptChanges(\"".$elem->id."\")'/> </td>";
        echo "<td class='tdOpts'><img class='modifOpts' src='img/del.png' id='delete' onclick='deleteCat(\"" . $elem->id . "\")' /></td>";
        echo "</tr>";
    }
    $cont++;
    echo "</table>";
}
?>