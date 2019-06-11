<?php

class Expense_Profile
{
    public $age_array   = array();
	public $money_array  = array();
	public $label_array;
		
    //put your code here
    // constructor
    public function __construct()
    {
    }
    // destructor
    public function __destruct()
    {
    }
    
    #Inflation adjusted price
    function rnd($n)
    {
        $frac = $n - intval($n);
        if ($frac >= 0.5) {
            $n = intval($n) + 1;
        } else {
            $n = intval($n);
        }
        return $n;
    }
    
    function inflation($p, $r, $n)
    {
        $a = $p * pow((1 + ($r / 100)), $n);
        return $a;
    }
    #determine nature of client
    
    function nature($total, $n)
    {
        $nature = array(
            'S',
            'M',
            'L'
        );
        $i      = $this->rnd($total / $n);
        if($i>0)
		{
			$nat    = $nature[$i - 1];
		}
		else
		{
			$nat    = $nature[0];
		}
        return ($nat);
    }
    
    
    #Further Education 
    function edu($loc,$answerString)
    {
		#echo $loc;
        if ($loc == 'I') {
			
            #echo ("<br>" . 'You are planning to study in India.');
            #take value from db
            $course = $answerString["5"];#What course do you plan to pursue? Answer in h, m or o
            
			if ($course == 'H') {
                $cost = 250000;
                $wt   = 1;
            } else if ($course == 'M') {
                $cost = 1500000;
                $wt   = 2;
            } else if ($course == 'O') {
                $cost = 200000;
                $wt   = 1;
            }
            #take value from db
            $n    = 26 - $answerString["1"];#How many years later do you plan to pursue your further education in India?
            $cost = $this->inflation($cost, 6.9, $n);
            #echo ("<br>" . 'Cost for further education in India after' . $n . 'years is roughly' . $cost . 'INR');
            array_push($this->age_array, $n);
			array_push($this->money_array, $cost);
			$this->label_array[$n] = " Education";
			return array(
                $cost,
                $wt
            );
            #return $cost,$wt
        } else if ($loc == 'O') {
            #take value from db
            $n    = 26 - $row["q1"];#How many years later do you plan to pursue your further education overseas?
            $cost = 5500000;
            $wt   = 3;
            $cost = $this->inflation($cost, 1.5, $n);
            #echo ("<br>" . 'Cost for further education in India after' . $n . 'years is roughly' . $cost . 'USD');
            array_push($this->age_array, $n);
			array_push($this->money_array, $cost);
			$this->label_array[$n] = $this->label_array[$n]." Education";
			return array(
                $cost,
                $wt
            );
            #return $cost,$wt
        }
    }
    
    #Purchasing a vehicle
    function vehicle($loc,$answerString,$where)
    {
        $weight = array(
            'S' => 1,
            'M' => 2,
            'L' => 3
        );
        if ($loc == 'I') {
            $veh_range = array(
                'S' => 650000,
                'M' => 1500000,
                'L' => 3500000
            );
            #take both value from db
			if($where == 1){
				$i = $answerString["7"];#Select car range that you would want you buy in the future - answer in s,m or l
			}
			else{
				$i = $answerString["17"];#Select car range that you would want you buy in the future - answer in s,m or l
			}
            $n         = 2;#How many years later do you plan to purchase a vehicle in India?
            $cost      = $veh_range[$i];
            $cost      = $this->inflation($cost, 6.9, $n);
            $wt        = $weight[$i];
			
					if('Y'==$answerString["11"]){
						$cost=$cost * 0.6;
					}
			array_push($this->age_array, $n);
			array_push($this->money_array, $cost);
            #echo ("<br>" . 'Cost for purchasing a vehicle in India after' . $n . 'years is roughly' . $cost . 'INR');
            return array(
                $cost,
                $wt
            );
        } else if ($loc == 'O') {
            $veh_range = array(
                'S' => 1300000,
                'M' => 2100000,
                'L' => 5324400
            );
            #take both value from db
            if($where == "1"){
				$i = $answerString["7"];#Select car range that you would want you buy in the future - answer in s,m or l
			}
			else{
				$i = $answerString["17"];#Select car range that you would want you buy in the future - answer in s,m or l
			}
            $n         = 2;#How many years later do you plan to purchase a vehicle overseas?
            $cost      = $veh_range[$i];
            $cost      = $this->inflation($cost, 1.5, $n);
            $wt        = $weight[$i];
			
					if('Y'==$answerString["11"]){
						$cost=$cost * 0.6;
					}
			array_push($this->age_array, $n);
			array_push($this->money_array, $cost);
			$this->label_array[$n] = $this->label_array[$n]." Vehicle";
			
            #echo ("<br>" . 'Cost for purchasing a vehicle overseas after' . $n . 'years is roughly' . $cost . 'INR');
            return array(
                $cost,
                $wt
            );
        }
    }
    #Vacation
    
