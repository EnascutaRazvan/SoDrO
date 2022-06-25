<?php 

class product{
    public $product_id;
    public $product_name;
    public $product_price;
    public $product_cantity;
    public $product_category;
    public $product_ingredients;
    public $product_countries;
    public $product_stores;
    public $product_image;
    public $product_likes;


    //product constructor

    public function __construct(
       $product_id,
       $product_name,
       $product_price,
       $product_cantity, 
       $product_category,
       $product_ingredients,
       $product_countries,
       $product_stores,
       $product_image
        )
    {
       $this->product_id = $product_id;
       $this->product_name = $product_name;
       $this->product_price = $product_price;
       $this->product_cantity = $product_cantity;
       $this->product_category = $product_category;
       $this->product_ingredients = $product_ingredients;
       $this->product_countries = $product_countries;
       $this->product_stores = $product_stores;
       $this->product_image = $product_image;
       $this->product_likes = 0;
    }




    function setLikes($nr){
        $this->product_likes = $nr;
    }

    function incrementLikes(){
        $this->product_likes += 1;
    }

    
    
    
    
    
    
}
