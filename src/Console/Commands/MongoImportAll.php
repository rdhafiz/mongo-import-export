<?php

namespace Rdhafiz\MongoExport\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use MongoDB\BSON\ObjectId;
use MongoDB\Client;

class MongoImportAll extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'MongoImport:All {file_path}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $file_path = $this->argument('file_path');
        if(!file_exists(public_path($file_path))){
            print_r(PHP_EOL.PHP_EOL."File not exist in your project public directory.".PHP_EOL.PHP_EOL);
            exit();
        }

        $file_content = file_get_contents(public_path($file_path));
        $file_content = json_decode($file_content, true);

        if(env('DB_CONNECTION') == 'mongodb'){
            foreach ($file_content as $collection => $data) {
                foreach ($data as &$d){
                    $d['_id'] = $d['_id']['$oid'];
                    $d['_id'] = new \MongoDB\BSON\ObjectId($d['_id']);
//                    dd($d);
                }
                DB::table($collection)->insert($data);
            }
        } else {
            print_r(PHP_EOL.PHP_EOL."You connection is not MONGODB".PHP_EOL.PHP_EOL);
            exit();
        }
    }
}
