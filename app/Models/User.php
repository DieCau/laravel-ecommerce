<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Atributos para su serialización
    protected $fillable = [
        'name',
        'email',
        'password',
        'adress',
        'city',
        'country',
        'zip_code',
        'phone_number',
        'profile_image',
        'profile_completed',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Relación con modelo "Order"
    public function orders()
    {
        // Un usuario puede tener varias órdenes
        // "hasMany": uno a muchos
        return $this->hasMany(Order::class)
            // Incluir los productos de las órdenes
            ->with('products')
            // Incluir los pedidos en orden de fecha de creación mas reciente
            ->latest();
    }

    // Relación con modelo "Review"
    public function reviews()
    {
        // Un usuario puede tener varias reseñas
        // "hasMany": uno a muchos
        return $this->hasMany(Review::class);
    }

    // Metodo que devuelva la URL y la imagen de perfil del usuario
    public function image_path()
    {
        if ($this->profile_image) {
            return asset('storage/images/users'.$this->profile_image);
        } else {
            return 'https://img.icons8.com/external-xnimrodx-lineal-gradient-xnimrodx/64/external-user-shopping-mall-xnimrodx-lineal-gradient-xnimrodx.png';
        }
    }
}
