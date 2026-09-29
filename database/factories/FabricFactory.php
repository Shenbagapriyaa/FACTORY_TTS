<?php

namespace Database\Factories;

use App\Models\Fabric;
use Illuminate\Database\Eloquent\Factories\Factory;

class FabricFactory extends Factory
{
    protected $model = Fabric::class;
    public function definition(): array { return ['fabric_code'=>'FAB-'.$this->faker->unique()->numberBetween(100,999),'fabric_name'=>$this->faker->words(3,true),'fabric_type'=>$this->faker->randomElement(['Knitted','Woven','Synthetic']),'composition'=>'100% Cotton','color'=>$this->faker->colorName(),'gsm'=>$this->faker->numberBetween(120,300),'width'=>$this->faker->randomFloat(2,50,80),'unit'=>'KG','description'=>$this->faker->sentence(),'status'=>'Active']; }
}
