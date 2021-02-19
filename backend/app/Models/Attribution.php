<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\Clients;
// use App\Models\Ordis;

class Attribution extends Model
{
    use HasFactory;

    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'attributions';
    /**
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
     * Get the client that owns the attribution.
     */
    public function client()
    {
        return $this->belongsTo('App\Models\Clients');
    }
    /**
     * Get the ordi that owns the attribution.
     */
    public function ordi()
    {
        return $this->belongsTo('App\Models\Ordis');
    }
}
