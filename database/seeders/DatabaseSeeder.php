<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Movie;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $files = [json_encode(['Category'=>'Musical', 'File'=>'musicals.txt']),
            json_encode(['Category'=>'NonMusical', 'File'=>'movies.txt'])];

            foreach ($files as $file) {
                $obj = json_decode($file);

                $c = Category::create(['name'=> $obj->Category]);

                $filename = database_path($obj->File);
                $fh = fopen($filename,"r");
                $rank = 1;
                while($row = fgetcsv($fh)){
                    Movie::create([
                        'title'=>$row[0],
                        'rank'=>$rank++,
                        'category_id'=>$c->id,
                    ]);
                 }
                fclose($fh);
            }
    }
}
