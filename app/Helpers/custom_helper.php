<?php

function user_login()
{
    $db = \Config\Database::connect();
    return $db->table('user')->where('id_user', session('id_user'))->get()->getRow();
}

function count_data($table = null, $id_periode = null)
{
    $db = \Config\Database::connect();
    if (is_null($id_periode)) {
        return $db->table($table)->countAllResults();
    } else {
        return $db->table($table)->where('id_periode', session('id_periode'))->countAllResults();
    }
}

function cek_penilaian()
{
    $db = \Config\Database::connect();
    return $db->table('alternatif')->where(['status_penilaian'=>0,'id_periode'=>session('id_periode')])->countAllResults();
}

function tgl_indo($tanggal){
    $bulan = array (
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );

    $pecahkan = explode('-', $tanggal);
    
    return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}

?>