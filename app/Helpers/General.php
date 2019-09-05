<?php

namespace App\Helpers;

use App\Traits\ImagesTrait;

use DB;

class General
{
    use ImagesTrait;

    public static function statusEnableDisable($status)
    {
        if ($status) {
            $result = '<span style="width: 110px;"><span class="m-badge  m-badge--info m-badge--wide">SHOW</span></span>';
        } else {
            $result = '<span style="width: 110px;"><span class="m-badge  m-badge--warning m-badge--wide">HIDE</span></span>';
        }

        return $result;
    }

    public static function setImage($img, $id, $path)
    {
        if ($img != null) {
            $prefix_path = $path . '/' . $id;
            $path = (new self)->getHashName($img, $prefix_path);
            $image = (new self)->image($img);
            $save = (new self)->saveImage($path, $image);

            return $path;
        }
    }

    public static function destroyImg($image)
    {
        return (new self)->destroyImage($image);
    }

    public static function existsImg($image)
    {
        return (new self)->existsImage($image);
    }

    public static function columnDatatable($datas)
    {
        foreach ($datas as $data) {
            $columns[] = ['data' => $data, 'name' => $data];
        }
        return json_encode($columns);
    }

    public static function getSegmentFromEnd($url, $position_from_end = 1)
    {
        $segments = $url;
        return $segments[sizeof($segments) - $position_from_end];
    }

    public function humanizeTime($timeLeft)
    {
        $sisaDetik = ($timeLeft % 60);
        $menit = (($timeLeft - $sisaDetik) / 60);
        $sisaMenit = ($menit % 60);
        $jam = (($menit - $sisaMenit) / 60);
        $minuteString = ($sisaMenit < 10) ? '0' + $sisaMenit : $sisaMenit;
        $secondString = ($sisaDetik < 10) ? '0' + $sisaDetik : $sisaDetik;

        return ['jam' => $jam, 'menit' => $minuteString, 'detik' => $secondString];
    }

    function random_str($length, $keyspace = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ')
    {
        $str = '';
        $max = mb_strlen($keyspace, '8bit') - 1;
        for ($i = 0; $i < $length; ++$i) {
            $str .= $keyspace[random_int(0, $max)];
        }
        return $str;
    }

    public static function array_msort($array, $cols)
    {
        $colarr = array();
        foreach ($cols as $col => $order) {
            $colarr[$col] = array();
            foreach ($array as $k => $row) {
                $colarr[$col]['_' . $k] = strtolower($row[$col]);
            }
        }
        $eval = 'array_multisort(';
        foreach ($cols as $col => $order) {
            $eval .= '$colarr[\'' . $col . '\'],' . $order . ',';
        }
        $eval = substr($eval, 0, -1) . ');';
        eval($eval);
        $ret = array();
        foreach ($colarr as $col => $arr) {
            foreach ($arr as $k => $v) {
                $k = substr($k, 1);
                if (!isset($ret[$k])) $ret[$k] = $array[$k];
                $ret[$k][$col] = $array[$k][$col];
            }
        }

        return $ret;
    }

    public static function unique_id($connection, $table, $field_name, $digits)
    {
        $kode = "";
        $kode .= rand(1, 9);
        for ($i = 1; $i <= $digits - 1; $i++) {
            $kode .= rand(0, 9);
        }

        $cariTiket =  DB::connection($connection)->table($table)->where($field_name, '=', $kode)->count();
        if (!$cariTiket) {
            return $kode;
        } else {
            return self::unique_id($connection, $table, $field_name, $digits);
        }
    }

    public static function days_interval($from_date, $to_date)
    {
        $start_date = new \DateTime(date('Y-m-d', strtotime($from_date)));
        $end_date = new \DateTime(date('Y-m-d', strtotime($to_date)));
        $interval = $start_date->diff($end_date);

        $day_expires = $interval->format('%R%a');

        return (int)$day_expires;
    }

    public static function religion_list()
    {
        $religions = [
            'Islam' => 'Islam'
        ];

        return $religions;
    }

    public static function orphan_status_list()
    {
        $lists = [
            '1' => 'Ya',
            '2' => 'Tidak',
        ];

        return $lists;
    }

    public static function education_list()
    {
        $lists = [
            'SD' => 'Sekolah Dasar',
            'SMP' => 'Sekolah Menengah Pertama',
            'SMA' => 'Sekolah Menengah Atas Sederajat',
            'D1' => 'Diploma I',
            'D2' => 'Diploma II',
            'D3' => 'Diploma III',
            'S1' => 'Strata 1',
            'S2' => 'Strata 2',
            'S3' => 'Strata 3'
        ];

        return $lists;
    }

    public static function child_status_list()
    {
        $lists = [
            'Anak Kandung' => 'Anak Kandung',
            'Anak Angkat' => 'Anak Angkat'
        ];

        return $lists;
    }
}
