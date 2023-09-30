<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FromField extends Model
{
    use HasFactory;

    public function template()
    {
        return $this->belongsTo(template::class, 'template_id');
    }

    protected $fillable = [
        'template_id',
        'name',
        'type',
    ];

}
