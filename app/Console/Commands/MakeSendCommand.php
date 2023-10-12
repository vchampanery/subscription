<?php

namespace App\Console\Commands;

use App\Models\mailSent;
use App\Models\Post;
use App\Models\subscription;
use App\Models\User;
use Illuminate\Console\Command;
use Mail;
class MakeSendCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:story';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sent story to new post to all subscriber';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Mail::raw('This is a test email.', function ($message) {
        //     $message->to('vchampanery@gmail.com')->subject('Test Email');
        // });

        // $toEmail = $this->argument('to');
        // $subject = $this->argument('subject');
        // $body = $this->argument('body');

        // // Send the email with the specified body
        // Mail::raw($body, function ($message) use ($toEmail, $subject) {
        //     $message->to($toEmail)->subject($subject);
        // });

        $postObj = Post::where('sent',false)->get();
        foreach($postObj as $key => $value){
            $value->website_id;
            $userObj = subscription::where('website_id',$value->website_id)->pluck('user_id');

            if($userObj){ //
                foreach($userObj as $uKey=>$vKey){
                    //check post already sent of not
                    $mailSent = mailSent::where('post_id',$value->id)->where('user_id',$vKey)->get()->count();
                    if($mailSent == 0){
                        $userEmail = User::where('id',$userObj)->first(['email']);
                        $to = $userEmail->email;
                        $subject = 'New post published';
                        $body = "$value->title\n\n\n$value->desc";
                        $this->sentmail($to,$subject,$body);
                        mailSent::create(['post_id'=>$value->id,'user_id'=>$vKey]);
                    }
                }
                $userEmail = User::where('id',$userObj)->pluck('email');
            }
        }
        return Command::SUCCESS;
    }
    public function sentmail($to,$subject,$body)
    {
        Mail::raw($body, function ($message) use ($to, $subject) {
            $message->to($to)->subject($subject);
        });
    }

}
