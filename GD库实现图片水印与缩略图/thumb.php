<?php
/*打开图片*/
    //1.配置图片路径
    $src='jq.jpg';
    //2.获取图片信息
    $info=getimagesize($src);
    //3.通过图片编号来获取图片类型
    $type=image_type_to_extension($info[2],false);
    //4.在内存中创建一个和我们图片类型一样的图像
    $fun="imagecreatefrom{$type}";
    //5.把图片复制到我们的内存中
    $image=$fun($src);

/*操作图片*/
    //1.在内存中建立一个宽200，高100的真色彩图片
    $image_thumb=imagecreatetruecolor(200,100);
    //2.核心步骤 将原图复制到新建的真色彩图片上，并且按照一定比例压缩
    imagecopyresampled($image_thumb,$image,0,0,0,0,200,100,$info[0],$info[1]);
    //3.销毁原图
    imagedestroy($image);
/*输出图片*/
    //浏览器输出
    header("Content-type:".$info['mime']);
    $funs="image{$type}";
    $funs($image_thumb);
    //保存图片
    $funs($image_thumb,'image_thumb.'.$type);
/*销毁图片*/
    imagedestroy($image);

   
?>