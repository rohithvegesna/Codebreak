<?php

class Salary_Projection
{
    //put your code here
    // constructor
    public function __construct()
    {
    }
    // destructor
    public function __destruct()
    {
    }
    
    public function incr($sal, $age, $inc)
    {
        $incVal = $inc * $sal / 100;
        return $incVal;
    }
    
    public function bonus($sal, $age)
    {
        $bonus = 7.5 * $sal / 100;
        return $bonus;
    }
    
    public function inv_inc($fr, $sal)
    {
        $invInc = $fr * $sal / 100;
        return $invInc;
    }
    
    public function EOYRet($fr, $init_invInc)
    {
        $returnVal = $fr * $init_invInc / 100;
        return $returnVal;
    }
    
    public function startProjection($answerString)
    {
        $sal_proj_json = array();
        $age_array     = array();
        $sal_array     = array();
        $inc_array     = array();
        $bonus_array   = array();
        $invest_array  = array();
        $expense_array  = array();
        
            $myarray['success'] = 'successful';
            
            $age = $answerString["1"];
			
            $sal = $answerString["2"];
            $inc = 10;
            
            $init_inc    = $this->incr($sal, $age, $inc);
            $init_bonus  = $this->bonus($sal, $age);
            $init_invInc = $this->inv_inc(15, $sal);
            
            $total_sal    = $sal;
            $total_bon    = $init_bonus;
            $total_invInc = $init_invInc;
            
            #ages 21-25 - 10% inc
            while ($age < 25) {
                $age += 1;
                $sal += round($init_inc);
                $init_inc    = round($this->incr($sal, $age, $inc));
                $init_bonus  = round($this->bonus($sal, $age));
                $init_incInc = round($this->inv_inc(15, $sal));
                $total_invInc += $init_incInc;
                $total_sal += $sal;
                $total_bon += $init_bonus;
                
                array_push($age_array, $age);
                array_push($sal_array, $sal);
                array_push($inc_array, $init_inc);
                array_push($bonus_array, $init_bonus);
                array_push($invest_array, $init_incInc);
                array_push($expense_array , $sal - $init_incInc);
                
            }
        
		#age 26 - 28
		
			while ($age <27)
			{
				$age = $age + 1;
				array_push($age_array, $age);
				array_push($sal_array, 0);
				array_push($expense_array , 0);
			}
		if($age<28){
			$age = 28;}
            if($age == 28)
			{
            #28 - salary doubles and 10% inc
            $sal *= 2;
            $init_inc    = round($this->incr($sal, $age, $inc));
            $init_bonus  = round($this->bonus($sal, $age));
            $init_incInc = round($this->inv_inc(20, $sal));
            $total_sal += $sal;
            $total_bon += $init_bonus;
            $total_invInc += $init_incInc;
            
            array_push($age_array, $age);
            array_push($sal_array, $sal);
            array_push($inc_array, $init_inc);
            array_push($bonus_array, $init_bonus);
            array_push($invest_array, $init_incInc);
                array_push($expense_array , $sal - $init_incInc);
				$age=29;
            }
            
            #29 - 10% inc
            while ($age == 29) {
                
                $sal += round($init_inc);
                $init_inc    = round($this->incr($sal, $age, $inc));
                $init_bonus  = round($this->bonus($sal, $age));
                $init_incInc = round($this->inv_inc(20, $sal));
                $total_sal += $sal;
                $total_bon += $init_bonus;
                $total_invInc += $init_incInc;
                
                array_push($age_array, $age);
                array_push($sal_array, $sal);
                array_push($inc_array, $init_inc);
                array_push($bonus_array, $init_bonus);
                array_push($invest_array, $init_incInc);
                array_push($expense_array , $sal - $init_incInc);
                $age += 1;
            }
            
            
            #30 - 25% inc     
            if ($age == 30 && $initial_age!=30) {
                
				$sal += round($init_inc);
                $init_inc    = round($this->incr($sal, $age, 25));
                $init_bonus  = round($this->bonus($sal, $age));
                $init_incInc = round($this->inv_inc(20, $sal));
                $total_sal += $sal;
                $total_bon += $init_bonus;
                $total_invInc += $init_incInc;
                
                array_push($age_array, $age);
                array_push($sal_array, $sal);
                array_push($inc_array, $init_inc);
                array_push($bonus_array, $init_bonus);
                array_push($invest_array, $init_incInc);
                array_push($expense_array , $sal - $init_incInc);
                $age += 1;
            }
            
            
            #31-36 - variable incriments
            $r = 9.5;
            while ($age <= 36) {
                $age += 1;
                $sal += round($init_inc);
                $init_inc    = round($this->incr($sal, $age, $r));
                $init_bonus  = round($this->bonus($sal, $age));
                $init_incInc = round($this->inv_inc(25, $sal));
                $r -= 0.5;
                $total_sal += $sal;
                $total_bon += $init_bonus;
                $total_invInc += $init_incInc;
                
                array_push($age_array, $age);
                array_push($sal_array, $sal);
                array_push($inc_array, $init_inc);
                array_push($bonus_array, $init_bonus);
                array_push($invest_array, $init_incInc);
                array_push($expense_array , $sal - $init_incInc);
                
            }
            
            
            #37 - 35% inc
            if ($age == 37) {
				$age += 1;
                $sal += round($init_inc);
                $init_inc    = round($this->incr($sal, $age, 35));
                $init_bonus  = round($this->bonus($sal, $age));
                $init_incInc = round($this->inv_inc(25, $sal));
                $total_sal += $sal;
                $total_bon += $init_bonus;
                $total_invInc += $init_incInc;
                
                array_push($age_array, $age);
                array_push($sal_array, $sal);
                array_push($inc_array, $init_inc);
                array_push($bonus_array, $init_bonus);
                array_push($invest_array, $init_incInc);
                array_push($expense_array , $sal - $init_incInc);
                
            }
            
            
            #38-45 - 7% incriment        
            while ($age < 45) {
                $age += 1;
                $sal += round($init_inc);
                $init_inc    = round($this->incr($sal, $age, 7));
                $init_bonus  = round($this->bonus($sal, $age));
                $init_incInc = round($this->inv_inc(30, $sal));
                $total_sal += $sal;
                $total_bon += $init_bonus;
                $total_invInc += $init_incInc;
                
                array_push($age_array, $age);
                array_push($sal_array, $sal);
                array_push($inc_array, $init_inc);
                array_push($bonus_array, $init_bonus);
                array_push($invest_array, $init_incInc);
                array_push($expense_array , $sal - $init_incInc);
                
            }
            
            #46 - 50% incriment    
            if ($age == 46) {
				$age = 46;
                $sal += round($init_inc);
                $init_inc    = round($this->incr($sal, $age, 50));
                $init_bonus  = round($this->bonus($sal, $age));
                $init_incInc = round($this->inv_inc(30, $sal));
                $total_sal += $sal;
                $total_bon += $init_bonus;
                $total_invInc += $init_incInc;
                
                array_push($age_array, $age);
                array_push($sal_array, $sal);
                array_push($inc_array, $init_inc);
                array_push($bonus_array, $init_bonus);
                array_push($invest_array, $init_incInc);
                array_push($expense_array , $sal - $init_incInc);
            }
            
            #47-60 - 15% incriment
            while ($age < 60) {
                $age += 1;
                $sal += round($init_inc);
                $init_inc    = round($this->incr($sal, $age, 15));
                $init_bonus  = round($this->bonus($sal, $age));
                $init_incInc = round($this->inv_inc(40, $sal));
                $total_sal += $sal;
                $total_bon += $init_bonus;
                $total_invInc += $init_incInc;
                $total_exp = $total_sal - $total_invInc;
                
                array_push($age_array, $age);
                array_push($sal_array, $sal);
                array_push($inc_array, $init_inc);
                array_push($bonus_array, $init_bonus);
                array_push($invest_array, $init_incInc);
                array_push($expense_array , $sal - $init_incInc);
                
            }
while ($age < 80)
{
  $age += 1;
array_push($age_array, $age);
                array_push($sal_array, 0);
                array_push($expense_array , 0);

}
            $sal_proj_json[0] = $age_array;
            $sal_proj_json[1] = $sal_array;
            $sal_proj_json[2] = $expense_array ;
            

            $myarray['age_projection']    = $age_array;
            $myarray['salary_projection'] = $sal_array;
            $myarray['expense'] = $expense_array ;			
			
			
            return($myarray);
        }
		
		
    
}
?>		