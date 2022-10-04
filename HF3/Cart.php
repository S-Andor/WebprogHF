<?php


class Cart
{
    /**
     * @var CartItem[]
     */
    private array $items = [];

    /**
     * Add Product $product into cart. If product already exists inside cart
     * it must update quantity.
     * This must create CartItem and return CartItem from method
     * Bonus: $quantity must not become more than whatever
     * is $availableQuantity of the Product
     *
     * @param Product $product
     * @param int $quantity
     * @return CartItem
     */
    public function addProduct(Product $product, int $quantity): CartItem
    {
        $cartItem = new CartItem($product, $quantity);
        if (in_array($cartItem,$this->items)){

            $originalQty =  $this->items[$product->getId()]->getQuantity();

            if($originalQty + $quantity <= $product->getAvailableQuantity()){
                $this->items[$product->getId()]->setQuantity($originalQty + $quantity);
            }
        }else{
            $this->items[$product->getId()] = $cartItem;
        }
        return $cartItem;
    }

    /**
     * Remove product from cart
     *
     * @param Product $product
     */
    public function removeProduct(Product $product)
    {
        $this->items[$product->getId()]->decreaseQuantity();
        if ($this->items[$product->getId()]->getQuantity() <= 0){
            unset($this->items[$product->getId()]);
        }
    }

    /**
     * This returns total number of products added in cart
     *
     * @return int
     */
    public function getTotalQuantity(): int
    {
        $total = 0;
        foreach ($this->items as $product){
            $total += $product->getQuantity();
        }
        return $total;
    }

    /**
     * This returns total price of products added in cart
     *
     * @return float
     */
    public function getTotalSum(): float
    {
        $sum = 0;
        foreach ($this->items as $product){
            $sum += $product->getQuantity() * $product->getProduct()->getPrice();
        }
        return $sum;
    }

    /**
     * @return array
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param array $items
     */
    public function setItems(array $items): void
    {
        $this->items = $items;
    }


}