<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kode extends CI_Model { 

	public function m_kodeunik($id, $table, $kode, $karakter) { 
	        $sql = $this->db->query("SELECT MAX(RIGHT($id, 4)) AS idmax FROM ".$table);
	        $kd = ""; //kode awal
	        if($sql->num_rows() > 0) { //jika data ada
	            foreach($sql->result() as $k) {
	                $tmp = ((int)$k->idmax) + 1; //string kode diset ke integer dan ditambahkan 1 dari kode terakhir
	                $kd = sprintf("%04s", $tmp); //kode ambil 4 karakter terakhir
	            }
	        } else { //jika data kosong diset ke kode awal
	            $kd = $kode;
	        }
	        $kar = $karakter; //karakter depan kodenya
	        //gabungkan string dengan kode yang telah dibuat tadi
	        return $kar.$kd;
	}
}