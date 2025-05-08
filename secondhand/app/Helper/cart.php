<?php
namespace App\Helper;

class cart{
    private $items =[];
    private  $total_quatity=0;
    private  $total_price=0;
    public function __construct(){
        $this->items=session('cart') ? session('cart') :[];

    }
    public function list(){
        return $this->items;
    }
    public function add($product, $quantity = 1)
    {
        
        if (array_key_exists($product->id, $this->items)) {
            $this->items[$product->id]['quantity'] += $quantity;
        } else {
            $item = [
                'productId' => $product->id,
                'name' => $product->title,
                'image' => $product->thumbnail,
                'price' => ($product->sale > 0) ? $product->price - ($product->price * $product->sale / 100) : $product->price,
                'quantity' => $quantity
            ];
            $this->items[$product->id] = $item;
        }
    
        // Lưu giỏ hàng vào session
        session(['cart' => $this->items]);
    }
   

    public function getTotalPrice(){
        $totalPrice=0;
        foreach($this->items as $item){
            $totalPrice+=$item['price']*$item['quantity'];
        }
        return $totalPrice;
    }
    public function getTotalQuantity(){
        $totalQuantity=0;
        foreach($this->items as $item){
            $totalQuantity+=$item['quantity'];
        }
        return $totalQuantity;
    }
    public function deleteProduct($productId)
    {
        if (array_key_exists($productId, $this->items)) {
            unset($this->items[$productId]);
    
            // Lưu giỏ hàng vào session sau khi xóa sản phẩm
            session(['cart' => $this->items]);
        }
    }
    public function updateQuantity($productId, $newQuantity)
    {
        // Kiểm tra xem sản phẩm có tồn tại trong giỏ hàng không
        if (array_key_exists($productId, $this->items)) {
            // Kiểm tra xem số lượng mới có lớn hơn 0 không
            if ($newQuantity > 0) {
                // Cập nhật số lượng mới cho sản phẩm
                $this->items[$productId]['quantity'] = $newQuantity;

                // Lưu lại giỏ hàng đã cập nhật vào session
                session(['cart' => $this->items]);
            } else {
                // Nếu số lượng mới là 0 hoặc âm, xóa sản phẩm khỏi giỏ hàng
                $this->deleteProduct($productId);
            }
        }
    }

    public function getItem($productId)
    {
        // Trả về thông tin sản phẩm sau khi cập nhật
        return $this->items[$productId] ?? null;
    }

    
}

?>