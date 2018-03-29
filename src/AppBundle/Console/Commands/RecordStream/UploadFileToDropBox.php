<?php

namespace App\Console\Command\RecordStream;

use DB;
use Illuminate\Console\Command;
use Config;
use Dropbox\Client;
use Dropbox\WriteMode;
use File;
use App\File as DbFile;

class UploadFileToDropBox extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dropbox:upload {filePath} {--camera=} {--user=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'upload file to tropbox';

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
     * @return mixed
     */


    public function handle()
    {
        $this->info("начало загрузки файла");
        $path = $this->argument('filePath');
        $cameraId = $this->option('camera');
        $userId = $this->option('user');

        if (empty($path) || empty($userId) || empty($cameraId)) {
            $this->error("ошибка не переданы параметры для загрузки фала");
            exit(0);
        }
        $fileName = explode("/", $path)[sizeof(explode("/", $path)) - 1];

        $Client = new Client(
            Config::get('dropbox.connections.main.token'),
            Config::get('dropbox.connections.main.app')
        );

        $file = fopen($path, 'rb');

        $size = filesize($path);

        $dropboxFileName = Config::get("dropbox.pre") . $userId . "/" . $fileName;

        $Client->uploadFile($dropboxFileName, WriteMode::add(), $file, $size);

        $link = $Client->createTemporaryDirectLink($dropboxFileName);


        DB::table('files')->insert([
            [
                'camera_id' => $cameraId,
                "name" => $dropboxFileName,
                "link" => $link[0],
                "size" => $size,
            ]
        ]);

        File::delete($path);
    }


}