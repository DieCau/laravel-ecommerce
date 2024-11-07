<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    // Atributos que se pueden asignar de manera masiva
    protected $fillable = [
        'title',
        'body',
        'user_id',
        'approved',
        'rating',
        'product_id',
    ];

    // Relación con modelo "User"
    public function user()
    {
        // Una reseña pertenece a un usuario
        // "belongsTo": uno a uno
        return $this->belongsTo(User::class);
    }

    // Relación con modelo "Product"
    public function product()
    {
        // Una reseña pertenece a un producto
        // "belongsTo": uno a uno
        return $this->belongsTo(Product::class);
    }

    // Método para formatear la fecha de creación de la reseña de manera mas legible
    public function getCreatedAtAttribute($value)
    {
        // diffForHumans(): devuelve la diferencia entre dos fechas en formato amigable
        return Carbon::parse($value)->diffForHumans();
    }
}
