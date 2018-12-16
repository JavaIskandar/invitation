<?php
/**
 * Created by PhpStorm.
 * User: Java Iskandar
 * Date: 05/12/2018
 * Time: 10:01
 */

namespace App;


class Helper
{
    public static function get_geocode($query){
        return 'https://nominatim.openstreetmap.org/search.php?format=json&q='.$query.'&limit=50&email=iskandarjava@gmail.com';
    }

    public static function get_reverse_geocode($lat, $lon){
        return 'https://nominatim.openstreetmap.org/reverse?addressdetails=1&format=json&lat='.$lat.'&lon='.$lon.'&email=iskandarjava@gmail.com';
//        return 'https://nominatim.openstreetmap.org/reverse?addressdetails=1&format=json&lat='.$lat.'&lon='.$lon.'&email=iskandarjava@gmail.com';
    }

    public static function get_jam(){
        $jam = array();
        $jam[0]= '--';
        $range = 1;
        for ($i=0; $i<24; $i++){
            for($c = 0; $c<60; $c+=5){
                $hour = ''.$i;
                $minute = ''.$c;
                if ($i<10){
                    $hour = '0'.$i;
                }
                if ($minute<10){
                    $minute = '0'.$c;
                }
                $jam[$range++] = $hour.'.'.$minute;
            }
        }
        return $jam;
    }

    public static function get_hari(){
        $hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum\'at', 'Sabtu', 'Minggu'];
        return $hari;
    }

    public static function get_days(){
        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        return $days;
    }
    public static function is_jam_kerja($jam){
        date_default_timezone_set("Asia/Bangkok");
        $days = self::get_days();
        $today = date("l");
        $index=0;
        foreach ($days as $key=>$day){
            if($day == $today){
                $index = $key;
            }
        }

        if (!is_null($jam)){
            if($jam->buka[$index] == '--' || $jam->tutup[$index] == '--'){
                return false;
            }

            $jam_buka = (int)str_replace('.', '', $jam->buka[$index]);
            $jam_tutup = (int)str_replace('.', '', $jam->tutup[$index]);
            $jam_sekarang = (int)str_replace(':', '', date('H:i'));

            if($jam_tutup > $jam_buka && $jam_sekarang > $jam_buka && $jam_sekarang <$jam_tutup){
                return true;
            }

            else if ($jam_tutup < $jam_buka && ($jam_sekarang > $jam_buka || $jam_sekarang < $jam_tutup)){
                return true;
            }
        }
        return false;
    }
}