<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropOldTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $old_tables = [
            'auth_group_permissions',
            'auth_user_groups',
            'auth_group',
            'django_admin_log',
            'auth_user_user_permissions',
            'auth_user',
            'auth_permission',
            'django_content_type',
            'django_migrations',
            'django_session',
        ];
        foreach($old_tables as $table) {
            Schema::drop($table);
        }
        Schema::table('django_redirect', function($table) {
            $table->dropColumn('site_id');
        });
        Schema::rename('django_redirect', 'redirects');
        Schema::drop('django_site');
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
