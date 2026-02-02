<?php

namespace App\Services;

use App\Models\Product;

class CartService
{
    public static function get(): array
    {
        return session()->get('cart', []);
    }

    public static function add(Product $product, int $qty = 1): void
    {
        $cart = self::get();

        if (isset($cart[$product->id])) {
            $cart[$product->id]['qty'] += $qty;
        } else {
            $cart[$product->id] = [
                'product' => $product,
                'qty' => $qty,
            ];
        }

        session()->put('cart', $cart);
    }

    public static function update(int $productId, int $qty): void
    {
        $cart = self::get();

        if (isset($cart[$productId])) {
            $cart[$productId]['qty'] = max(1, $qty);
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
        return collect(self::get())->sum(
            fn ($item) => $item['product']->price * $item['qty']
        );
    }
    public static function count(): int
    {
        return collect(self::get())->sum(fn ($item) => $item['qty']);
    }

}
