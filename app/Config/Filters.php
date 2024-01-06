<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\SecureHeaders;

class Filters extends BaseConfig
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     *
     * @var array
     */
    public $aliases = [
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        'filteradmin'   => \App\Filters\FilterAdmin::class,
        'filterpeminjam'   => \App\Filters\FilterPeminjam::class,
    ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     *
     * @var array
     */
    public $globals = [
        'before' => [
           'filteradmin' => [
            'except' => [
                'Home','Home/*',
                '/',
            ]
            ],
            'filterpeminjam' => [
                'except' => [
                    'Home','Home/*',
                    '/',
                ]
               ]
        ],
        'after' => [
            'toolbar',
            'filteradmin' => [
                'except' => [
                    'Home','Home/*',
                    '/',
                    'Admin','Admin/*',
                    'Peminjam','Peminjam/*',
                    'Barang','Barang/*',
                    'Barangmasuk','Barangmasuk/*',
                    'Rinci','Rinci/*',
                    'Kategori','Kategori/*',
                    'Satuan','Satuan/*',
                    'User','User/*',
                    'Laporan','Laporan/*',
                ]
                ],
                'filterpeminjam' => [
                    'except' => [
                        'Home','Home/*',
                        '/',
                        'Peminjam','Peminjam/*',
                        'Status','Status/*',
                    ]
                   ]
        ],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     *
     * Example:
     * 'post' => ['csrf', 'throttle']
     *
     * @var array
     */
    public $methods = [];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     *
     * Example:
     * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
     *
     * @var array
     */
    public $filters = [];
}
