<?php

class Home extends Controllers{
    public function __construct() {
        parent::__construct();
    }

    public function home() {
        $data['page_id'] = 1;
        $data['page_tag'] = "Home";
        $data['page_title'] = "Pagina principal";
        $data['page_name'] = "home";
        $data['page_content'] = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque rerum ipsam laudantium enim similique optio numquam quis. Rerum nesciunt architecto, officiis aut et molestiae atque! Adipisci ducimus magnam neque fuga!";

        $this->views->getView($this,"home",$data);
    }

}