    function vacation($loc, $age,$answerString)
    {
        $weight = array(
            'D' => 2,
            'O' => 3
        );
        #take from db
        $freq   = $answerString["10"];
        $total  = 0;
        if ($loc == 'I') {
            $vacation = array(
                'D' => 40000,
                'O' => 200000
            );
            #take from db
            $i        = $answerString["9"];#Do you plan to have a domestic vacation or overseas? Answer in d or o
            $ctr      = $freq;
            while ($ctr <= 10) {
                $cost = $vacation[$i];
                $cost = $this->inflation($cost, 6.9, $ctr);
				array_push($this->age_array, $ctr);
			array_push($this->money_array, $cost);
                #echo ("<br>" . 'Your vacation cost after' . $ctr . 'years at age' . $age . 'is roughly' . $cost . 'INR');
                $age += $freq;
                $ctr += $freq;
                $total += $cost;
            }
            $wt = $weight[$i];
            #echo ("<br>" . 'Total cost of vacation is' . $total);
            return array(
                $total,
                $wt
            );
        } else if ($loc == 'O') {
            $vacation = array(
                'D' => 66000,
                'O' => 266000
            );
            #take from db
            $i        = $answerString["9"];#Do you plan to have a domestic vacation or overseas? Answer in d or o
            $ctr      = $freq;
            $tot      = 0;
            while ($ctr <= 10) {
                $cost = $vacation[$i];
                $cost = $this->inflation($cost, 1.5, $ctr);
				array_push($this->age_array, $ctr);
			array_push($this->money_array, $cost);
                #echo ("<br>" . 'Your vacation cost after' . $ctr . 'years at age' . $age . 'is roughly' . $cost . 'USD');
                $age += $freq;
                $ctr += $freq;
                $total += $cost;
            }
            $wt = $weight[$i];
            #echo ("<br>" . 'Total cost of vacation is' . $total);
            return array(
                $total,
                $wt
            );
        }
    }
    
    #Real Estate
    
    function realEstate($loc,$answerString)
    {
        $weightI = array(
            'T' => array(
                'S' => 1,
                'M' => 1,
                'L' => 2
            ),
            'C' => array(
                'S' => 2,
                'M' => 2,
                'L' => 3
            )
        );
        $weightO = array(
            'T' => array(
                'S' => 2,
                'M' => 2,
                'L' => 2
            ),
            'C' => array(
                'S' => 3,
                'M' => 3,
                'L' => 3
            )
        );
        if ($loc == 'I') {
            $l    = array(
                'T' => array(
                    'S' => 2500000,
                    'M' => 4000000,
                    'L' => 6000000
                ),
                'C' => array(
                    'S' => 15000000,
                    'M' => 25000000,
                    'L' => 35000000
                )
            );
            $area = $answerString["14"]; #Do you plan to have your home in a town or a city? Answer in t or c
            $size = $answerString["15"]; #-
            $n    = $row["21"]; #How many years later do you plan to buy real estate?
            $cost = $l[$area][$size];
			echo $cost;
            $cost = $this->inflation($cost, 6.9, $n);
			if ('Y' == $answerString["11"]) {
                $cost = $cost * 0.6;
            }
			if($n>0)
			{
			array_push($this->age_array, $n);
			array_push($this->money_array, $cost);
			$this->label_array[$n] = $this->label_array[$n]." Real Estate";
			}
            
            #echo ("<br>" . 'Your real estate cost after' . $n . 'years is roughly' . $cost . 'INR');
            $wt = $weightI[$area][$size];
            return array(
                $cost,
                $wt
            );
        } else if ($loc == 'O') {
            $l    = array(
                'T' => array(
                    'S' => 13400000,
                    'M' => 26700000,
                    'L' => 40000000
                ),
                'C' => array(
                    'S' => 33400000,
                    'M' => 46800000,
                    'L' => 67000000
                )
            );
            $area = $answerString["14"]; #Do you plan to have your home in a town or a city? Answer in t or c
            $size = $answerString["15"]; #Are you looking for a small, medium or large flat? Answer in s,m or l
            $n    = $answerString["21"]; #How many years later do you plan to buy real estate?
            $cost = $l[$area][$size];
            $cost = $this->inflation($cost, 1.5, $n);
			
					if('Y'==$answerString["11"]){
						$cost=$cost * 0.6;
					}
			array_push($this->age_array, $n);
			array_push($this->money_array, $cost);
			$this->label_array[$n] = $this->label_array[$n]." Real Estate";
            #echo ("<br>" . 'Your real estate cost after' . $n . 'years is roughly' . $cost . 'USD');
            $wt = $weightO[$area][$size];
            return array(
                $cost,
                $wt
            );
        }
    }
    #Childrens wedding
    function wedding($loc,$answerString)
    {

		$l = $answerString["19"];
		$l2 = array(
                'S' => 2500000,
                'M' => 5000000,
                'L' => 20000000
            );
		$noChild=$l;
		$cost=$l2[$answerString["20"]];
		$total=0;
		$i=0;
		$diff = 3;
		while($i<$noChild){
			$finalcost = $this->inflation($cost, 6.9, $diff);
			array_push($this->age_array, $diff);
			array_push($this->money_array, $finalcost);
			$this->label_array[$diff] = $this->label_array[$diff]." Wedding";
			$diff+=3;
			$total+=$finalcost;
			$i+=1;
		}
    #print('$cost of wedding for',noChild,'children is roughly',$total,'INR');
	
		
		if($l<=1)
		{
			$wt = 1;
		}
		else if($l<=3)
		{
			$wt = 2;
		}
		else
		{
			$wt = 3;
		}
		return array(
			$total,
			$wt
		);
    }
    
