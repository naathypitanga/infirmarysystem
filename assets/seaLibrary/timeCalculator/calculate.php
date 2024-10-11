<?php

date_default_timezone_set('America/Sao_Paulo'); //Define o horário padrão

function countDays($frtDate,$sgdDate){
    $frtDate = date_create($frtDate);
    $sgdDate = date_create($sgdDate);
    $dateDiff = $frtDate -> diff($sgdDate);
    $dateDiff = $dateDiff->days;
    return $dateDiff;
}

function countDate($frtDate,$sgdDate){
    $frtDate = date_create($frtDate);
    $sgdDate = date_create($sgdDate);
    $dateDiff = $frtDate -> diff($sgdDate);
    if($dateDiff->d==1){
        $interval = $dateDiff->y . " anos, " . $dateDiff->m . " meses e " . $dateDiff->d . " dia";
    }elseif($dateDiff->d==0){
        $interval = $dateDiff->y . " anos e " . $dateDiff->m . " meses";
    }else{
    $interval = $dateDiff->y . " anos, " . $dateDiff->m . " meses, " . $dateDiff->d . " dias";
    }
    return $interval;
}

function countNegativeDays($frtDate,$sgdDate){
    $frtDate = date_create($frtDate);
    $sgdDate = date_create($sgdDate);
    $dateDiff = $frtDate -> diff($sgdDate);
    if($dateDiff->invert==0){
       $date = $dateDiff->days;
       return $date;
    }else{
       $date = $dateDiff->days*(-1);
       return $date;
    }
    
}

function hourCalculate($frtHour,$sgdHour){
    $frtDate = date_create($frtHour);
    $sgdDate = date_create($sgdHour);
    $hourDiff =  $frtDate -> diff($sgdDate);
    $hour = $hourDiff->h;
    if($hour==1){
        $hour = $hour." hora";
    }else{
        $hour = $hour." horas";
    }
    return $hour;
}

function minuteCalculate($frtMinute,$sgdMinute){
    $frtDate = date_create($frtMinute);
    $sgdDate = date_create($sgdMinute);
    $MinuteDiff =  $frtDate -> diff($sgdDate);
    $Minute = $MinuteDiff->h*60;
    if($Minute==1){
        $Minute = $Minute." minuto";
    }else{
        $Minute = $Minute." minutos";
    }
    return $Minute;
}

function secondCalculate($frtsecond,$sgdsecond){
    $frtDate = date_create($frtsecond);
    $sgdDate = date_create($sgdsecond);
    $secondDiff =  $frtDate -> diff($sgdDate);
    $second = $secondDiff->h*60*60;
    if($second==1){
        $second = $second." segundo";
    }else{
        $second = $second." segundos";
    }
    return $second;
}



function brForBdDate($date){
    $date = explode('/',$date);
    $day = $date['0'];
    $month = $date['1'];
    $year = $date['2'];
    $finalDate = $year.'-'.$month.'-'.$day;
    return $finalDate;
}

function DbForBrDate($date){
    $date = explode('-',$date);
    $year = $date['0'];
    $month = $date['1'];
    $day = $date['2'];
    $finalDate = $day.'/'.$month.'/'.$year;
    return $finalDate;
}
/*
function notificationDate($date,$info= "",$info2=""){
    $count = "";
    $ano=$date->y;
    $mes=$date->m;
    $dia=$date->d;
    $hora=$date->h;
    $minuto=$date->i;

    if($ano == 1){
        $count = $ano." ano";
    }elseif($date->y > 1){
        $count = $ano." anos";
    }elseif($mes==1){
        $count = $mes." mês";
    }elseif($mes>1){
        $count = $mes." meses";
    }elseif($dia==1){
        $count = $dia." dia";
    }elseif($dia>1){
        $count = $dia." dias";
    }elseif($hora==1){
        $count = $hora." hora";
    }elseif($hora>1){
        $count = $hora." horas";
    }elseif($minuto==1){
        $count = $minuto." minuto";
    }elseif($minuto>1){
        $count = $minuto." minutos";
    }else{
        $count = "alguns segundos";
    }

    return $info." ".$count." ".$info2;
}
*/