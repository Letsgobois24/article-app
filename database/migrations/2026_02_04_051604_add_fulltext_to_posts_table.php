<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Add column
        DB::unprepared("
            ALTER TABLE posts
            ADD COLUMN searchable tsvector
        ");

        // Update all column
        DB::statement("
        UPDATE posts
        SET searchable = (setweight(to_tsvector('english', title), 'A') || setweight(to_tsvector('english', body), 'B'));
        ");

        // Create Function
        DB::unprepared("
        CREATE OR REPLACE FUNCTION searchable_tsvector_trigger() RETURNS trigger AS $$
        BEGIN
            NEW.searchable := 
            setweight(to_tsvector('english', NEW.title), 'A') 
            || setweight(to_tsvector('english', NEW.body), 'B');
            return NEW;
        END 
        $$ LANGUAGE plpgsql;
        ");

        // 
        DB::unprepared("
            CREATE TRIGGER tsvectorupdate 
            BEFORE INSERT OR UPDATE
	        ON posts 
            FOR EACH ROW 
            EXECUTE PROCEDURE searchable_tsvector_trigger();
        ");

        DB::statement("
            CREATE index posts_title_search 
            ON posts 
            USING gin(to_tsvector('english', title || ' ' || body))
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared("
            DROP TRIGGER tsvectorupdate 
	        ON posts 
        ");

        Schema::table('posts', function (Blueprint $table) {
            $table->dropIndex('posts_title_search');
            $table->dropColumn('searchable');
        });
    }
};
