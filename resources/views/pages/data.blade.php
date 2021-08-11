<?php

  $not_yet_recon = App\DataPenalty::where('status_recon_v2', "NOT YET RECON_OPEN")->orderBy('id_tiket', "DESC")->paginate(10);

?>

@extends('layout.master')

@push('plugin-styles')
@endpush

@section('content')
<div class="row">

    <div class="col-lg-12 grid-margin stretch-card">
    
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">All Data</h4>
        <div style="display: inline-block; width: 75%" >
        <form action="{{url('show/mitra')}}" method="POST">
          {!! Form::token() !!}
            <select name="mitra"  class="nav-link dropdown-toggle px-0" style="width: 50%; border: 1px solid blue; border-radius: 10px; float: left">
            @if(Session::has("mitra"))
            @php($mitra = Session::get("mitra"))
            <option selected>{{$mitra}}</option>
            @else
            <option selected>Pilih Kategori Mitra</option>
            @endif
            <option value="PT. DWIPARI SELARAS">PT. DWIPARI SELARAS</option>
            <option value="PT. PAMENGKANG JAGAT ABADI">PT. PAMENGKANG JAGAT ABADI</option>
            <option value="PT. RAKA MITRA BERSAMA">PT. RAKA MITRA BERSAMA</option>
            <option value="PT. RAKA MITRA BERSAMA">PT. DAYA GUNA KARSA</option>
            <option value="PT. RAKA MITRA BERSAMA">PT. NAYAKA PRATAMA</option>
            </select>
            <div style="display: inline-block">
            <a href="{{url('/delete/all')}}" style="float: right; justify-content: center; align-items: center; margin-top: 5px; " class="btn btn-danger" onclick="return confirm('Yakin hapus semua data?')">Delete All Data</a>
            &nbsp;
            <a href="{{url('/')}}" style="float: right; justify-content: center; align-items: center; margin-top: 5px; margin-right: 5px" class="btn btn-warning">See All</a>
            &nbsp;
            <button style="float: right; justify-content: center; align-items: center; margin-top: 5px; margin-right: 5px" class="btn btn-success">Submit</button>
            </div>
          </form>
        </div>
        <div class="table-responsive">
          <table class="table table-striped" style="width: 100%">
            <thead style="text-align: center">
              <tr>
                <th> Action</th>
                <th> Id Tiket</th>
                <th> Site Id </th>
                <th> Kondisi </th>
                <th> Kategori </th>
                <th> Tanggal Request </th>  
                <th> Region </th>
                <th> SLA Status Before Recon </th>
                <th> RTP Telkomsel </th>
                <th> Jenis Recon V1 </th>
                <th> Tanggal Close </th>
                <th> Tanggal Close After Recon </th>
                <th> Aging Time (Minutes) </th>
                <th> Aging Time After Recon 2 (Minutes) </th>
                <th> Lead Time Tsel V1 Before Recon (Days) </th>
                <th> Lead Time Tsel After Recon 2 (Days) </th>
                <th> Kondisi Site (Groups) Before Recon </th>
                <th> Kondisi Site After Recon V1 </th>
                <th> Estimasi Denda Original </th>
                <th> Estimasi Denda Recon Jika Final Approve </th>
                <th> Estimasi Denda LOLITA </th>
                <th> Status Recon </th>
                <th> Region IDTBG </th>
                <th> Month (Tanggal Open) </th>
                <th> XCheck Kondisi Site </th>
                <th> XCheck Waktu Close </th>
                <th> Status Recon ANT </th>
                <th> Durasi Recon (Days) </th>
                <th> Status Recon V2 </th>
                <th> Keterangan Reject </th>
                <th> Permasalahan </th>
                <th> Solusi </th>
                <th> Alasan Submit Recon </th>
                <th> Tenant Type </th>
                <th> PKS NO </th>
                <th> SOW CASE </th>
                <th> Month </th>
                <th> Region IDTBG </th>
                <th> Mitra </th>
                <th> MFO </th>
                <th> SPV </th>
              </tr>
            </thead>
            @foreach($data as $datas)
            <tbody style="text-align: center">
              <tr>
                <td>
                    <button class="btn btn-success">Edit</button> 
                    <button class="btn btn-danger">Delete</button> 
                </td>
                <td>{{$datas->id_tiket}}</td>
                <td>{{$datas->siteid}}</td>
                <td>{{$datas->kondisi_site}}</td>
                <td>{{$datas->kategori}}</td>
                <td>{{$datas->tgl_request}}</td>
                <td>{{$datas->region}}</td>
                <td>{{$datas->sla_status_beforerecon}}</td>
                <td>{{$datas->rtp_telkomsel}}</td>
                <td>{{$datas->jenis_recon_v1}}</td>
                <td>{{$datas->tgl_close}}</td>
                <td>{{$datas->tanggalclose_afterrecon}}</td>
                <td>{{$datas->agingtime_minutes}}</td>
                <td>{{$datas->agingtimeafterrecon_2_minutes}}</td>
                <td>{{$datas->leadtime_tsel_v1_beforerecon_days}}</td>
                <td>{{$datas->leadtime_tsel_v1_afterrecon_days}}</td>
                <td>{{$datas->kondisi_site_before_recon}}</td>
                <td>{{$datas->kondisisite_afterrecon_v1}}</td>
                <td>{{$datas->estimasidenda_original}}</td>
                <td>{{$datas->estimasidenda_recon_jikafinalapprove}}</td>
                <td>{{$datas->estimasidenda_lolita}}</td>
                <td>{{$datas->status_recon}}</td>
                <td>{{$datas->region_idtbg}}</td>
                <td>{{$datas->month_tanggal_open}}</td>
                <td>{{$datas->xcheck_kondisisite}}</td>
                <td>{{$datas->xcheck_waktu_close}}</td>
                <td>{{$datas->status_recon_ant}}</td>
                <td>{{$datas->durasirecon_days}}</td>
                <td>{{$datas->status_recon_v2}}</td>
                <td >{{$datas->keterangan_reject}}</td>
                <td  style="white-space: pre-wrap; word-wrap: break-word; max-width: 900px; display:table;  text-align: center">{{$datas->permasalahan}}</td>
                <td>{{$datas->solusi}}</td>
                <td>{{$datas->alasan_submitrecon}}</td>
                <td>{{$datas->tenant_type}}</td>
                <td>{{$datas->pks_no}}</td>
                <td>{{$datas->sow_case}}</td>
                <td>{{$datas->month}}</td>
                <td>{{$datas->region_idtbg_2}}</td>
                <td>{{$datas->mitra}}</td>
                <td>{{$datas->mfo}}</td>
                <td>{{$datas->spv}}</td>
              </tr>
            </tbody>
            @endforeach
          </table>
         
        </div>
         <br>
        <span style="float: right">{{$data->links("pagination::bootstrap-4")}}</span>
      </div>
    </div>
  </div>
  
  <div class="col-lg-12 grid-margin stretch-card">
    
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Not Yet Recon Open</h4>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th> Action</th>
                <th> Id Tiket</th>
                <th> Site Id </th>
                <th> Kondisi </th>
                <th> Kategori </th>
                <th> Tanggal Request </th>
                <th> Region </th>
                <th> SLA Status Before Recon </th>
                <th> RTP Telkomsel </th>
                <th> Jenis Recon V1 </th>
                <th> Tanggal Close </th>
                <th> Tanggal Close After Recon </th>
                <th> Aging Time (Minutes) </th>
                <th> Aging Time After Recon 2 (Minutes) </th>
                <th> Lead Time Tsel V1 Before Recon (Days) </th>
                <th> Lead Time Tsel After Recon 2 (Days) </th>
                <th> Kondisi Site (Groups) Before Recon </th>
                <th> Kondisi Site After Recon V1 </th>
                <th> Estimasi Denda Original </th>
                <th> Estimasi Denda Recon Jika Final Approve </th>
                <th> Estimasi Denda LOLITA </th>
                <th> Status Recon </th>
                <th> Region IDTBG </th>
                <th> Month (Tanggal Open) </th>
                <th> XCheck Kondisi Site </th>
                <th> XCheck Waktu Close </th>
                <th> Status Recon ANT </th>
                <th> Durasi Recon (Days) </th>
                <th> Status Recon V2 </th>
                <th> Keterangan Reject </th>
                <th> Permasalahan </th>
                <th> Solusi </th>
                <th> Alasan Submit Recon </th>
                <th> Tenant Type </th>
                <th> PKS NO </th>
                <th> SOW CASE </th>
                <th> Month </th>
                <th> Region IDTBG </th>
                <th> Mitra </th>
                <th> MFO </th>
                <th> SPV </th>
              </tr>
            </thead>
            @foreach($not_yet_recon as $not_yet_recons)
            <tbody style="text-align: center">
              <tr>
                <td>
                    <button class="btn btn-success">Edit</button> 
                    <button class="btn btn-danger">Delete</button> 
                </td>
                <td>{{$not_yet_recons->id_tiket}}</td>
                <td>{{$not_yet_recons->siteid}}</td>
                <td>{{$not_yet_recons->kondisi_site}}</td>
                <td>{{$not_yet_recons->kategori}}</td>
                <td>{{$not_yet_recons->tgl_request}}</td>
                <td>{{$not_yet_recons->region}}</td>
                <td>{{$not_yet_recons->sla_status_beforerecon}}</td>
                <td>{{$not_yet_recons->rtp_telkomsel}}</td>
                <td>{{$not_yet_recons->jenis_recon_v1}}</td>
                <td>{{$not_yet_recons->tgl_close}}</td>
                <td>{{$not_yet_recons->tanggalclose_afterrecon}}</td>
                <td>{{$not_yet_recons->agingtime_minutes}}</td>
                <td>{{$not_yet_recons->agingtimeafterrecon_2_minutes}}</td>
                <td>{{$not_yet_recons->leadtime_tsel_v1_beforerecon_days}}</td>
                <td>{{$not_yet_recons->leadtime_tsel_v1_afterrecon_days}}</td>
                <td>{{$not_yet_recons->kondisi_site_before_recon}}</td>
                <td>{{$not_yet_recons->kondisisite_afterrecon_v1}}</td>
                <td>{{$not_yet_recons->estimasidenda_original}}</td>
                <td>{{$not_yet_recons->estimasidenda_recon_jikafinalapprove}}</td>
                <td>{{$not_yet_recons->estimasidenda_lolita}}</td>
                <td>{{$not_yet_recons->status_recon}}</td>
                <td>{{$not_yet_recons->region_idtbg}}</td>
                <td>{{$not_yet_recons->month_tanggal_open}}</td>
                <td>{{$not_yet_recons->xcheck_kondisisite}}</td>
                <td>{{$not_yet_recons->xcheck_waktu_close}}</td>
                <td>{{$not_yet_recons->status_recon_ant}}</td>
                <td>{{$not_yet_recons->durasirecon_days}}</td>
                <td>{{$not_yet_recons->status_recon_v2}}</td>
                <td  style="white-space: pre-wrap; word-wrap: break-word; max-width: 900px; display:table; text-align: center">{{$not_yet_recons->keterangan_reject}}</td>
                <td  style="white-space: pre-wrap; word-wrap: break-word; max-width: 900px; display:table; text-align: center">{{$not_yet_recons->permasalahan}}</td>
                <td>{{$not_yet_recons->solusi}}</td>
                <td>{{$not_yet_recons->alasan_submitrecon}}</td>
                <td>{{$not_yet_recons->tenant_type}}</td>
                <td>{{$not_yet_recons->pks_no}}</td>
                <td>{{$not_yet_recons->sow_case}}</td>
                <td>{{$not_yet_recons->month}}</td>
                <td>{{$not_yet_recons->region_idtbg_2}}</td>
                <td>{{$not_yet_recons->mitra}}</td>
                <td>{{$not_yet_recons->mfo}}</td>
                <td>{{$not_yet_recons->spv}}</td>
              </tr>
            </tbody>
            @endforeach
          </table>
         
        </div>
         <br>
        <span style="float: right">{{$not_yet_recon->links("pagination::bootstrap-4")}}</span>
      </div>
    </div>
  </div>
  
  
  
  <div class="col-lg-12 grid-margin stretch-card">
    
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Summary</h4>
        <p class="card-description"> Add class <code>.table-striped</code> </p>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th> Id Tiket</th>
                <th> Site Id </th>
                <th> Kondisi </th>
                <th> Kategori </th>
                <th> Deadline </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="py-1">
                  <!--<img src="{{ url('assets/images/faces-clipart/pic-1.png') }}" alt="image" /> -->434500
                  </td>
                <td> SKB701 </td>
                <td>
                  <!--<div class="progress">-->
                  <!--  <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>-->
                  <!--</div>-->
                  Mati
                </td>
                <td> POWER </td>
                <td> May 15, 2015 </td>
              </tr>
              <tr>
                <td class="py-1">
                  <img src="{{ url('assets/images/faces-clipart/pic-2.png') }}" alt="image" /> </td>
                <td> Messsy Adam </td>
                <td>
                  <div class="progress">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </td>
                <td> $245.30 </td>
                <td> July 1, 2015 </td>
              </tr>
              <tr>
                <td class="py-1">
                  <img src="{{ url('assets/images/faces-clipart/pic-3.png') }}" alt="image" /> </td>
                <td> John Richards </td>
                <td>
                  <div class="progress">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </td>
                <td> $138.00 </td>
                <td> Apr 12, 2015 </td>
              </tr>
              <tr>
                <td class="py-1">
                  <img src="{{ url('assets/images/faces-clipart/pic-4.png') }}" alt="image" /> </td>
                <td> Peter Meggik </td>
                <td>
                  <div class="progress">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </td>
                <td> $ 77.99 </td>
                <td> May 15, 2015 </td>
              </tr>
              <tr>
                <td class="py-1">
                  <img src="{{ url('assets/images/faces-clipart/pic-1.png') }}" alt="image" /> </td>
                <td> Edward </td>
                <td>
                  <div class="progress">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </td>
                <td> $ 160.25 </td>
                <td> May 03, 2015 </td>
              </tr>
              <tr>
                <td class="py-1">
                  <img src="{{ url('assets/images/faces-clipart/pic-2.png') }}" alt="image" /> </td>
                <td> John Doe </td>
                <td>
                  <div class="progress">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </td>
                <td> $ 123.21 </td>
                <td> April 05, 2015 </td>
              </tr>
              <tr>
                <td class="py-1">
                  <img src="{{ url('assets/images/faces-clipart/pic-3.png') }}" alt="image" /> </td>
                <td> Henry Tom </td>
                <td>
                  <div class="progress">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </td>
                <td> $ 150.00 </td>
                <td> June 16, 2015 </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
