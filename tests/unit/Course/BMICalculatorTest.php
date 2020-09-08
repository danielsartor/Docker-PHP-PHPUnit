<?php

declare(strict_types=1);

namespace Tests\Unit\Course;

use App\BMICalculator;
use \PHPUnit\Framework\TestCase;

class BMICalculatorTest extends TestCase {

    /**
     * @covers App\BMICalculator
     */
    public function testShowsUnderweightWhenBmiLessThan18()
    {
        $BMICalculator = new BMICalculator;
        $BMICalculator->BMI = 10;
        $result = $BMICalculator->getTextResultFromBMI();
        $expected = 'Underweight';
        $this->assertSame($expected, $result);

    }

    /**
     * @covers App\BMICalculator
     */
    public function testShowsNormalWhenBmiBetween1825()
    {
        $BMICalculator = new BMICalculator;
        $BMICalculator->BMI = 24;
        $result = $BMICalculator->getTextResultFromBMI();
        $expected = 'Normal';
        $this->assertSame($expected, $result);

    }

    /**
     * @covers App\BMICalculator
     */
    public function testShowsOverweightWhenBmiMoreThan25()
    {
        $BMICalculator = new BMICalculator;
        $BMICalculator->BMI = 28;
        $result = $BMICalculator->getTextResultFromBMI();
        $expected = 'Overweight';
        $this->assertSame($expected, $result);

    }

    /**
     * @covers App\BMICalculator
     */
    public function testCanCalculateCorrectBmi()
    {
        $expected = 24.5;
        $BMICalculator = new BMICalculator;
        $BMICalculator->mass = 75;
        $BMICalculator->height = 1.75;
        $result = $BMICalculator->calculate();
        $this->assertEquals($expected, $result);
    }
}