	function realEstateSecond($a,$n,$nat,$loc){
    $location=$loc;
    $age=$a;
    $target=$n;
    $diff=$target-$age;
    $i=$nat;
    $cost=0;
    if($location=='I'){
		$l = array(
                'S' => 6000000,
                'M' => 17500000,
                'L' => 35000000
            );
        $cost=$l[$i];
		$cost = $this->inflation($cost, 6.9, $diff);
		array_push($this->age_array, $diff);
		array_push($this->money_array, $cost);
		$this->label_array[$diff] = $this->label_array[$diff]." Real Estate";
        #echo('Your real estate $cost after'.$diff.'years is roughly'.$cost.'INR');
	}
    else if($location=='O'){
		$l = array(
                'M' => 26700000,
                'L' => 46800000
            );
        $cost=$l[$i];
		$cost = $this->inflation($cost, 1.5, $diff);
        #echo('Your real estate $cost after'.$diff.'years is roughly'.$cost.'USD');
		array_push($this->age_array, $diff);
		array_push($this->money_array, $cost);
		$this->label_array[$diff] = $this->label_array[$diff]." Real Estate";
	}
    return $cost;
}
	
function childEduSecond($a,$n,$nat){
	$l = array(
                'S' => 1,
                'M' => 2,
                'L' => 3
            );
    $age=$a;
    $target=$n;
    $diff=$target-$age;
    $noChild=$l[$nat];
    $cost=1000000;
    $total=0;
    $i=0;
	$cost = $this->inflation($cost, 6.9, $diff) * $noChild ;
    
    #print('$cost of education for',noChild,'children is roughly',$total,'INR')
	array_push($this->age_array, $target-$age);
		array_push($this->money_array, $total);
		$this->label_array[$target - $age] = $this->label_array[$target - $age]." Children Education";
    return $total;
}
   
function childWedSecond($a,$n,$nat){
    $l = array(
                'S' => 1,
                'M' => 2,
                'L' => 3
            );
	$l2 = array(
                'S' => 2500000,
                'M' => 5000000,
                'L' => 20000000
            );
    $age=$a;
    $target=$n;
    $diff=$target-$age;
    $noChild=$l[$nat];
    $oldcost = $l2[$nat];
    $cost    = 0;
	$total   = 0;
	$i       = 0;
	$cost    = $this->inflation($oldcost, 6.9, $diff);
	$total += $cost;
    #print('$cost of wedding for',noChild,'children is roughly',$total,'INR');
	
					if('Y'==$answerString["11"]){
						$cost=$cost * 0.6;
					}
	array_push($this->age_array, $target-$age);
		array_push($this->money_array, $total);
    return $total;
}


function retireSecond($a,$n,$nat,$loc){
    $location=$loc;
    $age=$a;
    $target=$n;
    $diff=$target-$age;
    $i=$nat;
    $cost=0;
    if($location=='I'){
		$l = array(
                'S' => 75000,
                'M' => 150000,
                'L' => 500000
            );
        $cost=$l[$i];
        $cost = $cost * 12; #annual $cost
        $t = $target - $age; #$total retirement $cost
		$a = $this->inflation($p, 6.9, $t);
        for ($i = 0; $i <= 20; $i++) {
                $val = $this->inflation($a, 6.9, $i);
                array_push($this->age_array, $t + $i);
                array_push($this->money_array, $val);
            }
        #print('Your retirement $cost after',$diff,'years is roughly',$cost,'INR');
	}
    else if($location=='O'){
		$l = array(
                'S' => 199485,
                'M' => 332475,
                'L' => 664950
            );
        $cost=$l[$i];
        $cost = $cost * 12; #annual $cost
        $t = $target - $age;
        $a = $this->inflation($p, 1.5, $t);
		for ($i = 0; $i <= 20; $i++) {

                $val = $this->inflation($a, 1.5, $i);
				array_push($this->age_array, $t + $i);
                array_push($this->money_array, $val);
            }
        #print('Your retirement $cost after',$diff,'years is roughly',$cost,'USD');
	}
	


	
	
    return $cost;
}
	
	
	
