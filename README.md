DEVELOPER NOTE:

							--------- JQUERY IMPLEMENTATION ---------
I am using Resumable JS and Jquery on the front end, it is under the jquery_implementation blade file, and the controller is also under the JqueryUploaderController file name and with the JQueryUploadService service. 

In the jquery_implementation.blade.php you may use this http://137.184.74.7 host in url method to test the file upload option in data-url attribute, that ipv4 address is hosted in DigitalOcean Ubuntu (Droplet)

							--------- LIVEWIRE IMPLEMENTATION ---------
I'm using Laravel Livewire so this is not an API based. The php component is located at App/Livewire/UploadFileComponent.php and the HTML is views/livewire/upload-file-component.blade.php, the file uploaded is being chunked manually in the front end, the Backend Component will receive it as chunk also, the chunk file is temporarily stored in the livewire-tmp, once completed it will be moved to file_uploads disk.

I also added a browser test. I use Laravel Dusk so you need to run "php artisan dusk:chrome-driver" and prepare the video file for the test, since it is too large to store in the repository, you may use any video-type file, and put it on the storage/app folder, and modify the attach method inside LivewireTest.php based on the file name or location of your file. Since there is a time limit to the waitForDialog method inside the test file, I initially added the 50 seconds to wait for the dialog pop-up, since this will vary on the size of the file because it is sent per chunk.

if all the requirements are met, you can now run the php artisan dusk.

							--------- CONCLUSION ---------
I know this is not perfect but I hope I was able to demonstrate my knowledge and skills.

I deployed it to two host service, you can try to access it here;

http://137.184.74.7/ - This is deployed in DigitalOcean (Droplet)
https://upload-test.onezzero.com/ - This is deployed in Hostgator (Shared Hosting)
