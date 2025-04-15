<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Feature;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   

    public function run()
    {
        $features = [
            ['name' => 'Ligação WiFi à Internet', 'icon_class' => 'bi-wifi'],
            ['name' => 'Ar condicionado', 'icon_class' => 'bi-snow'],
            ['name' => 'Amenities', 'icon_class' => 'bi-bag'],
            ['name' => 'Secador de cabelo', 'icon_class' => 'bi-scissors'],
            ['name' => 'Telefone', 'icon_class' => 'bi-telephone'],
            ['name' => 'Banheira / Chuveiro', 'icon_class' => 'bi-shower'],
            ['name' => 'Máquina de café', 'icon_class' => 'bi-cup-hot'],
            ['name' => 'Cofre individual', 'icon_class' => 'bi-safe'],
            ['name' => 'Bule', 'icon_class' => 'bi-droplet'],
        ];
    
        foreach ($features as $feature) {
            Feature::create($feature);
        }
    }
    
}
