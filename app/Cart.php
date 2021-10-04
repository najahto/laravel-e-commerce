<?php

namespace App;

class Cart
{
    public $items = null;
    public $totalQuantity = 0;

    public function __construct($oldCart)
    {
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->totalQuantity = $oldCart->totalQuantity;
        }
    }

    public function add($item, $product_id)
    {
        $storedItem = [
            'qty' => 0, 'product_id' => 0, 'product_name' => $item->name,
            'product_price' => $item->price, 'product_discount' => $item->discount,
            'product_image' => $item->image_url, 'item' => $item
        ];

        if ($this->items) {
            if (array_key_exists($product_id, $this->items)) {
                $storedItem = $this->items[$product_id];
            }
        }

        $storedItem['qty']++;
        $storedItem['product_id'] = $product_id;
        $storedItem['product_name'] = $item->name;
        $storedItem['product_price'] = $item->price;
        $storedItem['product_discount'] = $item->discount;
        $storedItem['product_image'] = $item->image_url;
        $this->totalQuantity++;
        $this->items[$product_id] = $storedItem;
    }

    public function updateQuantity($id, $qty)
    {
        $this->totalQuantity -= $this->items[$id]['qty'];
        $this->totalPrice -= $this->items[$id]['product_price'] * $this->items[$id]['qty'];
        $this->items[$id]['qty'] = $qty;
        $this->totalQuantity += $qty;
    }

    public function removeItem($id)
    {
        $this->totalQuantity -= $this->items[$id]['qty'];
        unset($this->items[$id]);
    }
}