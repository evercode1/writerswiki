<?php

   /* Image Defaults
   | We set the config here so that we can keep our controllers clean.
   | Configure each image type with an image path.
   | the empty space is intentional for the code generator.
   | first array key should start on line 20
   */

return [







    // Begin Nudge Image Config Array Method


        'nudge' => [
                'destinationFolder'     => '/imgs/nudge/',
                'createFolder'          => '/imgs/nudge',
                'destinationThumbnail'  => '/imgs/nudge/thumbnails/',
                'thumbPrefix'           => 'thumb-',
                'imagePath'             => '/imgs/nudge/',
                'thumbnailPath'         => '/imgs/nudge/thumbnails/thumb-',
                'thumbHeight'           => 60,
                'thumbWidth'            => 60,
            ],



    // End Nudge Image Config Array Method








    'books' => [
        'destinationFolder'     => '/imgs/books/',
        'destinationThumbnail'  => '/imgs/books/thumbnails/',
        'thumbPrefix'           => 'thumb-',
        'imagePath'             => '/imgs/books/',
        'thumbnailPath'         => '/imgs/books/thumbnails/thumb-',
        'thumbHeight'           => 60,
        'thumbWidth'            => 60,
    ],


];