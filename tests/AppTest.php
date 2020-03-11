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
namespace Pluf\Test;

use Pluf\Todo;
use Pluf;
use Pluf_Migration;

/**
 * Unit testing of this small application.
 *
 * The first series of tests is just to test the creation/deletion of
 * lists and items.
 *
 * The second series of tests is to test the views by doing queries
 * against them.
 *
 * That way you can see the way one can test the "backend" and the
 * "frontend".
 *
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 */
class AppTest extends TestCase
{

    private static $client = null;

    private static $user = null;

    public $lists = array();

    /**
     * Init test data
     *
     * @beforeClass
     */
    public static function createDataBase()
    {
        // Load applicaton
        Pluf::start('conf/config.php');
        $m = new Pluf_Migration();
        $m->install();
        $m->init();

        self::$client = new Client();
    }

    /**
     * Remore all test data
     *
     * @afterClass
     */
    public static function removeDatabses()
    {
        $m = new Pluf_Migration();
        $m->unInstall();
    }

    /**
     * Create a todo list model
     *
     * @test
     */
    public function testCreateList()
    {
        $list = new Todo\Group();
        $list->name = 'Test list';
        $this->assertEquals(true, $list->create());

        $this->lists[] = $list; // to have it deleted in tearDown
        $id = $list->id;
        $nlist = new Todo\Group($id);
        $this->assertEquals($nlist->id, $id);
    }

    /**
     * Create Imte for a list
     *
     * @test
     */
    public function testCreateItem()
    {
        $list = new Todo\Group();
        $list->name = 'Test list';
        $this->assertEquals(true, $list->create());
        $this->lists[] = $list; // to have it deleted in tearDown

        $item = new Todo\Item();
        $item->list = $list;
        $item->item = 'Create unit tests';
        $this->assertEquals(true, $item->create());
        $nlist = $item->get_list();
        $this->assertEquals($nlist->id, $list->id);
        $items = $list->get_todo_item_list();
        $this->assertEquals(1, $items->count());

        $item2 = new Todo\Item();
        $item2->list = $list;
        $item2->item = 'Create more unit tests';
        $item2->create();
        // first list has 2 items.
        $this->assertEquals(2, $list->get_todo_item_list()
            ->count());
        $list2 = new Todo\Group();
        $list2->name = 'Test list 2';
        $this->assertEquals(true, $list2->create());
        $this->lists[] = $list2; // to have it deleted in tearDown

        $this->assertEquals(0, $list2->get_todo_item_list()
            ->count());
        // Move the item in the second list.
        $item2->list = $list2;
        $item2->update();
        // One item in each list.
        $this->assertEquals(1, $list2->get_todo_item_list()
            ->count());
        $this->assertEquals(1, $list->get_todo_item_list()
            ->count());
    }
}