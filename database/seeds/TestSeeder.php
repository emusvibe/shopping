<?php

use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $test = new App\Test([
            'imagePath' => 'https://cdn.pixabay.com/photo/2014/11/11/22/20/blood-test-527617_960_720.jpg',
            'title' => 'Urine Test - Urinalysis',
            'description' => 'Urinalysis is a laboratory examination of urine for various cells and chemicals, such as red blood cells, white blood cells, infection, or excessive protein.',
            'price' => 12
        ]);
        $test->save();

        $test = new App\Test([
            'imagePath' => 'https://cdn.pixabay.com/photo/2015/05/21/11/16/diabetes-777001_960_720.jpg',
            'title' => 'Blood Tests',
            'description' => 'Blood tests are offed used to check cell counts, measure various blood chemistries and markers of inflammation, and genetics.',
            'price' => 20
        ]);
        $test->save();

        $test = new App\Test([
            'imagePath' => 'https://cdn.pixabay.com/photo/2017/03/13/21/41/scientist-2141259_960_720.jpg',
            'title' => 'Tumor Markers',
            'description' => 'Urinalysis is a laboratory examination of urine for various cells and chemicals, such as red blood cells, white blood cells, infection, or excessive protein.',
            'price' => 25
        ]);
        $test->save();
    }
}
