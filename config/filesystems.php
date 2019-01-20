<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => 'local',

    /*
    |--------------------------------------------------------------------------
    | Default Cloud Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Many applications store files both locally and in the cloud. For this
    | reason, you may specify a default "cloud" driver here. This driver
    | will be bound as the Cloud disk implementation in the container.
    |
    */

    'cloud' => 's3',

    'ftp_portal' => 'ftp_portal',

    'ftp_ifc' => 'ftp_ifc',

    'images' => 'images',

    'portal' => 'local_portal',

    'ifc' => 'local_ifc',

    'xls' => 'local_xls',

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been setup for each driver as an example of the required options.
    |
    | Supported Drivers: "local", "ftp", "s3", "rackspace"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_KEY'),
            'secret' => env('AWS_SECRET'),
            'region' => env('AWS_REGION'),
            'bucket' => env('AWS_BUCKET'),
        ],

        'ftp_portal' => [
            'driver'   => 'ftp',
            'host'     => env('FTP_PORTAL_HOST'),
            'username' => env('FTP_PORTAL_USERNAME'),
            'password' => env('FTP_PORTAL_PASSWORD'),
        ],

        'ftp_ifc' => [
            'driver'   => 'ftp',
            'host'     => env('FTP_IFC_HOST'),
            'username' => env('FTP_IFC_USERNAME'),
            'password' => env('FTP_IFC_PASSWORD'),
        ],

        'images' => [
            'driver' => 'local',
            'root' => storage_path('images'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],

        'local_portal' => [
            'driver' => 'local',
            'root' => storage_path('portal'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],

        'local_ifc' => [
            'driver' => 'local',
            'root' => storage_path('ifc'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],

        'local_xls' => [
            'driver' => 'local',
            'root' => storage_path('export'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],        

    ],

];
