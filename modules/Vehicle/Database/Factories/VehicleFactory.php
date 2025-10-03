<?php

namespace Modules\Vehicle\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Vehicle\Models\Vehicle;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Modules\Vehicle\Models\Vehicle>
 */
class VehicleFactory extends Factory
{
    protected $model = Vehicle::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
        ];
    }
    public function fakeState(): static
    {
        return $this->state(function (array $attributes) {
            $brand = $this->brand();
            return [
                'brand' => $brand,
                'type' => $this->typeForBrand($brand),
                'plate_number' => strtoupper($this->faker->bothify('????-####')),
            ];
        });
    }

    public function brand(): string
    {
        $brands = ['Toyota','Honda','Nissan','Mazda','Subaru','Mitsubishi','Suzuki','Lexus','Daihatsu','Isuzu','BMW','Mercedes-Benz','Audi','Volkswagen','Opel','Peugeot','Renault','Citroën','Fiat','Skoda','Seat','Volvo','Ford','Chevrolet','Kia','Hyundai','Tesla'];
        return $this->faker->randomElement($brands);
    }
    public function typeForBrand(string $brand): string
    {
        $modelsByBrand = [
            'Toyota' => ['Corolla','Yaris','Camry','RAV4','Hilux','Prius'],
            'Honda' => ['Civic','Accord','Fit','CR-V','HR-V'],
            'Nissan' => ['Leaf','Qashqai','X-Trail','Micra','Juke','Skyline'],
            'Mazda' => ['Mazda2','Mazda3','Mazda6','CX-3','CX-5','MX-5'],
            'Subaru' => ['Impreza','Legacy','Forester','Outback','XV'],
            'Mitsubishi' => ['Lancer','Outlander','ASX','Eclipse Cross','Pajero'],
            'Suzuki' => ['Swift','Ignis','Vitara','SX4 S-Cross','Jimny'],
            'Lexus' => ['IS','ES','UX','NX','RX'],
            'Daihatsu' => ['Mira','Tanto','Move','Rocky'],
            'Isuzu' => ['D-Max','MU-X','N-Series'],
            'BMW' => ['1 Series','3 Series','5 Series','X1','X3','X5','i3'],
            'Mercedes-Benz' => ['A-Class','C-Class','E-Class','GLA','GLC','GLE'],
            'Audi' => ['A3','A4','A6','Q3','Q5','Q7','e-tron'],
            'Volkswagen' => ['Polo','Golf','Passat','T-Roc','Tiguan','ID.3'],
            'Opel' => ['Corsa','Astra','Insignia','Mokka','Grandland'],
            'Peugeot' => ['208','308','3008','5008','2008'],
            'Renault' => ['Clio','Megane','Captur','Kadjar','Austral'],
            'Citroën' => ['C3','C4','C5 Aircross','C3 Aircross'],
            'Fiat' => ['500','Panda','Tipo','500X'],
            'Skoda' => ['Fabia','Octavia','Superb','Karoq','Kodiaq'],
            'Seat' => ['Ibiza','Leon','Arona','Ateca'],
            'Volvo' => ['XC40','XC60','XC90','S60','V60'],
            'Ford' => ['Fiesta','Focus','Mondeo','Puma','Kuga','Ranger'],
            'Chevrolet' => ['Spark','Cruze','Malibu','Trailblazer','Tahoe'],
            'Kia' => ['Rio','Ceed','Sportage','Sorento','Niro'],
            'Hyundai' => ['i20','i30','Tucson','Kona','Santa Fe'],
            'Tesla' => ['Model 3','Model Y','Model S','Model X'],
        ];
        return $this->faker->randomElement($modelsByBrand[$brand]);
    }
}
