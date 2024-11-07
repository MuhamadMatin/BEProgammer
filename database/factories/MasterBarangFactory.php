<?php

namespace Database\Factories;

use App\Models\MasterBarang;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MasterBarang>
 */
class MasterBarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $tahunBulan = Carbon::now()->format('y/m');

        $stock = MasterBarang::count('id') + 1;

        $kode_barang = "BRG/{$tahunBulan}/{$stock}";
        return [
            'nama_barang' => $this->faker->word(),
            'kode_barang' => $kode_barang,
            'stock' => $this->faker->numberBetween(1, 100),
            'harga' => $this->faker->numberBetween(1000, 100000),
            'foto' => $this->faker->imageUrl(640, 480, 'product'),
        ];
    }
}
