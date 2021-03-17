<?php

class Activities
{
    public string $activity;
    public string $startDate;
    public string $endDate;

    /**
     * activities constructor.
     * @param $activity
     * @param $startDate
     * @param $endDate
     */
    public function __construct($activity, $startDate = 'now', $endDate = '+3 months')
    {
        $this->activity = $activity;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    //Vacuum

    public function fixedDayWeek(string $dayOfWeek = 'Tue')
    {
        for ($i = strtotime($this->startDate); $i <= strtotime($this->endDate); $i = strtotime('+1 day', $i)) {
            if (date('D', $i) == $dayOfWeek) //Monday == 1
                $value[] = date('Y-m-d', $i);
        }
        return $value;
    }

    public function vacuum(string $dayOfWeek = 'Tue')
    {
        $vacuum = $this->fixedDayWeek($dayOfWeek);

        foreach ($vacuum as $vac) {
            $array[] = [
                'Date' => $vac,
                'Activity' => "Vacuum",
                'Time' => '00:21'
            ];
        }
        return $array;
    }


    //Windows
    //Komende 3 maanden ramen lappen

    public function fixedDayMonth() {
        For ($i =1; $i <= 3; $i++) {
            $lastworkable[] = date('Y-m-d', strtotime('last weekday '.date("F Y", strtotime( '+'. $i .' month'))));
        }
        return $lastworkable;
    }

    public function window() {
        $windows = $this->fixedDayMonth();

        foreach ($windows as $window) {
            $array[] = [
                'Date' => $window,
                'Activity' => 'Ramen lappen',
                'Time' => '00:35'
            ];
        }
        return $array;
    }

    //Fridge

    public function fridge() {
        $fridgeDates = $this->firstTueOrThu();
        array_push($fridgeDates, $this->firstTueOrThurs());

        sort($fridgeDates);

        foreach ($fridgeDates as $fridgeDate) {
            $array[] = [
                'Date' => $fridgeDate,
                'Activity' => 'Clean Fridge',
                'Time' => '00:50'
            ];
        }
        return $array;
    }

    //find first tuesday or first thursday
    public function firstTueOrThurs() {
        $nextTuesday = date('Y-m-d', strtotime('next tuesday'));
        $nextThursday = date('Y-m-d', strtotime('next thursday'));

        if ($nextThursday < $nextTuesday) {
            return $nextThursday;
        } else {
            return $nextTuesday;
        }
    }

    public function firstTueOrThu() {
        $array = [];
        For ($i = 0; $i <= 1; $i++) {
            $firstTue = date('Y-m-d', strtotime('first tuesday of next month'.date("F Y", strtotime( '+'. $i .' month'))));
            $firstThu = date('Y-m-d', strtotime('first thursday of next month'.date("F Y", strtotime( '+'. $i .' month'))));

            if ($firstThu < $firstTue) {
                array_push($array, $firstThu);
            } else {
                array_push($array, $firstTue);
            }
        }
        return $array;
    }

    public function all() {

        $array = array_merge($this->vacuum(), $this->window(), $this->fridge());

        sort($array);
        return $array;
    }
}