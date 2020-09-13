<?php

use Illuminate\Database\Seeder;

use App\Movie;
use App\Classification;

class movies extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $c = new Classification;
        $c->name = "NonMusical";
        $c->save(); 

        $c = new Classification;
        $c->name = "Musical";
        $c->save();
        
        $filename = database_path('movies.txt');
        $fh = fopen($filename,"r");  
        $rank = 1;
        while($row = fgetcsv($fh)){
            $m = new Movie;
            $m->name = $row[0];
            $m->rank = $rank;
            $rank += 1;
            $m->classification_id = 1;
            $m->save();
        }
        fclose($fh); 

        $filename = database_path('musicals.txt');
        $fh = fopen($filename,"r");  
        $rank = 1;
        while($row = fgetcsv($fh)){
            $m = new Movie;
            $m->name = $row[0];
            $m->rank = $rank;
            $rank += 1;
            $m->classification_id = 2;
            $m->save();
        }
        fclose($fh);         
    }
}
