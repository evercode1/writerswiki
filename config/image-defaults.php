<?php

   /* Image Defaults
   | We set the config here so that we can keep our controllers clean.
   | Configure each image type with an image path.
   | the empty space is intentional for the code generator.
   | first array key should start on line 20
   */

return [







    // Begin Category Image Config Array Method


        'category' => [
                'destinationFolder'     => '/imgs/category/',
                'createFolder'          => '/imgs/category',
                'destinationThumbnail'  => '/imgs/category/thumbnails/',
                'thumbPrefix'           => 'thumb-',
                'imagePath'             => '/imgs/category/',
                'thumbnailPath'         => '/imgs/category/thumbnails/thumb-',
                'thumbHeight'           => 60,
                'thumbWidth'            => 60,
            ],



    // End Category Image Config Array Method
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

        'profile' => [
            'destinationFolder'     => '/imgs/profile/',
            'createFolder'          => '/imgs/profile',
            'destinationThumbnail'  => '/imgs/profile/thumbnails/',
            'thumbPrefix'           => 'thumb-',
            'imagePath'             => '/imgs/profile/',
            'thumbnailPath'         => '/imgs/profile/thumbnails/thumb-',
            'thumbHeight'           => 60,
            'thumbWidth'            => 60,
        ],
    
    



];