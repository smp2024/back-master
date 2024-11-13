<?php

    //Key Value From Json
    function kvfj($json, $key)
    {
        if($json == null):
            return null;
        else:
            $json = $json;
            $json = json_decode($json, true);
            if(array_key_exists($key, $json)):
                return $json[$key];
            else:
                return null;
            endif;
        endif;
    }

    function getModulesArray()
    {
        $a = [
            '0' => 'Products',
            '1' => 'Blog'
        ];

        return $a;
    }

    function getRoleUserArray($mode, $id)
    {

        $roles = ['0' => 'Usuario normal', '1' => 'Administrador'];
        if(!is_null($mode)):

            return $roles;

        else:

            return $roles[$id];

        endif;


    }

    function getUserStatusArray($mode, $id)
    {

        $status = ['0' => 'Registrado', '1' => 'Verificado', '100' => 'Baneado'];
        if(!is_null($mode)):

            return $status;

        else:

            return $status[$id];

        endif;

    }

    function getUserYears()
    {
        $ya = date('Y');
        $ym = $ya - 18;
        $yo = $ym - 62;

        return [$ym, $yo];
    }

    function getMonths($mode, $key)
    {
        $m = [
            '1' => 'Enero',
            '2' => 'Febrero',
            '3' => 'Marzo',
            '4' => 'Abril',
            '5' => 'Mayo',
            '6' => 'Juio',
            '7' => 'Julio',
            '8' => 'Agosto',
            '9' => 'Septiembre',
            '10' => 'Octubre',
            '11' => 'Noviembre',
            '12' => 'Diciembre',
        ];
        if($mode == 'list') {
            return $m;
        } else {
            return $m[$key];
        }


    }

    function user_permissions() {
        $p = [
            'dashboard' => [
                'icon' => '<i class="fal fa-tachometer-alt"></i>',
                'title' => 'Modulo Dashboard',
                'keys' => [
                    'dashboard' => 'Puede ver el dashboard',
                    'dashboard_small_stats' => 'Puede las estadísticas',
                ]
            ],

            'users_list' => [
                'icon' => '<i class="fal fa-users"></i>',
                'title' => 'Modulo Usuarios',
                'keys' => [
                    'users_list' => 'Puede ver el listado.',
                    'user_edit' => 'Puede editar.',
                    'user_banned' => 'Puede banear/bloquear.',
                    'user_permissions' => ' Puede otorgar permisos.',
                    'user_show' => 'Puede ver.',
                ]
            ],
            'company' => [
                'icon' => '<i class="fal fa-building"></i>',
                'title' => 'Modulo Área Corporativa',
                'keys' => [
                    'company' => 'Puede ver el listado.',
                    'company_edit' => 'Puede editar.',
                    'company_add' => 'Puede agregar.',
                    'company_delete' => 'Puede elimiar.',
                ]
            ],
            'articulos' => [
                'icon' => '<i class="fal fa-newspaper"></i>',
                'title' => 'Modulo de Artículos',
                'keys' => [
                    'articulos' => 'Puede ver el listado.',
                    'articulos_edit' => 'Puede editar.',
                    'articulos_add' => 'Puede agregar.',
                    'articulos_delete' => 'Puede elimiar.',
                ]
            ],
            'Modulos' => [
                'icon' => '<i class="far fa-layer-group"></i>',
                'title' => 'Modulos principales',
                'keys' => [
                    'areas' => 'Puede ver el listado.',
                    'area_edit' => 'Puede editar.',
                    'area_add' => 'Puede agregar.',
                    'area_delete' => 'Puede elimiar.',
                ]
            ],
            'exhibiciones' => [
                'icon' => '<i class="fal fa-camera-polaroid"></i>',
                'title' => 'Modulo de Exhibiciones',
                'keys' => [
                    'exhibiciones' => 'Puede ver el listado.',
                    'exhibiciones_edit' => 'Puede editar.',
                    'exhibiciones_add' => 'Puede agregar.',
                    'exhibiciones_delete' => 'Puede elimiar.',
                ]
            ],
            'carousels' => [
                'icon' => '<i class="far fa-object-group"></i>',
                'title' => 'Modulo Carousel',
                'keys' => [
                    'carousels' => 'Puede ver el listado.',
                    'carousel_edit' => 'Puede editar.',
                    'carousel_add' => 'Puede agregar.',
                    'carousel_delete' => 'Puede elimiar.',
                ]
            ],
            'video' => [
                'icon' => '<i class="fal fa-play-circle"></i>',
                'title' => 'Modulo de Video',
                'keys' => [
                    'video' => 'Puede ver el listado.',
                    'video_edit' => 'Puede editar.',
                    'video_add' => 'Puede agregar.',
                    'video_delete' => 'Puede elimiar.',
                ]
            ],
            'gallery' => [
                'icon' => '<i class="fal fa-photo-video"></i>',
                'title' => 'Modulo de Galería',
                'keys' => [
                    'gallery' => 'Puede ver el listado.',
                    'gallery_edit' => 'Puede editar.',
                    'gallery_add' => 'Puede agregar.',
                    'gallery_delete' => 'Puede elimiar.',
                ]
            ],

        ];
        return $p;
    }
