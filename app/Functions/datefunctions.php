<?php

function intPart($float)
{
    if ($float < -0.0000001)
        return ceil($float - 0.0000001);
    else
        return floor($float + 0.0000001);
}

	function Hijri2Greg($day, $month, $year, $string = false)
	{
    $day   = (int) $day;
    $month = (int) $month;
    $year  = (int) $year;

    $jd = intPart((11*$year+3) / 30) + 354 * $year + 30 * $month - intPart(($month-1)/2) + $day + 1948440 - 385;

    if ($jd > 2299160)
    {
        $l = $jd+68569;
        $n = intPart((4*$l)/146097);
        $l = $l-intPart((146097*$n+3)/4);
        $i = intPart((4000*($l+1))/1461001);
        $l = $l-intPart((1461*$i)/4)+31;
        $j = intPart((80*$l)/2447);
        $day = $l-intPart((2447*$j)/80);
        $l = intPart($j/11);
        $month = $j+2-12*$l;
        $year  = 100*($n-49)+$i+$l;
    }
    else
    {
        $j = $jd+1402;
        $k = intPart(($j-1)/1461);
        $l = $j-1461*$k;
        $n = intPart(($l-1)/365)-intPart($l/1461);
        $i = $l-365*$n+30;
        $j = intPart((80*$i)/2447);
        $day = $i-intPart((2447*$j)/80);
        $i = intPart($j/11);
        $month = $j+2-12*$i;
        $year = 4*$k+$n+$i-4716;
    }
    
    $data = array();
    $date['year']  = $year;
    $date['month'] = $month;
    $date['day']   = $day;
    
    if (!$string)
        return $date;
    else
        return     "{$year}-{$month}-{$day}";
}


?>