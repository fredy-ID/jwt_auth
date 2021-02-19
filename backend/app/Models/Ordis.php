<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\Atribution;

class Ordis extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ordis'; /**
    * The primary key associated with the table.
    *
    * @var string
    */
    protected $primaryKey = 'id';
    /**
    * Indicates if the IDs are auto-incrementing.
    *
    * @var bool
    */
   public $incrementing = true;  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
   protected $fillable = ['nom'];
   /**
    * Indicates if the model should be timestamped.
    *
    * @var bool
    */
   public $timestamps = true;
   /**
    * Get the attribution for the ordi.
   */
   public function attribution()
   {
        return $this->hasMany('App\Models\Attribution');
   }
}
