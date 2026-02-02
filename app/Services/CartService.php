<?php

namespace App\Services;

use App\Models\Product;

class CartService
{
    public static function get(): array
    {
        return session()->get('cart', []);
    }

    public static function add(Product $product, int $quantity = 1): void
    {
        $cart = self::get();

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] += $quantity;
        } else {
            $cart[$product->id] = [
                'id' => $product->id,
                'brand' => $product->brand,
                'model' => $product->model,
                'price' => $product->price,
                'quantity' => $quantity,
                'image' => $product->image_url,
            ];
        }

        session()->put('cart', $cart);
    }

    public static function update(int $productId, int $quantity): void
    {
        $cart = self::get();

        if ($quantity <= 0) {
            unset($cart[$productId]);
        } else {
            $cart[$productId]['quantity'] = $quantity;
        }

        session()->put('cart', $cart);
    }

    public static function remove(int $productId): void
    {
        $cart = self::get();
        unset($cart[$productId]);

        session()->put('cart', $cart);
    }

    public static function clear(): void
    {
        session()->forget('cart');
    }

    public static function total(): float
    {
        return collect(self::get())
            ->sum(fn ($item) => $item['price'] * $item['quantity']);
    }
    
    public static function count(): int
    {
        return collect(self::get())
            ->sum(fn ($item) => $item['quantity']);
    }

}
