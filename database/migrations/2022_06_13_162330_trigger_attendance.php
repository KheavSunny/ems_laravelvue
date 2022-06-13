<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE FUNCTION public.att_insert()
                RETURNS trigger
                LANGUAGE plpgsql
                    NOT LEAKPROOF
                AS $BODY$
                    BEGIN
                        IF new."t1" IS NOT NULL and new."t2" IS NULL and new."t3" IS NULL and new."t4" IS NULL THEN
                            new."t" = 0.25;
                        ELSEIF new."t1" IS NOT NULL and new."t2" IS NOT NULL and new."t3" IS NULL and new."t4" IS NULL THEN
                            new."t" = 0.50;
                        ELSEIF new."t1" IS NOT NULL and new."t2" IS NOT NULL and new."t3" IS NOT NULL and new."t4" IS NULL THEN
                            new."t" = 0.75;
                        ELSE
                            new."t" = 1;
                        END IF;

                        return new;
                    END;
                $BODY$;

            ALTER FUNCTION public.att_insert()
            OWNER TO postgres;
        ');

        DB::unprepared('
        CREATE TRIGGER attendance_count
            BEFORE INSERT OR UPDATE OF t1, t2, t3, t4
            ON public.attendances
            FOR EACH ROW
            EXECUTE FUNCTION public.att_insert();
        ');

        DB::unprepared('
        CREATE FUNCTION public.overtime()
        RETURNS trigger
        LANGUAGE plpgsql
            NOT LEAKPROOF
        AS $BODY$
            declare
                timein time;
                timeout time;
            BEGIN
                IF new."t5" IS NULL OR new."t6" IS NULL THEN
                    new."overtime" = \'00:00:00\';
                    return new;
                END IF;
                    timein = (SELECT ar."time" FROM attendance_records as ar WHERE id = new."t5");
                    timeout = (SELECT ar."time" FROM attendance_records as ar WHERE id = new."t6");

                    new."overtime" = timeout - timein ;
                    return new;
            END;
        $BODY$;

        ALTER FUNCTION public.overtime()
        OWNER TO postgres;
        ');

        DB::unprepared('
            CREATE TRIGGER overtime
                BEFORE INSERT OR UPDATE OF t5, t6
                ON public.attendances
                FOR EACH ROW
                EXECUTE FUNCTION public.overtime();
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('
            DROP TRIGGER attendance_count IF EXISTS
            ON attendances;
        ');

        DB::unprepared('
            DROP TRIGGER overtime IF EXISTS
            ON attendances;
        ');

        DB::unprepared('
            DROP FUNCTION public.att_insert() IF EXISTS;
        ');
        DB::unprepared('
            DROP FUNCTION public.overtime() IF EXISTS;
        ');
    }
};
