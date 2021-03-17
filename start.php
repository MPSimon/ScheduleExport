<?php
include 'includes/Activities.php';
include 'Controllers/ExportController.php';

echo "What schedule would you like to export? \n";
echo "1: Full schedule \n";
echo "2: Vacuum schedule \n";
echo "3: Window schedule \n";
echo "4: Fridge schedule \n \n";
echo "Number to export: ";

$handle = fopen ("php://stdin","r");
$line = fgets($handle);
if ($line == '1') {
    ExportController::all();
    echo "Full schedule exported!\n";
    exit;
} elseif ($line == 2) {
    ExportController::vacuum();
    echo "Vacuum schedule exported!\n";
    exit;
} elseif ($line == 3) {
    ExportController::windows();
    echo "Window schedule exported!\n";
    exit;
} elseif ($line == 4) {
    ExportController::fridge();
    echo "Fridge schedule exported!\n";
    exit;
} else {
    echo 'Wrong input';
}
fclose($handle);
echo "\n";



//cli
//For ($var->fixedDayMonth)



//    $laatste = new dateTime('+1 month');
//    $datenow = new dateTime('now');
//    $var = new activities('schoonmaken','3months', new dateTime('now'));
//    print_r($var->fixedDayMonth($datenow, $datenow->modify('+4 months'),'2'));
//    var_dump($var->fixedDayMonth($datenow, $datenow->modify('+4 months'),'2')->$lijst3);

//    $lastworkable1=date('Y-m-d', strtotime('last weekday '.date("F Y", strtotime('next month '.'Y'))));
//    $lastworkable2=date('Y-m-d', strtotime('last weekday '.date("F Y", strtotime('+2 month'))));
//    $lastworkable3=date('Y-m-d', strtotime('last weekday '.date("F Y", strtotime('+3 month'))));
//
//    var_dump($lastworkable1);
//    var_dump($lastworkable2);
//    var_dump($lastworkable3);

//    $date = new DateTime('now');
//    $stofzuigen = new DateTime('00:21:00');
//    $lijst1 = array();
//
//    for ($i = 0; $i < 12; $i++) {
//        $current = clone $date;
//        $current->modify('+' . $i . ' week');
//
//        if ($current->format('n') > $i + 1) {
//            $current->modify('tuesday');
//        }
//        $stofzuiglijst1 = array("Stofzuigen" , $current->format('Y-m-d') , $stofzuigen->format('H:i'));
//        $lijst1[$i] = $stofzuiglijst1;
//    }
//
//    var_dump($lijst1);

//    $startDate = 'today';
//    $endDate = '+3 months';
//    $dayOfWeek = 2;

//    for ($i = strtotime($startDate); $i <= strtotime($endDate); $i = strtotime('+1 day', $i)) {
//        if (date('N', $i) == $dayOfWeek) //Monday == 1
//            $array[] = [
//                'Date' => date('Y-m-d', $i),
//                'Activity' => 'Stofzuigen',
//                'Time' => '00:21'
//            ];
//    }


//    for ($i = strtotime($startDate); $i <= strtotime($endDate); $i = strtotime('last weekday '.strtotime('next month '.'Y', $i))) {
//        if (date($i) == strtotime('last weekday'))
//        $array[] = [
//            'Date' => date('Y-m-d', $i),
//            'Activity' => 'Wazen',
//            'Time' => '00:21'
//        ];
//    }



//    while (strtotime($startDate) <= strtotime($endDate)) {
//        $startDate = date('Y-m-d', strtotime('last weekday '.date("F Y", strtotime('next month '))));
//            $array[] = [
//                'Date' => $startDate,
//                'Activity' => 'Test',
//                'Time' => '21:47'
//            ];
//    }


//    $startDate = new dateTime('now');
//    $endDate = clone $startDate->modify('+3 months');

//    $startDate = 'now';
//    $endDate = '+3 months';

//    $test = clone $startDate->modify('next month');
//    $test->modify('first weekday');
//
//    date()
//
//    var_dump($test);


//        for ($i = date(strtotime($startDate)); $i <= date(strtotime($endDate)); $i = date(strtotime('last weekday ', $i))) {
//                $array[] = [
//                    'Date' => strtotime($i),
//                    'Activity' => 'Wazen',
//                    'Time' => '00:21'
//                ];
//        }
//
//    $nee1 = new dateTime('last weekday');
//    var_dump($nee1);

//    $list = [];
//    $title = 'hoi';
//
//    $last = new dateTime('last weekday');
//    array_push($list, $last);
//
//    $last2 = clone $last;
//    $last2->modify('+1 month')->modify('last weekday');
//    array_push($list, $last2);
//
//    $last3 = clone $last2;
//    $last3->modify('+1 month')->modify('last weekday');
//    array_push($list, [
//            'title' => $title,
//            'date' => $last3,
//            'timespent' => '21',
//    ]);
//
//    var_dump($list);
//
//    $lastworkable1=date('Y-m-d', strtotime('last weekday '.date("F Y", strtotime('next month '.'Y'))));


//    var_dump($var->fixedDayWeek($datenow, $datenow->modify('+4 months'), '2'));


?>