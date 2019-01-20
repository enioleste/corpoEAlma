<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Log;
use App\Pedido;
class PedidosSAPSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
  public function run(){

        $dt = Carbon::now();
        echo "PedidoSAPSeeder ".$dt." \n";

        //
        //1 PEGAR ARQUIVO NO FTP DO SAP
        //
        $allFiles = Storage::disk('ftp_portal')->allFiles('/PortalAgendamento/');
        $regex = "/PortalAgendamento.txt/";
        // iterate through files and echo their content
        $file = "";
        foreach ($allFiles as $remote_path_file) {
            if (preg_match($regex, $remote_path_file)) {
                try {
                //download to local
                $local_path_file = pathinfo($remote_path_file);                
                $local_filename = $local_path_file['basename'];
                $file = storage_path('portal')."/".$local_filename;

                Storage::disk('local_portal')->put($local_filename, Storage::disk('ftp_portal')->get($remote_path_file));
                } catch (Exception $e) {
                    Log::error($e);
                }
            }
        }
        //DROPANDO DADOS DA TABELA
        print("PedidosSAPSeeder ".$dt->now() . " Deletando Tabela Pedidos ");
        Pedido::truncate();
        
        print("PedidosSAPSeeder ". $dt->now() . " Processando Arquivo " . $file ." \n");
        $handle = fopen($file, 'r');
        if ($handle) {
            while ($line = fgetcsv($handle, 0, ';')) {
                //dd(ltrim($line[0], '0'));
                //NUM_PEDIDO(DOC_COMPRA) [0]
                //EDD [1]
                //COD_FORNECEDOR [2]
                //Data_criacao [6]
                Log::debug( __METHOD__ . ' Salvando dados do Arquivo');
                try {
                    $this->pedido = new Pedido;
                    $this->pedido->doc_compra = ltrim($line[0], '0');
                    $this->pedido->edd = ltrim($line[1], '0');
                    $this->pedido->sap_fornecedor_id = $line[2];
                    $this->pedido->data_criacao = $line[6];
                    $this->pedido->save();
                    
                } catch (Exception $e) {
                    Log::error("PedidoSAPSeeder pedido " . ltrim($line[0], '0') . $e);
                }
            }
        }    
    }
}