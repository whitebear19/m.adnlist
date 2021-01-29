<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\Poster;
use App\Models\Contact;
use App\User;
use Illuminate\Support\Facades\Mail;

use App\Mail\AdminSend;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {            
            $temp = date('Y-m-d');          
            $all_poster = Poster::where('status','1')->whereDate('expire_date',$temp)->get();
            foreach ($all_poster as $item)
            {
                $user_id = $item->user_id;
                $item->status = '5';
                $item->save();
                if(User::find($user_id))
                {
                    $comment = array();        
                    $comment["name"] = User::find($user_id)->name;                
                    $comment["task_status"] = "5";
                    $comment["adminmail"] = Contact::find(1)->support;
                    
                    $toEmail = User::find($user_id)->email;
                
                    Mail::to($toEmail)->send(new AdminSend($comment));
                }
                    
            }               
        });
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
