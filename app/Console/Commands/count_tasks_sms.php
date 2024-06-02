<?php

namespace App\Console\Commands;

use http\Client\Curl\User;
use Illuminate\Console\Command;

class count_tasks_sms extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:count_tasks_sms';

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
            $users = \App\Models\User::all();
            foreach ($users as $user) {
                $tasks = \App\Models\Job::where([
                    ['user_id', $user->id],
                    ['status', 1],
                    ['archive', null]
                ])->get();
                $findtasks = count($tasks);
                $receptor = $user->phone;
                $name = $user->name;
                $api_key = env('SMS_API');
                $response = \Illuminate\Support\Facades\Http::asForm()->post("https://api.kavenegar.com/v1/$api_key/sms/send.json", [
                    'receptor' => $receptor,
                    'message' =>' سلام و حال احوال '.$name.' عزیز ، شما '.$findtasks.' تسک انجام نشده دارید.'
                ]);
//                return $response->body();
/* <<<<<<< HEAD
                Log::error($findtasks.''.$receptor);
=======
>>>>>>> 02888404fea29d26090aa6de0e6b612df5d2ba85 */
            };
            Log::info($findtasks.''.$receptor);
    }
}
