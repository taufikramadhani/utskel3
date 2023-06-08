<?php

namespace App\Models;

use CodeIgniter\Model;

class DaftarkegiatanModel extends Model
{
    protected $table = 'daftarkegiatan';
    
    public function getEvent($slug = false)
    {
        if($slug == false){
            return $this->findall();
        }

        return $this->where(['slug' => $slug])-> first();
    }
}