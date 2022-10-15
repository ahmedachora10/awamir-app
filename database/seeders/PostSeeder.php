<?php

namespace Database\Seeders;

use App\Http\Helpers\ArSlug;
use App\Models\Category;
use App\Models\City;
use App\Models\Country;
use App\Models\JobType;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    use ArSlug;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jobs = DB::connection('new_mysql')->table('jobs')->get();

        foreach ($jobs as $job) {
            Post::create([
                'category_id' => Category::where('name', $job->categorie)->first()->id,
                'country_id' => Country::first()->id,
                'city_id' => City::where('name', $job->city)->first()->id,
                'jobtype_id' => JobType::where('name', $job->type)->first()->id,
                'name' => $job->title,
                'description' => $job->description,
                'image' => str($job->img)->replace('/storage/jobs/', ''),
                'slug' => $this->slug($job->title),
                'company' => $job->company,
                'views' => $job->views,
                'source' => $job->source,
                'status' => $job->status == 1 ? 2 : 1,
                'url' => $job->url,
                'keywords' => $job->keywords,
                'tls' => $job->tls,
                'cv' => $job->cv,
                'whatsapp' => $job->wh,
                'submission' => $job->apply,
                'register_through_awamir' => $job->awamir,
                'updated_at' => $job->updated_at,
                'created_at' => $job->created_at,
            ]);
        }
    }
}