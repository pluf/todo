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
namespace Pluf\Todo;

use Pluf\Exception;
use Pluf;
use Pluf_HTTP_Request;

// We directly load the functions we are often going to use in the
// views. This makes the code cleaner.
Pluf::loadFunction('Pluf_HTTP_URL_urlForView');
Pluf::loadFunction('Pluf_Shortcuts_RenderToResponse');
Pluf::loadFunction('Pluf_Shortcuts_GetObjectOr404');
Pluf::loadFunction('Pluf_Shortcuts_GetFormForModel');

/**
 * The views of the Todo application.
 */
class Views
{

    /**
     *
     * @param
     *            Pluf_HTTP_Request Request object
     * @param
     *            array Matches against the regex of the dispatcher
     */
    public function createItem(Pluf_HTTP_Request $request, array $match = [])
    {
        throw new Exception('Not implemented.');
    }

    /**
     *
     * @param
     *            Pluf_HTTP_Request Request object
     * @param
     *            array Matches against the regex of the dispatcher
     */
    public function findItems(Pluf_HTTP_Request $request, array $match = [])
    {
        throw new Exception('Not implemented.');
    }
}