	function retireSecondDoubleIncome($a, $n, $nat, $loc)
    {
        $location = $loc;
        $age      = $a;

        $target = $n;
        $diff   = $target - $age;
        $i      = $nat;
        $cost   = 0;
        $target = 60;


        if ($location == 'I') {

            $d = array(
                'S' => 75000,
                'M' => 150000,
                'L' => 500000
            );
            $p = $d[$nat] * 12;
            # for age 60
            $t = $target - $age;
            $a = $this->inflation($p, 6.9, $t);
            
            # for age 61 - 80
            for ($i = 0; $i <= 20; $i++) {
                $val = $this->inflation($a, 6.9, $i);
				$val = $val * 0.6;
                array_push($this->age_array, $t + $i);
                array_push($this->money_array, $val);
            }
        } else {
            $d = array(
                'S' => 199485,
                'M' => 332475,
                'L' => 664950
            );
            $p = $d[$nat] * 12;
            # for age 60
            $t = $target - $age;
            $a = $this->inflation($p, 1.5, $t);

            #array_push($this->age_array, $t);
            #array_push($this->money_array, $a);
            
            # for age 61 - 80
            for ($i = 0; $i <= 20; $i++) {

                $val = $this->inflation($a, 1.5, $i);
				$val = $val * 0.6;
				array_push($this->age_array, $t + $i);
                array_push($this->money_array, $val);
            }
        }
        
        
        return $cost;
    }
    
	
	function sort_expense($age , $expense)
	{
		$age_final = array();
		$expense_final = array();

		for ($i = 0; $i < sizeof($age); $i++) {
			$key = array_search($age[$i], $age_final); // $key = 2;
			if($key==null)
			{
				array_push($age_final, $age[$i]);
				array_push($expense_final, $expense[$i]);
			}
			else
			{
				$expense_final[$key] = $expense_final[$key] + $expense[$i];
			}
		}
		array_multisort($age_final, $expense_final);

		return array(
			$age_final,
			$expense_final
		);
		
	}
	
