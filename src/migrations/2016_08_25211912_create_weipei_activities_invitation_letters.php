<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeipeiActivitiesInvitations extends Migration
{

    private $table = 'invitation_letters';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('weipei_activities')->create($this->table, function(Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('name', 45)->default('')->comment('用户名称');
            $table->string('telephone', 11)->unique('telephone_UNIQUE')->default('')->comment('联系电话');
            $table->string('extra', 255)->default('')->comment('额外信息');
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
            $table->dateTime('deleted_at');
        });
        DB::connection('weipei_activities')->statement("ALTER TABLE `$this->table` comment '配件商研讨会邀请函'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
