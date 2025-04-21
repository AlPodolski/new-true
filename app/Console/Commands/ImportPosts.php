<?php

namespace App\Console\Commands;

use App\Models\City;
use App\Models\HairColor;
use App\Models\IntimHair;
use App\Models\Metro;
use App\Models\National;
use App\Models\Photo;
use App\Models\Place;
use App\Models\Post;
use App\Models\PostMetro;
use App\Models\PostPlace;
use App\Models\PostService;
use App\Models\PostTime;
use App\Models\Rayon;
use App\Models\Service;
use App\Models\Time;
use Illuminate\Console\Command;
use League\Csv\Reader;
use League\Csv\Statement;

class ImportPosts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:posts';

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
     * @return mixed
     */
    public function handle()
    {

        $stream = \fopen(storage_path('import_21_04_2025_part_1.csv'), 'r');

        $csv = Reader::createFromStream($stream);
        $csv->setDelimiter(';');
        $csv->setHeaderOffset(0);
        //build a statement
        $stmt = (new Statement());

        $records = $stmt->process($csv);

        $price = array(1000, 1500, 2000, 3000, 5000, 6000, 7000, 10000);

        $serviceList = Service::all();
        $placeList = Place::all();
        $timeList = Time::all();

        $posts = array();

        foreach ($records as $record) {

            if ($record['name']) {

                $posts[] = $record;

            }
        }


        $cityId = 1;

        $path = '/aa2/';

        $cityList = City::where('url', '<>', 'moskva')->get();

        foreach ($cityList as $city){

            $cityId = $city->id;

            shuffle($posts);

            foreach ($posts as $record) {

                $post = new Post();

                $price = 3000;

                if ($record['price'] and $record['price'] > 1000) $price = $record['price'];

                $post->name = $record['name'];
                if ($record['age'] != '-') $post->age = $record['age'];
                else $post->age = 28;
                $post->phone = $record['phone'];
                if ($record['rost'] != '-') $post->rost = $record['rost'];
                else $post->rost = 165;
                if ($record['weght'] != '-' and $record['weght'] < 100) $post->ves = $record['weght'];
                else $post->ves = 55;
                if ($record['grud'] != '-') $post->breast = $record['grud'];
                else $post->breast = 1;
                $post->tatu = rand(0, 1);
                $post->pircing = rand(0, 1);
                $post->about = strip_tags($record['deskr']);
                $post->city_id = $cityId;
                $post->check_photo_status = rand(0, 1);
                $post->price = $price;
                $post->publication_status = 1;
                $post->user_id = 0;
                $post->url = '';
                $post->apartament_2_hour_price = $post->price * 2;
                $post->apartament_night_price = $post->price * 4;
                $post->exit_1_hour_price = $post->price + 1000;
                $post->exit_2_hour_price = ($post->price + 1000) * 2;
                $post->exit_night_price = ($post->price + 1000) * 4;

                $post->shoe_size = rand(36, 41);

                $post->clothing_size = 0;

                $post->contacts_per_hour = rand(1, 3);

                if ($record['cheked']) $post->check_photo_status = Post::PHOTO_CHECK;

                $post->avatar = $path . $record['mini'];
                if ($record['video']) $post->video = $path . $record['video'];

                if ($post->save()) {

                    $post->url = \Str::slug($post->name) . '-' . $post->id;

                    if ($record['metro']) {

                        $dataList = explode(',', $record['metro']);

                        foreach ($dataList as $item) {

                            if ($temp = Metro::where(['value' => $item, 'city_id' => $cityId])->get()->first()) {

                                $postRelation = new PostMetro();
                                $postRelation->city_id = $cityId;
                                $postRelation->posts_id = $post->id;
                                $postRelation->metros_id = $temp->id;

                                $postRelation->save();

                            }

                        }

                    }

                    if ($record['gallery']) {

                        $dataList = explode(',', $record['gallery']);

                        foreach ($dataList as $item) {

                            $file = new Photo();

                            $file->posts_id = $post->id;
                            $file->file = $path . $item;
                            $file->type = Photo::GALLERY_TYPE;

                            $file->save();

                        }

                    }

                    if (isset($record['intim']) and $record['intim']) {

                        if ($temp = IntimHair::where(['value' => $record['intim']])->get()->first()) {

                            $post->intim_hair_id = $temp->id;

                        }

                    }

                    if ($record['hair']) {

                        if ($temp = HairColor::where(['value' => $record['hair']])->get()->first()) {

                            $post->hair_color_id = $temp->id;

                        }

                    }

                    if (isset($record['rayon']) and $record['rayon']) {

                        if ($temp = Rayon::where(['value' => $record['rayon']])->get()->first()) {

                            $post->rayon_id = $temp->id;

                        }

                    }

                    if (isset($record['ethnic']) and $record['ethnic']) {

                        if ($temp = National::where(['value' => $record['ethnic']])->get()->first()) {

                            $post->national_id = $temp->id;

                        }

                    }

                    foreach ($serviceList as $service) {

                        $postService = new PostService();

                        $postService->posts_id = $post->id;
                        $postService->service_id = $service->id;
                        $postService->city_id = $cityId;

                        $status = rand(0,3);

                        if ($status == 0) $postService->sympathy = 1;
                        if ($status == 1) $postService->pay = 1;
                        if ($status == 3) $postService->not_available = 1;

                        $postService->save();

                    }

                    foreach ($placeList as $item) {

                        if (rand(0, 1)) {

                            $postRelation = new PostPlace();
                            $postRelation->city_id = $cityId;
                            $postRelation->posts_id = $post->id;
                            $postRelation->place_id = $item->id;

                            $postRelation->save();

                        }

                    }

                    foreach ($timeList as $item) {

                        if (rand(0, 1)) {

                            $postRelation = new PostTime();
                            $postRelation->city_id = $cityId;
                            $postRelation->posts_id = $post->id;
                            $postRelation->times_id = $item->id;

                            $postRelation->save();

                        }

                    }

                    $post->save();

                    exit();

                }

            }

        }

    }

}
