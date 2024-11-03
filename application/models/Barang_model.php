<?php defined('BASEPATH') or exit('No direct script access allowed');
class Barang_model extends CI_Model
{
    protected $_table = 'barang';
    protected $primary = 'id';

    public function getAll()
    {
        $sql = "SELECT a.id, a.barkode, a.name, b.name AS satuan, c.name AS kateagori, a.harga_beli, a.harga_jual, a.stok FROM ((barang a LEFT JOIN satuan b ON a.
        satuan_id = b.id) LEFT JOIN kategori c ON a.kategori_id = c.id)";
        return $this->db->query($sql)->result();
    }
}
