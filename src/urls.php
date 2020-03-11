<?php
/*
 * This file is part of Pluf Framework, a simple PHP Application Framework.
 * Copyright (C) 2010-2020 Phoinex Scholars Co. (http://dpq.co.ir)
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */
return array(
    // -------------------------------------------------------------
    // List
    // -------------------------------------------------------------
    array(
        'regex' => '#^/list/find$#',
        'model' => 'Pluf_Views',
        'method' => 'findObject',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'Todo_List',
            'listFilters' => array(
                'id',
                'name'
            ),
            'listDisplay' => array(
                'id' => 'title',
                'name' => 'description'
            ),
            'searchFields' => array(
                'name'
            ),
            'sortFields' => array(
                'id',
                'name'
            )
        )
    ),
    array(
        'regex' => '#^/list/new$#',
        'priority' => 4,
        'model' => 'Pluf_Views',
        'method' => 'createObject',
        'http-method' => 'POST',
        'params' => array(
            'model' => 'Todo_List'
        )
    ),
    array(
        'regex' => '#^/list/(?P<modelId>\d+)$#',
        'priority' => 4,
        'model' => 'Pluf_Views',
        'method' => 'getObject',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'Todo_List'
        )
    ),
    array(
        'regex' => '#^/list/(?P<modelId>\d+)$#',
        'priority' => 4,
        'model' => 'Pluf_Views',
        'method' => 'updateObject',
        'http-method' => 'POST',
        'params' => array(
            'model' => 'Todo_List'
        )
    ),
    array(
        'regex' => '#^/list/(?P<modelId>\d+)$#',
        'priority' => 4,
        'model' => 'Pluf_Views',
        'method' => 'deleteObject',
        'http-method' => 'DELETE',
        'params' => array(
            'model' => 'Todo_List'
        )
    ),
    
    // -------------------------------------------------------------
    // List item
    // -------------------------------------------------------------
    array(
        'regex' => '#^/list/(?P<listId>\d+)/item/find$#',
        'priority' => 4,
        'model' => 'Todo_Views',
        'method' => 'findItems',
        'http-method' => 'GET'
    ),
    array(
        'regex' => '#^/list/(?P<listId>\d+)/item/new$#',
        'priority' => 4,
        'model' => 'Todo_Views',
        'method' => 'createItem',
        'http-method' => 'POST'
    ),
    array(
        'regex' => '#^/list/(?P<listId>\d+)/item/(?P<modelId>\d+)$#',
        'priority' => 4,
        'model' => 'Pluf_View',
        'method' => 'getObject',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'Todo_Item'
        )
    ),
    array(
        'regex' => '#^/list/(?P<listId>\d+)/item/(?P<modelId>\d+)$#',
        'priority' => 4,
        'model' => 'Pluf_View',
        'method' => 'updateObject',
        'http-method' => 'POST',
        'params' => array(
            'model' => 'Todo_Item'
        )
    ),
    array(
        'regex' => '#^/list/(?P<listId>\d+)/item/(?P<modelId>\d+)$#',
        'priority' => 4,
        'model' => 'Pluf_View',
        'method' => 'deleteObject',
        'http-method' => 'DELETE',
        'params' => array(
            'model' => 'Todo_Item'
        )
    ),
    
    // -------------------------------------------------------------
    // item
    // -------------------------------------------------------------
    array(
        'regex' => '#^/item/find$#',
        'model' => 'Pluf_Views',
        'method' => 'findObject',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'Todo_Item',
            'listFilters' => array(
                'id',
                'name'
            ),
            'listDisplay' => array(
                'id' => 'title',
                'name' => 'description'
            ),
            'searchFields' => array(
                'name'
            ),
            'sortFields' => array(
                'id',
                'name'
            )
        )
    ),
    array(
        'regex' => '#^/item/(?P<modelId>\d+)$#',
        'priority' => 4,
        'model' => 'Pluf_View',
        'method' => 'getObject',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'Todo_Item'
        )
    ),
    array(
        'regex' => '#^/item/(?P<modelId>\d+)$#',
        'priority' => 4,
        'model' => 'Pluf_View',
        'method' => 'updateObject',
        'http-method' => 'POST',
        'params' => array(
            'model' => 'Todo_Item'
        )
    ),
    array(
        'regex' => '#^/item/(?P<modelId>\d+)$#',
        'priority' => 4,
        'model' => 'Pluf_View',
        'method' => 'deleteObject',
        'http-method' => 'DELETE',
        'params' => array(
            'model' => 'Todo_Item'
        )
    )
);
