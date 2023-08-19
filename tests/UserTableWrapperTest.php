<?php


namespace tests;

use PHPUnit\Framework\TestCase;
use UserTableWrapper;

class UserTableWrapperTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     */
    public function testInsert($values, $expected)
    {
        $userTable = new UserTableWrapper();
        $userTable->insert($values);
        $this->assertSame($expected, $userTable->get());
    }

    /**
     * @dataProvider updateProvider
     */
    public function testUpdate($values, $updateValues, $expected)
    {
        $userTable = new UserTableWrapper();
        $userTable->insert($values);
        $userTable->update(0, $updateValues);
        $this->assertSame($expected, $userTable->get());
    }

    /**
     * @dataProvider deleteProvider
     */
    public function testDelete($values, $expected)
    {
        $userTable = new UserTableWrapper();
        $userTable->insert($values);
        $userTable->delete(0);
        $this->assertSame($expected, $userTable->get()[0]);
    }

    /**
     * @dataProvider dataProvider
     */
    public function testGet($values, $expected)
    {
        $userTable = new UserTableWrapper();
        $userTable->insert($values);
        $this->assertSame($expected, $userTable->get());
    }

    public static function dataProvider(): array
    {
        $values = [
            'name' => 'Petya',
            'age' => 26
        ];
        return [
            [$values, [$values]]
        ];
    }

    public static function updateProvider(): array
    {
        $values = [
            'name' => 'Petya',
            'age' => 26
        ];
        $expected = [
            'name' => 'Peter',
            'age' => 27
        ];
        return [
            [$values, $expected, [$expected]]
        ];
    }

    public static function deleteProvider(): array
    {
        $values = [
            'name' => 'Petya',
            'age' => 26
        ];
        return [
            [$values, null]
        ];
    }
}