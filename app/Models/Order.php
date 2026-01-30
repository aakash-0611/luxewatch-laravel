<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total',
        'status'
    ];

    protected $casts = [
        'total' => 'decimal:2',
    ];

    // 🔗 Relationships

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    // 💰 Business Logic

    public function calculateTotal(): void
    {
        $this->total = $this->items->sum(
            fn ($item) => $item->price * $item->qty
        );

        $this->save();
    }
}
?>