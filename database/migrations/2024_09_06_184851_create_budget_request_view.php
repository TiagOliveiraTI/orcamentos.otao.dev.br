<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Verifica se o banco de dados não é SQLite antes de tentar remover a VIEW
        if (DB::connection()->getDriverName() !== 'sqlite') {
            DB::statement('DROP VIEW IF EXISTS budget_request_view');
        }

        // Cria a consulta SQL para a VIEW
        $query = DB::table("budgets as b")
            ->join("requests as r", 'r.id', '=', 'b.request_id')
            ->join("clients as c", 'c.id', '=', 'r.client_id')
            ->join("difficult_levels as dl", 'dl.id', '=', 'r.difficult_level_id')
            ->join("service_types as st", 'st.id', '=', 'r.service_type_id')
            ->join("users as u", 'u.id', '=', 'r.user_id')
            ->select(
                DB::raw('u.name as user_name'),
                DB::raw('c.name as client'),
                DB::raw('st.name as service_type'),
                DB::raw('b.details as budget_details'),
                DB::raw('b.total_amount'),
                DB::raw('r.created_at as request_date')
            )
            ->toSql();

        // Cria a VIEW usando a consulta SQL
        DB::statement("CREATE VIEW budget_request_view AS $query");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Verifica se o banco de dados não é SQLite antes de tentar remover a VIEW
        if (DB::connection()->getDriverName() !== 'sqlite') {
            DB::statement('DROP VIEW IF EXISTS budget_request_view');
        }
    }
};
