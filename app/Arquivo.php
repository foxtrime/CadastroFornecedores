<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Arquivo extends Model
{
	protected $table = "arquivos";
	public $timestamps = false;
	protected $fillable = [
	'cadastro_id',
   'filename'
  ];

    public function cadastro()
    {
      return $this->belongsTo(Cadastro::class);
    }


}
