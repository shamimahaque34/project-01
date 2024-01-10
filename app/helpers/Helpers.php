<?php

// function saveImage($image, $directory, $modelFileUrl=null , $imageNameString = null)
// {

//     if ($image)
//     {
//         if (isset($modelFileUrl))
//         {
//             if (file_exists($modelFileUrl))
//             {
//                 unlink($modelFileUrl);
//             }
//         }
//         $imageName =(isset($imageNameString) ? $imageNameString : '').time().rand(10,2000).'.'.$image->getClientOriginalExtension();
//         $image->move($directory, $imageName);
//         $imgUrl = $directory.$imageName;
//     } else {
// //        $imgUrl = $modelFileUrl;
//         if (isset($modelFileUrl)){
//             $imgUrl = $modelFileUrl;
//         }else{
//             $imgUrl = '';
//         }

//     }
//     return $imgUrl;
// }


function saveImage($image, $directory, $imageNameString = null, $modelFileUrl=null)
{

    if ($image)
    {
        if (isset($modelFileUrl))
        {
            if (file_exists($modelFileUrl))
            {
                unlink($modelFileUrl);
            }
        }
        $imageName = (isset($imageNameString) ? $imageNameString : '').time().rand(10,1000).'.'.$image->getClientOriginalExtension();
        $image->move($directory, $imageName);
        $imgUrl = $directory.$imageName;
    } else {
        $imgUrl = $modelFileUrl;
    }
    return $imgUrl;
}