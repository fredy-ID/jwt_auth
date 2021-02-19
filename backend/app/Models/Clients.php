<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ordis;

class Clients extends Model
{
    use HasFactory;   /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'clients'; /**
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
    public $incrementing = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nom','prenom'];
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true; 
    /**
     * Get the attribution for the client.
    */
    public function attribution()
    {
        return $this->hasMany('App\Models\Attribution');
    }    
}
