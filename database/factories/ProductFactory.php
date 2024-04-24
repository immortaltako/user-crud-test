<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        $medicineNames = [
            'Humira (Adalimumab)',
            'Keytruda (Pembrolizumab)',
            'Revlimid (Lenalidomide)',
            'Opdivo (Nivolumab)',
            'Eliquis (Apixaban)',
            'Eylea (Aflibercept)',
            'Stelara (Ustekinumab)',
            'Enbrel (Etanercept)',
            'Januvia (Sitagliptin)',
            'Xarelto (Rivaroxaban)',
            'Herceptin (Trastuzumab)',
            'Remicade (Infliximab)',
            'Avastin (Bevacizumab)',
            'Otezla (Apremilast)',
            'Imbruvica (Ibrutinib)',
            'Neulasta (Pegfilgrastim)',
            'Tecfidera (Dimethyl fumarate)',
            'Jardiance (Empagliflozin)',
            'MabThera (Rituximab)',
            'Gilenya (Fingolimod)',
            'Vyvanse (Lisdexamfetamine)',
            'Spiriva (Tiotropium bromide)',
            'Advair Diskus (Fluticasone/salmeterol)',
            'Tresiba (Insulin degludec)',
            'Lantus (Insulin glargine)',
            'NovoLog (Insulin aspart)',
            'Praluent (Alirocumab)',
            'Trulicity (Dulaglutide)',
            'Humalog (Insulin lispro)',
            'Gardasil (Human papillomavirus vaccine)',
            'Faslodex (Fulvestrant)',
            'Ibrance (Palbociclib)',
            'Isentress (Raltegravir)',
            'Crestor (Rosuvastatin)',
            'Zytiga (Abiraterone)',
            'Biktarvy (Bictegravir/emtricitabine/tenofovir)',
            'Xtandi (Enzalutamide)',
            'Tagrisso (Osimertinib)',
            'Entresto (Sacubitril/valsartan)',
            'Prevnar 13 (Pneumococcal 13-valent conjugate vaccine)',
            'Copaxone (Glatiramer acetate)',
            'Repatha (Evolocumab)',
            'Veklury (Remdesivir)',
            'Opsumit (Macitentan)',
            'Lamisil (Terbinafine)',
            'Prozac (Fluoxetine)',
            'Lyrica (Pregabalin)',
            'Zoloft (Sertraline)',
            'Abilify (Aripiprazole)',
            'Cymbalta (Duloxetine)',
            'Neurontin (Gabapentin)',
            'Seroquel (Quetiapine)',
            'Effexor (Venlafaxine)',
            'Remeron (Mirtazapine)',
            'Depakote (Divalproex)',
            'Celexa (Citalopram)',
            'Zyprexa (Olanzapine)',
            'Risperdal (Risperidone)',
            'Lithobid (Lithium)',
            'Paxil (Paroxetine)',
            'Ritalin (Methylphenidate)',
            'Adderall (Amphetamine)',
            'Strattera (Atomoxetine)',
            'Concerta (Methylphenidate)',
            'Wellbutrin (Bupropion)',
            'Lunesta (Eszopiclone)',
            'Ambien (Zolpidem)',
            'Provigil (Modafinil)',
            'Nuvigil (Armodafinil)',
            'Trazodone (Desyrel)',
            'Lexapro (Escitalopram)',
            'Vicodin (Hydrocodone/paracetamol)',
            'OxyContin (Oxycodone)',
            'Percocet (Oxycodone/paracetamol)',
            'Dilaudid (Hydromorphone)',
            'Suboxone (Buprenorphine/naloxone)',
            'Methadone (Dolophine)',
        ];

        return [
            'name' => $this->faker->unique()->randomElement($medicineNames),
            'sku' => 'SKU-' . strtoupper(substr(md5($this->faker->word), 0, 8)),
            'category_id' => Category::factory(),
            'price' => $this->faker->randomFloat(2, 1, 1000),
            'units_sold' => $this->faker->numberBetween(0, 500),
        ];
    }
}

