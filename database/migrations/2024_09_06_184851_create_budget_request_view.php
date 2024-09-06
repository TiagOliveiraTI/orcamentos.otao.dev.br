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
        $query = DB::table("budgets as b")
            ->join("requests as r", 'r.id', '=', 'b.request_id')
            ->join("clients as c", 'c.id', '=', 'r.client_id')
            ->join("difficult_levels as dl", 'dl.id', '=', 'r.difficult_level_id')
            ->join("service_types as st", 'st.id', '=', 'r.service_type_id')
            ->join("users as u", 'u.id', '=', 'r.user_id')
            ->selectRaw("
                u.name as user_name,
                c.name as client,
                st.name as service_type,
                b.details as budget_details,
                b.total_amount,
                r.created_at as request_date
            ")
            ->toSql();

        DB::statement("CREATE VIEW budget_request_view AS $query");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('DROP VIEW IF EXISTS budget_request_view');
    }
};
