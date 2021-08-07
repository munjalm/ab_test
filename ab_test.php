#!php
<?php

$start_date = getDateFromUser("Please enter a start date (dd/mm/yyyy) ", "d/m/Y");

if(!$start_date)
	exit;

$end_date = getDateFromUser("Please enter an end date (dd/mm/yyyy) ", "d/m/Y");

if(!$end_date)
	exit;

if($start_date->format('d/m/Y') === $end_date->format('d/m/Y')){
	print "Start date and end date cannot be same.";	
	exit;
}


if($start_date->getTimestamp() > $end_date->getTimestamp()){
	print "Start date cannot be greater than end date.";	
	exit;
}


$no_of_days_elapsed = ((int) $end_date->diff($start_date)->format("%a") - 1);

print $no_of_days_elapsed . ' days';


function getDateFromUser(string $prompt_text, string $date_format){
	$input = readline($prompt_text);
	$date = \DateTime::createFromFormat($date_format, $input);
	if($date === false || $input != $date->format($date_format)  ) {
	    print "Please enter a valid date. The date is not a valid date.";
	    return false;
	}
		return $date;
}

