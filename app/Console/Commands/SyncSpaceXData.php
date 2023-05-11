<?php

namespace App\Console\Commands;

use App\Models\Capsules;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SyncSpaceXData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    // Komutun çalıştırılacağı isim
    protected $signature = 'syncspacexdata';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
        public function handle()
        {

            $response = Http::get('https://api.spacexdata.com/v3/capsules');

            if ($response->successful())
            {
                $data = json_decode($response->body(), true);
                foreach ($data as $item) {
                    DB::table('capsules')->updateOrInsert(
                        [
                            'capsule_serial' => $item['capsule_serial'],
                            'capsule_id' => $item['capsule_id'],
                            'status' => $item['status'],
                            'original_launch' => Carbon::parse($item['original_launch'])->format('Y-m-d H:i:s'),
                            'original_launch_unix' => $item['original_launch_unix'],
                            'landings' => $item['landings'],
                            'type' => $item['type'],
                            'details' => $item['details'],
                            'reuse_count' => $item['reuse_count']
                        ]
                    );

                    foreach ($item['missions'] as $mission) {

                        $capsuleId = DB::table('capsules')
                            ->where('capsule_serial', $item['capsule_serial'])
                            ->value('id');

                        DB::table('missions')->updateOrInsert(
                            [
                                'capsule_id' => $capsuleId,
                                'name' => $mission['name']
                            ],
                            [
                                'flight' => $mission['flight']
                            ]
                        );
                    }


                }


                $this->info("Veritabanı güncellendi");
            }
            else
            {
                $this->error('SpaceX verileri senkronize edilemedi.');
            }

        }
}
