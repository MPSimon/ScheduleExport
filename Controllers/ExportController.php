<?php

class ExportController
{
    public static function vacuum() {
        $activities = new Activities('vacuum');
        $result = $activities->vacuum();

        $fp = fopen('file.csv', 'w');

        foreach ($result as $fields) {
            fputcsv($fp, $fields);
        }
    }

    public static function windows() {
        $activities = new Activities('window');
        $result = $activities->window();

        $fp = fopen('file.csv', 'w');

        foreach ($result as $fields) {
            fputcsv($fp, $fields);
        }
    }

    public static function fridge() {
        $activities = new Activities('fridge');
        $result = $activities->fridge();

        $fp = fopen('file.csv', 'w');

        foreach ($result as $fields) {
            fputcsv($fp, $fields);
        }
    }

    public static function all() {
        $activities = new Activities('all');
        $result = $activities->all();

        $fp = fopen('file.csv', 'w');

        foreach ($result as $fields) {
            fputcsv($fp, $fields);
        }
    }
}