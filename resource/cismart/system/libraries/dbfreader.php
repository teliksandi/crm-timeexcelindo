<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once(BASEPATH . "plugins/xbase/Table.php");
require_once(BASEPATH . "plugins/xbase/Memo.php");
require_once(BASEPATH . "plugins/xbase/Column.php");
require_once(BASEPATH . "plugins/xbase/Record.php");

use xbase\Table;

class CI_dbfreader {

    // read tabel output
    function read_out($table_path = "") {
        // new object table
        $table = new Table($table_path, null, 'CP1251');
        // params
        $rs_out = array();
        // read table 
        while ($record = $table->nextRecord()) {
            $data = array();
            $data["kode_satker"] = $record->kdsatker;
            $data["kode_output"] = $record->kdoutput;
            $data["kode_kegiatan"] = $record->kdgiat;
            $data["kode_tahun"] = $record->thang;
            // push data
            array_push($rs_out, $data);
        }
        // result
        return $rs_out;
    }

    // read tabel sub-output
    function read_sout($table_path = "") {
        // new object table
        $table = new Table($table_path, null, 'CP1251');
        // params
        $rs_sout = array();
        // read table 
        while ($record = $table->nextRecord()) {
            $data = array();
            $data["kode_satker"] = $record->kdsatker;
            $data["kode_output"] = $record->kdoutput;
            $data["kode_kegiatan"] = $record->kdgiat;
            $data["kode_tahun"] = $record->thang;
            $data["kode_sub_output"] = $record->kdsoutput;
            $data["nama_sub_output"] = $record->ursoutput;
            $data["volume_item"] = $record->volsout;
            // push data
            array_push($rs_sout, $data);
        }
        // result
        return $rs_sout;
    }

    // read tabel komponen
    function read_kmp($table_path = "") {
        // new object table
        $table = new Table($table_path, null, 'CP1251');
        // params
        $rs_kmp = array();
        // read table 
        while ($record = $table->nextRecord()) {
            $data = array();
            $data["kode_satker"] = $record->kdsatker;
            $data["kode_output"] = $record->kdoutput;
            $data["kode_kegiatan"] = $record->kdgiat;
            $data["kode_tahun"] = $record->thang;
            $data["kode_sub_output"] = $record->kdsoutput;
            $data["kode_komponen"] = $record->kdkmpnen;
            $data["nama_komponen"] = $record->urkmpnen;
            // push data
            array_push($rs_kmp, $data);
        }
        // result
        return $rs_kmp;
    }

    // read tabel sub-komponen
    function read_skmp($table_path = "") {
        // new object table
        $table = new Table($table_path, null, 'CP1251');
        // params
        $rs_skmp = array();
        // read table 
        while ($record = $table->nextRecord()) {
            $data = array();
            $data["kode_satker"] = $record->kdsatker;
            $data["kode_output"] = $record->kdoutput;
            $data["kode_kegiatan"] = $record->kdgiat;
            $data["kode_tahun"] = $record->thang;
            $data["kode_sub_output"] = $record->kdsoutput;
            $data["kode_komponen"] = $record->kdkmpnen;
            $data["kode_sub_komponen"] = $record->kdskmpnen;
            $data["nama_sub_komponen"] = $record->urskmpnen;
            // push data
            array_push($rs_skmp, $data);
        }
        // result
        return $rs_skmp;
    }

    // read tabel akun
    function read_akun($table_path = "") {
        // new object table
        $table = new Table($table_path, null, 'CP1251');
        // params
        $rs_akun = array();
        // read table 
        while ($record = $table->nextRecord()) {
            $data = array();
            $data["kode_satker"] = $record->kdsatker;
            $data["kode_output"] = $record->kdoutput;
            $data["kode_kegiatan"] = $record->kdgiat;
            $data["kode_tahun"] = $record->thang;
            $data["kode_sub_output"] = $record->kdsoutput;
            $data["kode_komponen"] = $record->kdkmpnen;
            $data["kode_sub_komponen"] = $record->kdskmpnen;
            $data["kode_akun"] = $record->kdakun;
            $data["kode_sd"] = $record->kdbeban;
            $data["kode_kppn"] = $record->kdkppn;
            // push data
            array_push($rs_akun, $data);
        }
        // result
        return $rs_akun;
    }

    // read tabel item
    function read_item($table_path = "") {
        // new object table
        $table = new Table($table_path, null, 'CP1251');
        // params
        $rs_item = array();
        // read table
        while ($record = $table->nextRecord()) {
            $data = array();
            $data["kode_satker"] = $record->kdsatker;
            $data["kode_output"] = $record->kdoutput;
            $data["kode_kegiatan"] = $record->kdgiat;
            $data["kode_tahun"] = $record->thang;
            $data["kode_sub_output"] = $record->kdsoutput;
            $data["kode_komponen"] = $record->kdkmpnen;
            $data["kode_sub_komponen"] = $record->kdskmpnen;
            $data["kode_akun"] = $record->kdakun;
            $data["nama_item"] = $record->nmitem;
            $data["volume_item"] = $record->volkeg;
            $data["satuan_item"] = $record->satkeg;
            $data["harga_item"] = $record->hargasat;
            $data["jumlah"] = $record->jumlah;
            array_push($rs_item, $data);
        }
        // result
        return $rs_item;
    }

}

?>