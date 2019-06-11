<?php
session_start();
 
	require_once 'Salary_Projection.php';
	require_once 'Expense_Profile.php';

	if($_SERVER['REQUEST_METHOD']=='GET')
	{
		
	$answerString = json_decode(($_GET['answer']), true);
	
	/* array(
                "1" => "24",
                "2" => "2400",
                "3" => "Y",
				"4" => "I",
                "5" => "H",
                "6" => "Y",
				"7" => "S",
                "8" => "Y",
                "9" => "O",
				"10" => "3"
            ); */
	$salaryProjection = new Salary_Projection();
	$salaryProjectionVal = $salaryProjection->startProjection( $answerString);
	
	$expenseProfile = new Expense_Profile();
	$expenseProfileVal = $expenseProfile->start_expense( $answerString);
	
	$myExpenses = $salaryProjectionVal['expense'];
	$myProjectedExpenses = $expenseProfileVal[5];
	$myProjectedExpensesAge = $expenseProfileVal[4];

	for($i = 0; $i < sizeof($myProjectedExpenses); $i++)
	{
		$pos = $myProjectedExpensesAge[$i];
		$myExpenses[$pos] = $myExpenses[$pos] + $myProjectedExpenses[$i];
	}

	$myarray['age_projection'] = $salaryProjectionVal['age_projection'];
	$myarray['salaryProjection'] = $salaryProjectionVal['salary_projection'];
	$myarray['finalExpense'] = $myExpenses;
	echo json_encode($myarray);
}

?>				