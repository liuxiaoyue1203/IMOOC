<?php 
/*打开图片*/
    //1.配置图片路径
    $src='kakaxi.jpg';
    //2.获取图片信息
    $info=getimagesize($src);
    //3.通过图片编号来获取图片类型
    $type=image_type_to_extension($info[2],false);
    //4.在内存中创建一个和我们图片类型一样的图像
    $fun="imagecreatefrom{$type}";
    //5.把图片复制到我们的内存中
    $image=$fun($src);

/*操作图片*/
    //1.设置字体的路径
    $font="simkai.ttf";
    //2.填写我们的水印内容
    $content='刘晓跃';
    //3.设置字体的颜色RGB和透明度
    $col=imagecolorallocatealpha($image, 255,0,0, 50);
    //4.写入文字
    imagettftext($image,20,0,20,30,$col,$font,$content);
/*输出图片*/
    //浏览器输出
    header("Content-type:".$info['mime']);
    $func="image{$type}";
    $func($image);
    //保存图片
    $func($image,'image_font.'.$type);
/*销毁图片*/
    imagedestroy($image);
?>