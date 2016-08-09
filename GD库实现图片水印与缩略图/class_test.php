<?php
    require 'image_class.php';
    $src='jq.jpg';
    
/*     $content='Hello,world';
    $font_url='simkai.ttf';
    $size=20;
    $color=array(
        0 => 0,
        1 => 0,
        2 => 0,
        3 => 20,
    );
    $local=array(
        'x' => 150,
        'y' => 200
    );
    $angle=10; */
    
    $source='kakaxi.jpg';
    $local=array(
        'x' =>20,
        'y' =>50
    );
    $content='hello';
    $font_url='simkai.ttf';
    $size=20;
    $color=array(
        0 => 255,
        1 => 0,
        2 => 0,
        3 => 20
    );
    $local01=array(
        'x' =>35,
        'y' =>60
    );
    $angle=10;
    $alpha=10;
    
    $image=new Image($src);
    //$image->thumb(200,150);
//     $image->fontMark($content,$font_url,$size,$color,$local,$angle);
   
    $image->imageMark($source, $local, $alpha);
    $image->thumb(200,150);
    $image->fontMark($content,$font_url,$size,$color,$local01,$angle);
    
    
    $image->show();
     $image->save('new');

?>