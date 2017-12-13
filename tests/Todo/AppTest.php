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
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\IncompleteTestError;
require_once 'Pluf.php';

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
class Todo_AppTest extends TestCase
{

    private static $client = null;

    private static $user = null;

    public $lists = array();

    public function __construct()
    {
        parent::__construct('Test of the Todo list application.');
    }

    /**
     * @beforeClass
     */
    public static function createDataBase()
    {
        Pluf::start(__DIR__.'/../conf/todo.php');
        
        $m = new Pluf_Migration(Pluf::f('installed_apps'));
        $m->install();
        // Test user
        self::$user = new Pluf_User();
        self::$user->login = 'test';
        self::$user->first_name = 'test';
        self::$user->last_name = 'test';
        self::$user->email = 'toto@example.com';
        self::$user->setPassword('test');
        self::$user->active = true;
        self::$user->administrator = true;
        if (true !== self::$user->create()) {
            throw new Exception();
        }
        
        self::$client = new Test_Client(array(
            array(
                'app' => 'User',
                'regex' => '#^/api/user#',
                'base' => '',
                'sub' => include 'User/urls.php'
            ),
            array(
                'app' => 'Todo',
                'regex' => '#^#',
                'base' => '',
                'sub' => include 'Todo/urls.php'
            )
        ));
    }

    /**
     * @afterClass
     */
    public static function removeDatabses()
    {
        $m = new Pluf_Migration(Pluf::f('installed_apps'));
        $m->unInstall();
    }

    /**
     * @test
     */
    public function testCreateList()
    {
        $list = new Todo_List();
        $list->name = 'Test list';
        Test_Assert::assertEquals(true, $list->create());
        
        $this->lists[] = $list; // to have it deleted in tearDown
        $id = $list->id;
        $nlist = new Todo_List($id);
        Test_Assert::assertEquals($nlist->id, $id);
    }
    
    /**
     * @test
     */
    public function testCreateItem()
    {
        $list = new Todo_List();
        $list->name = 'Test list';
        Test_Assert::assertEquals(true, $list->create());
        $this->lists[] = $list; // to have it deleted in tearDown
        
        $item = new Todo_Item();
        $item->list = $list;
        $item->item = 'Create unit tests';
        Test_Assert::assertEquals(true, $item->create());
        $nlist = $item->get_list();
        Test_Assert::assertEquals($nlist->id, $list->id);
        $items = $list->get_todo_item_list();
        Test_Assert::assertEquals(1, $items->count());
        $item2 = new Todo_Item();
        $item2->list = $list;
        $item2->item = 'Create more unit tests';
        $item2->create();
        // first list has 2 items.
        Test_Assert::assertEquals(2, $list->get_todo_item_list()
            ->count());
        $list2 = new Todo_List();
        $list2->name = 'Test list 2';
        Test_Assert::assertEquals(true, $list2->create());
        $this->lists[] = $list2; // to have it deleted in tearDown
        
        Test_Assert::assertEquals(0, $list2->get_todo_item_list()
            ->count());
        // Move the item in the second list.
        $item2->list = $list2;
        $item2->update();
        // One item in each list.
        Test_Assert::assertEquals(1, $list2->get_todo_item_list()
            ->count());
        Test_Assert::assertEquals(1, $list->get_todo_item_list()
            ->count());
    }
}