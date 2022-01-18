<?php

function print_view (string $tpl_name, array $vars = []): void{
    if(!empty($vars)){
        // ['client' => [...donnee_client]]
        foreach ($vars as $name => $value){
            // $client = [...donnee_client]
            $$name = $value;
        }
    }
    $content = 'views/pages/'.$tpl_name.'.php';
    include 'views/layout/header.php';
    if(file_exists($content)){
        include $content;
    } else{
        
    }
    include 'views/layout/footer.php';
}