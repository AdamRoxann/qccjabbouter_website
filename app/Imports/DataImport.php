<?php

namespace App\Imports;

use App\DataPenalty;
use Maatwebsite\Excel\Concerns\ToModel;

class DataImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new DataPenalty([
           'id_tiket'     => $row[0],
            'siteid'    => $row[1], 
            'kondisi_site' => $row[2],
            'kategori' => $row[3],
            'tgl_request' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[4]),
            'region' => $row[5],
            'sla_status_beforerecon' => $row[6],
            'rtp_telkomsel' => $row[7],
            'jenis_recon_v1' => $row[8],
            'tgl_close' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[9]),
            'tanggalclose_afterrecon' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[10]),
            'agingtime_minutes' => $row[11],
            'agingtimeafterrecon_2_minutes' => $row[12],
            'leadtime_tsel_v1_beforerecon_days' => $row[13],
            'leadtime_tsel_v1_afterrecon_days' => $row[14],
            'kondisi_site_before_recon' => $row[15],
            'kondisisite_afterrecon_v1' => $row[16],
            'estimasidenda_original' => $row[17],
            'estimasidenda_recon_jikafinalapprove' => $row[18],
            'estimasidenda_lolita' => $row[19],
            'status_recon' => $row[20],
            'region_idtbg' => $row[21],
            'month_tanggal_open' => $row[22],
            'xcheck_kondisisite' => $row[23],
            'xcheck_waktu_close' => $row[24],
            'status_recon_ant' => $row[25],
            'durasirecon_days' => $row[26],
            'status_recon_v2' => $row[27],
            'keterangan_reject' => $row[28],
            'permasalahan' => $row[29],
            'solusi' => $row[30],
            'alasan_submitrecon' => $row[31],
            'tenant_type' => $row[32],
            'pks_no' => $row[33],
            'sow_case' => $row[34],
            'month' => $row[35],
            'region_idtbg_2' => $row[36],
            'mitra' => $row[37],
            'mfo' => $row[38],
            'spv' => $row[39],
        ]);
    }
}
