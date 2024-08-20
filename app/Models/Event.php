<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Event extends Model
{
    use HasFactory;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */

    protected $casts = [
        'items' => 'array'
    ];

    protected $dates = [
        'date',
    ];

    protected $guarded = [];

    // Definindo o relacionamento com o User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'event_user'); 
    }


    /// Método para formatar a data
    public function getFormattedDate()
    {
        return Carbon::parse($this->attributes['date'])->format('Y-m-d');
    }

}
