<?php

use Illuminate\Support\Facades\Storage;

if( !function_exists( 'storeImage' ) ) {
    function storeImage($request, $key){
        $image = $request->file($key);
        $ImagePath = 'images/'. $image->hashName();

        Storage::disk('public')->put($ImagePath, file_get_contents($image));

        return $image->hashName();
    }
}
