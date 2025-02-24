<?php

function Cbo($lista, $cboName, $cboValue, $cboText, $condition=""): string{
    $aux = explode(separator: ",", string: $cboText);
    $cbo = "<select name='". $cboName ."'>";
    
    foreach($lista as $item){
        if ( is_array(value: $condition) ){
            $field = $condition["field"];
            $value = $condition["value"];
            if ( $item[$field] == $value ){
                $texto = "";
                foreach($aux as $col){
                    if ( $texto != "" ) $texto .= " - ";
                    $texto .= $item[$col];
                }
                $cbo .= "<option value='". $item[$cboValue] ."'>". $texto ."</option>";
            }
        }else{
            $texto = "";
            foreach($aux as $col){
                if ( $texto != "" ) $texto .= " - ";
                $texto .= $item[$col];
            }
            $cbo .= "<option value='". $item[$cboValue] ."'>". $texto ."</option>";
        }        
    }
    $cbo .= "</select>";

    return $cbo;
}

function Codificar($_data): string{
    return base64_encode(string: $_data);
}

function Decodificar($_data): bool|string{
    return base64_decode(string: $_data);
}

?>