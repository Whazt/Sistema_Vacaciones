<?php

namespace App\Console\Commands;

use App\Models\Solicitud;
use Illuminate\Console\Command;
use Carbon\Carbon;

class RejectExpiredRequests extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:reject-expired';

    /**
     * 
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $today = Carbon::now()->startOfDay(); 

        $updated = Solicitud::where('estado', 'Pendiente')
            ->where('fecha_inicio', '<=', $today)
            ->update(['estado' => 'Rechazado']);
        
        $this->info("Se rechazaron {$updated} solicitudes de vacaciones vencidas.");
        
        return Command::SUCCESS;
    }
}