    function start_expense($answerString)
    {
            
		for ($i = 0; $i < 80; $i++)
{
    $this->label_array[$i] = "";
}	
		#Getting age as input
		$age = $answerString["1"];
		$sal = $answerString["2"];
		#echo ("<br>" . 'You are' . $age . 'years old');
		
		#Determining age bracket
		if (21 <= $age && $age < 31) {
			$total     = 0;
			$totalCost = 0;
			$nat       = 0;
		 #   echo ("<br>" . 'age bracket is P1');
			$a1  = $answerString["3"]; #'Do you plan to pursue your further education? Answer in y or n';
			
			$loc = '';
			$n   = 0;
			if ($a1 == 'Y') {
				$n += 1;
				$loc = $answerString["4"]; #Do you plan to study in India or Overseas? Answer in i or o
				$l   = $this->edu($loc,$answerString);
				$totalCost += $l[0];
				$total += $l[1];
				
				$a3 = $answerString["6"]; #Do you see yourself purchasing a vehicle in the future? Answer in y or n
				if ($a3 == 'Y') {
					$n += 1;
					$l = $this->vehicle($loc,$answerString,1);
					$totalCost += $l[0]; #$cost for that loop
					$total += $l[1]; #$weight assigned by that loop
				}
				$a3 = $answerString["8"]; #'Are you a vacation person? Answer in y or n'
				if ($a3 == 'Y') {
					$n += 1;
					$l = $this->vacation($loc, $age,$answerString);
					$totalCost += $l[0];
					$total += $l[1];
				}
				$nat = $this->nature($total, $n);
			} else if ($a1 == 'N') {
				$loc = 'I';
				$nat = 0;
				$a2  = $answerString["6"];#Do you see yourself purchasing a vehicle in the future? Answer in y or n
				if ($a2 == 'Y') {
					$n += 1;
					$l = $this->vehicle($loc,$answerString,1);
					$totalCost += $l[0];
					$total += $l[1];
				}
				$a2 = $answerString["8"]; #'Are you a vacation person? Answer in y or n'
				if ($a2 == 'Y') {
					$n += 1;
					$l = $this->vacation($loc, $age,$answerString);
					$totalCost += $l[0];
					$total += $l[1];
				}
				
			}
			$nat = $this->nature($total, $n);
			$spouse = 'N';
			#echo ($age_array);
			#echo ($money_array);
			$this -> realEstateSecond($age,26,$nat,$loc);
			$this -> childWedSecond($age,58,$nat);
			$this -> childEduSecond($age,48,$nat);
			$this -> retireSecond($age,60,$nat,$loc);
			
			
			$finalValues = $this -> sort_expense($this->age_array , $this->money_array);
			
			return array(
				$loc,
				$nat,
				$totalCost,
				$spouse,
				$finalValues[0],
				$finalValues[1],
					$this->label_array
			);
			
		} else if (31 <= $age && $age < 47) {
			$totalCost = 0;
			$total     = 0;
			$nat       = 0;
			$n         = 0;
			#echo ("<br>" . 'age bracket is P2');
			$spouse = $answerString["11"];#Do you have a spouse? y/n?
			$a1  = $answerString["12"]; #Do you plan to buy real estate? Answer in y or n
			$loc = '';
			if ($a1 == 'Y') {
				$n += 1;
				$loc = $answerString["13"];#Are you looking for a house in India or Overseas? Answer in i or o
				$l   = $this->realEstate($loc,$answerString);
				$totalCost += $l[0];
				$total += $l[1];
				$a3 = $answerString["16"]; #Do you see yourself purchasing a vehicle in the future? Answer in y or n
				if ($a3 == 'Y') {
					$n += 1;
					$l = $this->vehicle($loc,$answerString,2);
					$totalCost += $l[0]; #$cost for that loop
					$total += $l[1]; #$wt assigned by that loop
				}
				
			} else if ($a1 == 'N') {
				$loc = 'I';
				$a2  = $answerString["16"];#Do you see yourself purchasing a vehicle in the future? Answer in y or n
				if ($a2 == 'Y') {
					$n += 1;
					$l = $this->vehicle($loc,$answerString,2);
					$totalCost += $l[0];
					$total += $l[1];
				}
				
				#echo ("<br>" . 'Total cost is:' . $totalCost);
			}
			$nat = $this->nature($total, $n);
				
				
				$this -> childWedSecond($age,58,$nat);
				$this -> retireSecond($age,60,$nat,$loc);
				
				
			#echo ("<br>" . 'Total current expense cost is:' . $totalCost);
			$finalValues = $this -> sort_expense($this->age_array , $this->money_array);
			
			return array(
				$loc,
				$nat,
				$totalCost,
				$spouse,
				$finalValues[0],
				$finalValues[1],
					$this->label_array
			);


		} else if (47 <= $age && $age < 60) {
			$totalCost = 0;
			$total     = 0;
			$nat       = 0;
			$n         = 1;
			
			$loc = 'I';
			$l   = $this->wedding($loc,$answerString);
			$totalCost += $l[0];
			$total += $l[1];
			$nat = $answerString["20"];
			#echo $nat;
			#echo ("<br>" . 'Total cost is:' . $totalCost);
			#echo ("<br>" . 'Total current expense cost is:' . $totalCost);
			$spouse = 'N';
			
			$total+=$this->retireSecond($age,60,$nat,$loc);
			$finalValues = $this -> sort_expense($this->age_array , $this->money_array);
			
			return array(
				$loc,
				$nat,
				$totalCost,
				$spouse,
				$finalValues[0],
				$finalValues[1],
					$this->label_array
			);
		}
	}

}
?>	