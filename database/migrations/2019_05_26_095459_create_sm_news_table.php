<?php
use App\SmNews;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSmNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sm_news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('news_title');
            $table->integer('view_count')->nullable();
            $table->integer('active_status')->nullable();
            $table->string('image')->nullable();
            $table->string('image_thumb')->nullable();
            $table->longText('news_body')->nullable();
            $table->date('publish_date')->nullable();
            $table->tinyInteger('status')->default(1)->nullable();
            $table->tinyInteger('is_global')->default(1)->nullable();
            $table->tinyInteger('auto_approve')->default(0)->nullable();
            $table->tinyInteger('is_comment')->default(0)->nullable();
            $table->string('order')->nullable();
            $table->timestamps();

            $table->integer('category_id')->nullable()->unsigned();
            $table->foreign('category_id')->references('id')->on('sm_news_categories')->onDelete('cascade');

            $table->integer('created_by')->nullable()->default(1)->unsigned();

            $table->integer('updated_by')->nullable()->default(1)->unsigned();

            $table->integer('school_id')->nullable()->default(1)->unsigned();
            
            $table->integer('academic_id')->nullable()->default(1)->unsigned();
        });

        $faker = Faker::create();
        $i=1;
        $cid=[1,1,1,1,2,2,2,2,3,3,3,3];
        foreach (range(1,12) as $key=>$index) {
            $storeData = new SmNews();
            if ($key == 0) {
                $storeData->news_title = "Empowering Classrooms with Smart School Technology";
                $storeData->news_body = "Discover how modern school management tools are transforming traditional classrooms. GRpro helps educators focus more on teaching by automating attendance, assignments, and communication. Explore how schools are embracing digital tools to create a more engaging and efficient learning environment.";
            } elseif ($key == 1) {
                $storeData->news_title = "Building Better Parent-Teacher Partnerships with GRpro";
                $storeData->news_body = "Effective communication between schools and parents is essential for student success. GRpro bridges this gap by offering real-time updates on attendance, grades, and school activities. Learn how this technology is strengthening trust and transparency across school communities.";
            } elseif ($key == 2) {
                $storeData->news_title = "Simplifying School Operations: GRpro in Action";
                $storeData->news_body = "From admissions to report cards, school administration can be complex. GRpro simplifies day-to-day tasks with user-friendly tools for teachers, staff, and administrators. Read how schools are saving time and improving accuracy with GRpro's all-in-one ERP solution.";
            } else {
                $storeData->news_title = $faker->text(40);
                $storeData->news_body = $faker->text(500);
            }
            $storeData->view_count = $faker->randomDigit;
            $storeData->active_status = 1;
            $storeData->image = 'public/uploads/news/news'.$i.'.jpg';
            $storeData->publish_date = '2024-06-02';
            $storeData->category_id = $cid[$i-1];
            $storeData->order =$i++;
            $storeData->created_at = date('Y-m-d h:i:s');
            $storeData->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sm_news');
    }
}
