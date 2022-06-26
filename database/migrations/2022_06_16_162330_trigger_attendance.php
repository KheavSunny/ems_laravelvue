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
                    declare
                        t1 double precision;
                        t2 double precision;
                        t3 double precision;
                        t4 double precision;

                    BEGIN
                        IF (new."t1" IS NULL ) THEN
                            t1 = 0;
                        ELSE
                            t1 = 0.25;
                        END IF;
                        IF (new."t2" IS NULL) THEN
                            t2 = 0;
                        ELSE
                            t2 = 0.25;
                        END IF;
                        IF (new."t3" IS NULL) THEN
                            t3 = 0;
                        ELSE
                            t3 = 0.25;
                        END IF;
                        IF (new."t4" IS NULL) THEN
                            t4 = 0;
                        ELSE
                            t4 = 0.25;
                        END IF;

                        new."t" = t1 + t2 + t3 + t4;
                        return new;
                    END;
                $BODY$;

            ALTER FUNCTION public.att_insert()
            OWNER TO pmnmsfaxftihpr;
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
        OWNER TO pmnmsfaxftihpr;
        ');

        DB::unprepared('
            CREATE TRIGGER overtime
                BEFORE INSERT OR UPDATE OF t5, t6
                ON public.attendances
                FOR EACH ROW
                EXECUTE FUNCTION public.overtime();
        ');

        DB::unprepared('
        CREATE FUNCTION public.ref_no_auto_increment()
        RETURNS trigger
        LANGUAGE plpgsql
            NOT LEAKPROOF
        AS $BODY$
            BEGIN
                new."ref_no" = CONCAT(DATE_PART(\'YEAR\',CURRENT_DATE),\'_\',(LPAD(new."id"::text,5,\'0\')));
                return new;
            END;
        $BODY$;

        ALTER FUNCTION public.ref_no_auto_increment()
        OWNER TO pmnmsfaxftihpr;
        ');

        DB::unprepared('
            CREATE TRIGGER ref_no_auto_increment
                BEFORE INSERT OR UPDATE OF ref_no
                ON public.payments
                FOR EACH ROW
                EXECUTE FUNCTION public.ref_no_auto_increment();
        ');
        DB::unprepared('
            CREATE FUNCTION public.cal_loan_remain()
            RETURNS trigger
            LANGUAGE plpgsql
                NOT LEAKPROOF
            AS $BODY$
                    declare
                        amount int;
                        repay int;
                    BEGIN
                        amount = new."amount";
                        repay = new."repay";
                        new."remain" = amount - repay;
                        return new;
                    END;
            $BODY$;
        ');
        DB::unprepared('
            CREATE TRIGGER cal_loan_remain
                BEFORE INSERT OR UPDATE OF amount, repay
                ON public.loan_details
                FOR EACH ROW
                EXECUTE FUNCTION public.cal_loan_remain();
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
        DB::unprepared('
            DROP FUNCTION public.ref_no_auto_increment() IF EXISTS;
        ');
    }
};
