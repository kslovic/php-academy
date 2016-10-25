<?php
$csv = array_map('str_getcsv', file('postanski-uredi.csv')); //csv file to array

function getArea($i){
	if(isset($GLOBALS['csv'][$i][4])){
	return $GLOBALS['csv'][$i][4];}
}
function getName($i){
	if(isset($GLOBALS['csv'][$i][3])){
	return $GLOBALS['csv'][$i][3];}
}
function getZip($i){
	if(isset($GLOBALS['csv'][$i][1])){
	return $GLOBALS['csv'][$i][1];}
}
function getRegion($i){
	if(isset($GLOBALS['csv'][$i][5])){
return $GLOBALS['csv'][$i][5];}
}
function createArray($region, $name, $zip, $area){
	$array=array(
	$region=>array(
				array('name'=>$name,
					'zip'=>$zip,
					'area'=>array($area)
					)
	)
	);
	return $array;
}

//group post office in region, area in postoffice
$post=array();
for($i=1;$i<count($csv);$i++) {
	$free1=true;
		foreach($post as $key =>$value){ if(isset($post[$key][getRegion($i)])){$free1=false;} }
	if($free1==true){
		$post[]=createArray(getRegion($i),getName($i),getZip($i),getArea($i));
		}
	else{
		$free3=true;
		foreach($post as $key1 =>$value1){ if(isset($post[$key1][getRegion($i)])){$pok=$key1;} }
		$k=count($post[$pok][getRegion($i)]);
		for($z=0;$z<$k;$z++){if($post[$pok][getRegion($i)][$z]['name']==getName($i)){$free3=false;}}
		if($free3==true){
			$post[$pok][getRegion($i)][]=array('name'=>getName($i),
											'zip'=>getZip($i),
											'area'=>array(getArea($i))
	);  }
		else{$free4=true;
			foreach($post as $key1 =>$value1){ if(isset($post[$key1][getRegion($i)])){$pok=$key1;} }
			$br=0;
			while(isset($post[$pok][getRegion($i)][$br]['name']) && $post[$pok][getRegion($i)][$br]['name']!=getName($i)){$br++;}
			$na=count($post[$pok][getRegion($i)][$br]['area']);
			for($z=0;$z<$na;$z++){if($post[$pok][getRegion($i)][$br]['area'][$z]==getArea($i)){$free4=false;}}
			if($free4==true){
			$post[$pok][getRegion($i)][$br]['area'][]=getArea($i);
		}
	
	
	}
		}	
}

//var_dump($post);
function sortCityArea($array){
	
	foreach ($array as $k => $value)
            {  
                foreach ($value as $puk => $puv)
                { 
                    asort($array[$k][$puk]);
                }
            }
			return $array;
}
var_dump(sortCityArea($post));
?>