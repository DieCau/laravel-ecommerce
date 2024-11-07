<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Lista de atributos con los que voy a trabajar
    protected $fillable = [
        'name',
        'slug',
        'quantity',
        'price',
        'desc',
        'thumbnail',
        'first_image',
        'second_image',
        'third_image',
        'status',
    ];

    // Relación con modelo "Color"
    public function colors()
    {
        // Un color puede ser usado por varios productos
        // Un producto esta asociado a varios colores
        // "belongsToMany": Muchos a muchos
        return $this->belongsToMany(Color::class);
    }

    //  Relación con modelo "Size"
    public function sizes()
    {
        // Un tamaño puede ser usado por varios productos
        // Un producto puede ser usado por varios tamaños
        return $this->belongsToMany(Size::class);
    }

    // Relación con modelo "Order"
    public function orders()
    {
        // Un producto puede ser usado por varias órdenes
        // Una órden puede ser usada por varios productos
        return $this->belongsToMany(Order::class);
    }

    // Relación con modelo "Review"
    public function reviews()
    {
        // Un producto puede tener varias reseñas
        // Una reseña esta asociada a un sólo producto
        // "hasMany": uno a muchos
        return $this->hasMany(Review::class)
            // Incluir el user que escribió la reseña
            ->with('user')
            // Incluir las reseñas aprobadas
            ->where('approved', 1)
            // Ordenar las reseñas por fecha descendente
            ->latest();
    }

    // Funcion para tener URLs amigables
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
