<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $table = 'activity';

    protected $fillable = ['description', 'hours', 'technician_id', 'type_id'];


    /**
     * se debe colocarel nombre de la FK ya que esta hace refencia el campo
     * document de technician t por llamarse diferente a 'id'
     * debe especificarse manualmente 
     */

    public function technician()
    {
        return $this->belongsTo(Technician::class, 'technician_id');
    }

    public function type_activity()
    {
        return $this->belongsTo(TypeActivity::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_activity', 'order_id', 'activity_id');
    }
}
