<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Artisan;
use Illuminate\Support\Env;
use Dotenv\Dotenv;
use Mail;
use App\Models\SiteInfo;

class SettingsController extends Controller
{
    public function email_config(Request $request)
    {
        $envData = \Dotenv\Dotenv::parse(file_get_contents(base_path('.env')));
        return view("settings.email_config", compact('envData'));
    }

    public function send_env_update(Request $request)
    {
        $envData = \Dotenv\Dotenv::parse(file_get_contents(base_path('.env')));
        $env = $request->all();
        $envData["MAIL_MAILER"] = $env['--ff']["MAIL_MAILER"];
        $envData["MAIL_HOST"] = $env['--ff']["MAIL_HOST"];
        $envData["MAIL_PORT"] = $env['--ff']["MAIL_PORT"];
        $envData["MAIL_USERNAME"] = $env['--ff']["MAIL_USERNAME"];
        $envData["MAIL_PASSWORD"] = $env['--ff']["MAIL_PASSWORD"];
        $envData["MAIL_ENCRYPTION"] = $env['--ff']["MAIL_ENCRYPTION"];
        $env_content = "";
        
        foreach($envData as $k => $v)
        {
            $env_content .= $k ."=". $v .PHP_EOL;
        }
        file_put_contents(base_path('.env'), $env_content);
        Artisan::call("optimize");
        Artisan::call("route:clear");

        return back();
    }

    public function email_test()
    {
        return view("settings.email_test");
    }

    public function send_email_test(Request $request)
    {
        $email = $request->input('email');
        $subject = $request->input('subject');
        $message = $request->input('message');

        if ($request->hasFile('attachment')) {
            $attachment = $request->file('attachment');
            $attachmentPath = $attachment->store('attachments');
        } else {
            $attachmentPath = null;
        }

        Mail::send('settings.email_view', ['messages' => $message], function ($mail) use ($email,$subject, $attachmentPath) {
            $mail->from('no-reply@cybernetworks.net.au', 'Cybernetworks');
            $mail->to($email)->subject($subject);

            if ($attachmentPath) {
                $mail->attach(storage_path('app/' . $attachmentPath));
            }
        });

        if ($attachmentPath) {
            unlink(storage_path('app/' . $attachmentPath));
        }        

        return back();
    }

    public function db_config(Request $request)
    {
        $envData = \Dotenv\Dotenv::parse(file_get_contents(base_path('.env')));
        return view("settings.db_config", compact('envData'));
    }

    public function send_db_update(Request $request)
    {
        $envData = \Dotenv\Dotenv::parse(file_get_contents(base_path('.env')));
        $env = $request->all();
        $envData["DB_CONNECTION"] = $env['--ff']["DB_CONNECTION"];
        $envData["DB_HOST"] = $env['--ff']["DB_HOST"];
        $envData["DB_PORT"] = $env['--ff']["DB_PORT"];
        $envData["DB_DATABASE"] = $env['--ff']["DB_DATABASE"];
        $envData["DB_USERNAME"] = $env['--ff']["DB_USERNAME"];
        $envData["DB_PASSWORD"] = $env['--ff']["DB_PASSWORD"];
        $env_content = "";
        
        foreach($envData as $k => $v)
        {
            $env_content .= $k ."=". $v .PHP_EOL;
        }
        file_put_contents(base_path('.env'), $env_content);
        Artisan::call("optimize");
        Artisan::call("route:clear");

        return back();
    }

    public function site_info_index()
    {
        $siteInfo = SiteInfo::first();
        return view('settings.site_info',compact('siteInfo'));
    }

    public function site_info_store(Request $request)
    {
        if ($request->site_id) {
            $siteInfo = SiteInfo::find($request->site_id);

            if (request()->hasFile('favicon_icon')) {
                $favicon_file = $request->file('favicon_icon');
                $favicon_fileName = time() . '_' . $favicon_file->getClientOriginalName();
                $favicon_filePath = $favicon_file->move(public_path('site_info'), $favicon_fileName);
                $siteInfo->favicon_icon = $favicon_fileName;
            }
            if (request()->hasFile('login_image')) {
                $login_file = $request->file('login_image');
                $login_fileName = time() . '_' . $login_file->getClientOriginalName();
                $login_filePath = $login_file->move(public_path('site_info'), $login_fileName);
                $siteInfo->login_image = $login_fileName;
            }

            $siteInfo->site_name = $request->site_name ?? '';
            $siteInfo->site_desc = $request->site_desc ?? '';
            $siteInfo->site_meta_tags = $request->site_meta_tags ?? '';
            $siteInfo->save();
        } else {
            if (request()->hasFile('favicon_icon')) {
                $favicon_file = $request->file('favicon_icon');
                $favicon_fileName = time() . '_' . $favicon_file->getClientOriginalName();
                $favicon_filePath = $favicon_file->move(public_path('site_info'), $favicon_fileName);
            }
            if (request()->hasFile('login_image')) {
                $login_file = $request->file('login_image');
                $login_fileName = time() . '_' . $login_file->getClientOriginalName();
                $login_filePath = $login_file->move(public_path('site_info'), $login_fileName);
            }

            $siteInfo = new SiteInfo();
            $siteInfo->favicon_icon = $favicon_fileName;
            $siteInfo->login_image = $login_fileName;
            $siteInfo->site_name = $request->site_name ?? '';
            $siteInfo->site_desc = $request->site_desc ?? '';
            $siteInfo->site_meta_tags = $request->site_meta_tags ?? '';
            $siteInfo->save();
        }

        return redirect()->back()->with("success", "Site Info Updated Successfully.");
    }
}
