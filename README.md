# anotherwebauth (Authentication testing using socialite and more)

Some commands to run first when opening:

1. composer require laravel/ui
2. composer require laravel/socialite
3. php artisan ui bootstrap --auth (If the ui got messed up somehow, then run again)
4. npm install
5. npm run dev
6. composer require laravel/socialite (if running it early doesnt work then do it after npm install && npm run dev)
7. php artisan config:cache
8. php artisan serve

Now then how does this work?<br />
Obviously you have to go to either any soscial media that will be used to login such as in this case Google.<br />
Go to https://console.cloud.google.com/ and create a new project.<br />

Now try looking at your services.php file in laravel<br />
'google' => [<br />
        'client_id' => env('GOOGLE_CLIENT_ID'),<br />
        'client_secret' => env('GOOGLE_CLIENT_SECRET'),<br />
        'redirect' =>  env('GOOGLE_CLIENT_REDIRECT'),<br />
     ],<br />


Now open .env file and fill this out using your own credential data that have been generated from Google:<br />
GOOGLE_CLIENT_ID=<br />
GOOGLE_CLIENT_SECRET=<br />
GOOGLE_CLIENT_REDIRECT=http://127.0.0.1:8000/auth/google/callback <br />
(Above can be changed depends on what URL you want but since we are using localhost so this is the URL we are using)<br />

After all of that just make sure your routing is correct if you change anything else except for the part above.<br />

This goes the same for GitHub login, just create another new Oatuh app in "ttps://github.com/settings/developers<br />
and fill the blanks (or EDIT) for Github in both services.php and .env<br />

# Forgot Password<br />

If you register it using some email adresses, then there is the forgot password button in the web.<br />

We will be using Mailtrap.io for testing the forgot password function for local web.
Just go the the web and register using any email that will be tested for the function.
Go to the Sandbox option and go to your inboxes and click the SMTP setting and copy the URL below but make sure it changed to Laravel and just copy/paste it to the .env (You can read the documentation for this function or all the function actually, its all on the Internet. Just make sure your using the correct database and such)<br />

