<?php

namespace Database\Seeders;

use App\Models\ColorSetting;
use Illuminate\Database\Seeder;

class ColorSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ColorSetting::create([
            'primary_color'    => '#ff8500',
            'secondary_color'  => '#333333',
            'button_color'     => '#ffffff',
            'hover_color'      => '#e67800',
            'text_color'       => '#666666',
            'bg_color'         => '#09122a',
        ]);
    }
}
