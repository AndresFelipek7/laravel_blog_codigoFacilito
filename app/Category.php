<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	/*Nombre de la tabla*/
	protected $table = "categories";
	/*Nombre de los campos que podemos acceder*/
	protected $fillable = ['name'];

	public function articles()
	{
		return $this->hasMany('App\Article');
	}

	public function scopeSearchCategory($query , $name)
	{
		return $query->where('name' , '=' , $name);
	}
}
