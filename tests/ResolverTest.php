<?php
declare(strict_types=1);

namespace MatthiasWilbrink\TableResolver\tests;

use MatthiasWilbrink\TableResolver\Exceptions\NotAModelException;
use MatthiasWilbrink\TableResolver\tests\TestClasses\AnotherTestClass;
use MatthiasWilbrink\TableResolver\tests\TestClasses\InheritTestClass;
use MatthiasWilbrink\TableResolver\tests\TestClasses\OverrideTestClass;
use MatthiasWilbrink\TableResolver\tests\TestClasses\SimpleTestClass;
use PHPUnit\Framework\TestCase;

final class ResolverTest extends TestCase
{

    /** @test */
    public function can_resolve_if_class_inherits_model(): void
    {
        $tableName = InheritTestClass::resolveTable();

        $this->assertEquals("inherit_test_classes", $tableName);
        $this->assertEquals((new InheritTestClass())->getTable(), $tableName);
    }

    /** @test */
    public function invoking_results_in_exception_if_class_does_not_inherit_model(): void
    {
        $this->expectException(NotAModelException::class);

        SimpleTestClass::resolveTable();
    }

    /** @test */
    public function can_resolve_if_parent_has_concern(): void
    {
        $tableName = AnotherTestClass::resolveTable();

        $this->assertEquals("another_test_classes", $tableName);
        $this->assertEquals((new AnotherTestClass())->getTable(), $tableName);
    }

    /** @test */
    public function can_resolve_if_model_overrides_table_name(): void
    {
        $tableName = OverrideTestClass::resolveTable();

        $this->assertEquals("other_items", $tableName);
        $this->assertEquals((new OverrideTestClass())->getTable(), $tableName);
    }

}
