<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand',
        'model',
        'price',
        'cond',
        'image_url',
        'active'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'active' => 'boolean',
    ];

    // 🔗 Relationships

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    // 🔍 Query Scopes

    public function scopeActive($query)
    {
        return $query->where('active', true);
    }
    
    public function wishlistedBy()
    {
        return $this->hasMany(Wishlist::class);
    }

}
?>