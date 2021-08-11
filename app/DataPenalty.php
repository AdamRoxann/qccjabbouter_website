<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataPenalty extends Model
{
    protected $table = "data_penalty";

    protected $fillable = ["id_tiket", "siteid", "kondisi_site", "kategori", "tgl_request", "region", "sla_status_beforerecon", "rtp_telkomsel", "jenis_recon_v1", 
    "tgl_close", "tanggalclose_afterrecon", "agingtime_minutes", "agingtimeafterrecon_2_minutes", "leadtime_tsel_v1_beforerecon_days", "leadtime_tsel_v1_afterrecon_days", 
    "kondisi_site_before_recon", "kondisisite_afterrecon_v1", "estimasidenda_original", "estimasidenda_recon_jikafinalapprove", "estimasidenda_lolita", "status_recon", 
    "region_idtbg", "month_tanggal_open", "xcheck_kondisisite", "xcheck_waktu_close", "status_recon_ant", "durasirecon_days", "status_recon_v2", "keterangan_reject", 
    "permasalahan", "solusi", "alasan_submitrecon", "tenant_type", "pks_no", "sow_case",
    "month", "region_idtbg_2", "mitra", "mfo", "spv"];
}