<!--  <div class="col-lg-12 grid-margin stretch-card">-->
<!--    <div class="card">-->
<!--      <div class="card-body">-->
<!--        <h4 class="card-title">Bordered table</h4>-->
<!--        <p class="card-description"> Add class <code>.table-bordered</code> </p>-->
<!--        <div class="table-responsive">-->
<!--          <table class="table table-bordered">-->
<!--            <thead>-->
<!--              <tr>-->
<!--                <th> # </th>-->
<!--                <th> First name </th>-->
<!--                <th> Progress </th>-->
<!--                <th> Amount </th>-->
<!--                <th> Deadline </th>-->
<!--              </tr>-->
<!--            </thead>-->
<!--            <tbody>-->
<!--              <tr>-->
<!--                <td> 1 </td>-->
<!--                <td> Herman Beck </td>-->
<!--                <td>-->
<!--                  <div class="progress">-->
<!--                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>-->
<!--                  </div>-->
<!--                </td>-->
<!--                <td> $ 77.99 </td>-->
<!--                <td> May 15, 2015 </td>-->
<!--              </tr>-->
<!--              <tr>-->
<!--                <td> 2 </td>-->
<!--                <td> Messsy Adam </td>-->
<!--                <td>-->
<!--                  <div class="progress">-->
<!--                    <div class="progress-bar bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>-->
<!--                  </div>-->
<!--                </td>-->
<!--                <td> $245.30 </td>-->
<!--                <td> July 1, 2015 </td>-->
<!--              </tr>-->
<!--              <tr>-->
<!--                <td> 3 </td>-->
<!--                <td> John Richards </td>-->
<!--                <td>-->
<!--                  <div class="progress">-->
<!--                    <div class="progress-bar bg-warning" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>-->
<!--                  </div>-->
<!--                </td>-->
<!--                <td> $138.00 </td>-->
<!--                <td> Apr 12, 2015 </td>-->
<!--              </tr>-->
<!--              <tr>-->
<!--                <td> 4 </td>-->
<!--                <td> Peter Meggik </td>-->
<!--                <td>-->
<!--                  <div class="progress">-->
<!--                    <div class="progress-bar bg-primary" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>-->
<!--                  </div>-->
<!--                </td>-->
<!--                <td> $ 77.99 </td>-->
<!--                <td> May 15, 2015 </td>-->
<!--              </tr>-->
<!--              <tr>-->
<!--                <td> 5 </td>-->
<!--                <td> Edward </td>-->
<!--                <td>-->
<!--                  <div class="progress">-->
<!--                    <div class="progress-bar bg-danger" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>-->
<!--                  </div>-->
<!--                </td>-->
<!--                <td> $ 160.25 </td>-->
<!--                <td> May 03, 2015 </td>-->
<!--              </tr>-->
<!--              <tr>-->
<!--                <td> 6 </td>-->
<!--                <td> John Doe </td>-->
<!--                <td>-->
<!--                  <div class="progress">-->
<!--                    <div class="progress-bar bg-info" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>-->
<!--                  </div>-->
<!--                </td>-->
<!--                <td> $ 123.21 </td>-->
<!--                <td> April 05, 2015 </td>-->
<!--              </tr>-->
<!--              <tr>-->
<!--                <td> 7 </td>-->
<!--                <td> Henry Tom </td>-->
<!--                <td>-->
<!--                  <div class="progress">-->
<!--                    <div class="progress-bar bg-warning" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>-->
<!--                  </div>-->
<!--                </td>-->
<!--                <td> $ 150.00 </td>-->
<!--                <td> June 16, 2015 </td>-->
<!--              </tr>-->
<!--            </tbody>-->
<!--          </table>-->
<!--        </div>-->
<!--      </div>-->
<!--    </div>-->
<!--  </div>-->
<!--  <div class="col-lg-12 grid-margin stretch-card">-->
<!--    <div class="card">-->
<!--      <div class="card-body">-->
<!--        <h4 class="card-title">Inverse table</h4>-->
<!--        <p class="card-description"> Add class <code>.table-dark</code> </p>-->
<!--        <div class="table-responsive">-->
<!--          <table class="table table-dark">-->
<!--            <thead>-->
<!--              <tr>-->
<!--                <th> # </th>-->
<!--                <th> First name </th>-->
<!--                <th> Amount </th>-->
<!--                <th> Deadline </th>-->
<!--              </tr>-->
<!--            </thead>-->
<!--            <tbody>-->
<!--              <tr>-->
<!--                <td> 1 </td>-->
<!--                <td> Herman Beck </td>-->
<!--                <td> $ 77.99 </td>-->
<!--                <td> May 15, 2015 </td>-->
<!--              </tr>-->
<!--              <tr>-->
<!--                <td> 2 </td>-->
<!--                <td> Messsy Adam </td>-->
<!--                <td> $245.30 </td>-->
<!--                <td> July 1, 2015 </td>-->
<!--              </tr>-->
<!--              <tr>-->
<!--                <td> 3 </td>-->
<!--                <td> John Richards </td>-->
<!--                <td> $138.00 </td>-->
<!--                <td> Apr 12, 2015 </td>-->
<!--              </tr>-->
<!--              <tr>-->
<!--                <td> 4 </td>-->
<!--                <td> Peter Meggik </td>-->
<!--                <td> $ 77.99 </td>-->
<!--                <td> May 15, 2015 </td>-->
<!--              </tr>-->
<!--              <tr>-->
<!--                <td> 5 </td>-->
<!--                <td> Edward </td>-->
<!--                <td> $ 160.25 </td>-->
<!--                <td> May 03, 2015 </td>-->
<!--              </tr>-->
<!--              <tr>-->
<!--                <td> 6 </td>-->
<!--                <td> John Doe </td>-->
<!--                <td> $ 123.21 </td>-->
<!--                <td> April 05, 2015 </td>-->
<!--              </tr>-->
<!--              <tr>-->
<!--                <td> 7 </td>-->
<!--                <td> Henry Tom </td>-->
<!--                <td> $ 150.00 </td>-->
<!--                <td> June 16, 2015 </td>-->
<!--              </tr>-->
<!--            </tbody>-->
<!--          </table>-->
<!--        </div>-->
<!--      </div>-->
<!--    </div>-->
<!--  </div>-->
<!--  <div class="col-lg-12 stretch-card">-->
<!--    <div class="card">-->
<!--      <div class="card-body">-->
<!--        <h4 class="card-title">Table with contextual classes</h4>-->
<!--        <p class="card-description"> Add class <code>.table-{color}</code> </p>-->
<!--        <div class="table-responsive">-->
<!--          <table class="table table-bordered">-->
<!--            <thead>-->
<!--              <tr>-->
<!--                <th> # </th>-->
<!--                <th> First name </th>-->
<!--                <th> Product </th>-->
<!--                <th> Amount </th>-->
<!--                <th> Deadline </th>-->
<!--              </tr>-->
<!--            </thead>-->
<!--            <tbody>-->
<!--              <tr class="table-info">-->
<!--                <td> 1 </td>-->
<!--                <td> Herman Beck </td>-->
<!--                <td> Photoshop </td>-->
<!--                <td> $ 77.99 </td>-->
<!--                <td> May 15, 2015 </td>-->
<!--              </tr>-->
<!--              <tr class="table-warning">-->
<!--                <td> 2 </td>-->
<!--                <td> Messsy Adam </td>-->
<!--                <td> Flash </td>-->
<!--                <td> $245.30 </td>-->
<!--                <td> July 1, 2015 </td>-->
<!--              </tr>-->
<!--              <tr class="table-danger">-->
<!--                <td> 3 </td>-->
<!--                <td> John Richards </td>-->
<!--                <td> Premeire </td>-->
<!--                <td> $138.00 </td>-->
<!--                <td> Apr 12, 2015 </td>-->
<!--              </tr>-->
<!--              <tr class="table-success">-->
<!--                <td> 4 </td>-->
<!--                <td> Peter Meggik </td>-->
<!--                <td> After effects </td>-->
<!--                <td> $ 77.99 </td>-->
<!--                <td> May 15, 2015 </td>-->
<!--              </tr>-->
<!--              <tr class="table-primary">-->
<!--                <td> 5 </td>-->
<!--                <td> Edward </td>-->
<!--                <td> Illustrator </td>-->
<!--                <td> $ 160.25 </td>-->
<!--                <td> May 03, 2015 </td>-->
<!--              </tr>-->
<!--            </tbody>-->
<!--          </table>-->
<!--        </div>-->
<!--      </div>-->
<!--    </div>-->
<!--  </div>-->
</div>
@endsection

@push('plugin-scripts')
@endpush

@push('custom-scripts')
@endpush