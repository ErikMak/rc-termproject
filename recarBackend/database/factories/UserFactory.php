<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $nicks = array(
            'Felox567',
            'Ferer123',
            'FEU2002',
            'FhuQii',
            'FIGHTCLASH',
            'filouttedu3100',
            'Fir3_ViRtuOz',
            'FireFistLeo',
            'FireS1800',
            'Fire_Mask',
            'Fityk',
            'Flaghost',
            'Flarame',
            'flavinster',
            'flifloflou',
            'flocon21',
            'Mc_Ouille',
            'mechima',
            'Mega18',
            'Megane2005',
            'MehdiN14',
            'Melina012',
            'Melvinos56',
            'MentaSan100',
            'Merlinxxx',
            'MetaLeGracieux',
            'Meuf',
            'MF_iFan',
            'MiCad0',
            'Michui',
            'micronazes',
            'MIGITMONx',
            'SlassPvP',
            'Slendy_Milky',
            'Slinterface',
            'slumar',
            'Smallhoper17',
            'smileyface456654',
            'Smouthyze',
            'Snakes83',
            'Sniicks06',
            'Snoofyse',
            'SnowSniper101',
            'soccercedric',
            'Sofyagp',
            'Soldier_maxou',
            'sombreroloko19',
            'SonnyX',
            'SoRaxx',
            'sossso',
        );

        return [
            'login' => $nicks[$this->faker->unique()->numberBetween($min = 0, $max = 49)],
            'password' => Hash::make('pass')
        ];
    }
}
