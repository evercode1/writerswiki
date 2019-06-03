<?php

   /* Image Defaults
   | We set the config here so that we can keep our controllers clean.
   | Configure each image type with an image path.
   | the empty space is intentional for the code generator.
   | first array key should start on line 20
   */

return [







    // Begin ContactTopic Image Config Array Method


        'contacttopic' => [
                'destinationFolder'     => '/imgs/contacttopic/',
                'createFolder'          => '/imgs/contacttopic',
                'destinationThumbnail'  => '/imgs/contacttopic/thumbnails/',
                'thumbPrefix'           => 'thumb-',
                'imagePath'             => '/imgs/contacttopic/',
                'thumbnailPath'         => '/imgs/contacttopic/thumbnails/thumb-',
                'thumbHeight'           => 60,
                'thumbWidth'            => 60,
            ],



    // End ContactTopic Image Config Array Method
    // Begin Content Image Config Array Method


        'content' => [
                'destinationFolder'     => '/imgs/content/',
                'createFolder'          => '/imgs/content',
                'destinationThumbnail'  => '/imgs/content/thumbnails/',
                'thumbPrefix'           => 'thumb-',
                'imagePath'             => '/imgs/content/',
                'thumbnailPath'         => '/imgs/content/thumbnails/thumb-',
                'thumbHeight'           => 60,
                'thumbWidth'            => 60,
            ],



    // End Content Image Config Array Method
    
    
    








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