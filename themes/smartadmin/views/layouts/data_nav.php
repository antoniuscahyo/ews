<?php 
/*$page_nav = array(
	"dashboard" => array(
		"title" => "Dashboard",
		"url" => "dashboard",
		"icon" => "fa-home"
	),
	
    "pengawasan" => array(
        "title" => "A. Pengawasan",
        "icon" => "fa fa-building",
        "sub" => array(
            "peng_perencanaan" => array(
                "title" => "A.1 Rencana Survey",
                "icon" => "fa-desktop",
                "sub" => array(
                    "pengawasan_rencana_survey_input" => array(
                    "title" => "A.1.1 Jadwal Survey",
                    "url" => "pengawasan/tbljadwalsurvey/inputjadwalsurvey"
                ),
                "pengawasan_rencana_survey_cetak" => array(
                    "title" => "A.1.2 Cetak Jadwal",
                    "url" => "pengawasan/tbljadwalsurvey/cetakjadwalsurvey"
                ),
                    
            )
        ),
            "peng_berita_acara" => array(
                "title" => "A.2 Hasil Survey",
                "icon" => "fa-desktop",
                "sub" => array(
                    "in_berita_acara_survey" => array(
                    "title" => "A.2.1 Survey",
                    "url" => "pengawasan/tblhasilsurvey/index"
                ),
                "ctk_berita_acara_survey" => array(
                    "title" => "A.2.2 Cetak Survey",
                    "url" => "pengawasan/tblhasilsurvey/cetak"
                )
                    
        ),

    ), //END ARRAY MENU SUB
                "peng_pemberitahuan" => array(
                "title" => "A.3 Pemberitahuan",
                "icon" => "fa-desktop",
                "sub" => array(
                    "frm_in_pemberitahuan" => array(
                    "title" => "A.3.1 Data Surat",
                    "url" => "pengawasan/tbldatasurat/datasurat"
                    ),
                    "frm_ctk_pemberitahuan" => array(
                        "title" => "A.3.2 Cetak Daftar",
                        "url" => "pengawasan/tbldatasurat/ctkdatasurat"
                    ),
                    
        ),

    ), //END ARRAY MENU SUB
                "peng_monitoring1" => array(
                "title" => "A.4 Monitoring SP1",
                "icon" => "fa-desktop",
                "sub" => array(
                   "frm_in_monitoring1" => array(
                    "title" => "A.4.1 Data SP1",
                    "url" => "pengawasan/tbldatasurat/monitoringsp1"
                ),
                 "frm_in_monitoringctk1" => array(
                    "title" => "A.4.2 Cetak Daftar ",
                    "url" => "pengawasan/tbldatasurat/ctkmonitoringsp1"
                ),
                    
        ),

    ), //END ARRAY MENU SUB

                "peng_monitoring2" => array(
                "title" => "A.5 Monitoring SP2",
                "icon" => "fa-desktop",
                "sub" => array(
                   "frm_in_monitoring2" => array(
                    "title" => "A.5.1 Data SP2",
                    "url" => "pengawasan/tbldatasurat/monitoringsp2"
                ),
                 "frm_in_monitoringctk2" => array(
                    "title" => "A.5.2 Cetak Daftar",
                    "url" => "pengawasan/tbldatasurat/ctkmonitoringsp2"
                ),
                    
        ),

    ), //END ARRAY MENU SUB
                 "peng_monitoring3" => array(
                "title" => "A.6 Monitoring SP3",
                "icon" => "fa-desktop",
                "sub" => array(
                   "frm_in_monitoring3" => array(
                    "title" => "A.6.1 Data SP3",
                    "url" => "pengawasan/tbldatasurat/monitoringsp3"
                ),
                 "frm_in_monitoringctk3" => array(
                    "title" => "A.6.2 Cetak Daftar",
                    "url" => "pengawasan/tbldatasurat/ctkmonitoringsp3"
                ),
                    
        ),

    ), //END ARRAY MENU SUB

                "peng_pencabutan" => array(
                "title" => "A.7 Pencabutan",
                "icon" => "fa-desktop",
                "sub" => array(
                   "frm_in_pencabutan" => array(
                    "title" => "A.7.1 Pendataan",
                    "url" => "pengawasan/tblpencabutan/pencabutan"
                ),
                 "frm_in_pencabutan_ctk" => array(
                    "title" => "A.7.2 Cetak Daftar",
                    "url" => "pengawasan/tblpencabutan/ctkpencabutan"
                ),
                    
        ),

    ), //END ARRAY MENU SUB
                "peng_stat" => array(
                "title" => "A.8 Statistik",
                "icon" => "fa-desktop",
                "sub" => array(
                   "frm_in_stat" => array(
                    "title" => "A.8.1 Grafik Rekapitulasi",
                    "url" => "pengawasan/statistik/grf_rekapitulasi"
                ),
                 "frm_in_stat_ktdk" => array(
                    "title" => "A.8.2 Grafik Ketidaksesuaian",
                    "url" => "pengawasan/statistik/grf_ketidaksesuaian"
                ),

                 "frm_in_stat_jenis" => array(
                    "title" => "A.8.3 Grafik Jenis Ketidaksesuaian",
                    "url" => "ajax/yk_statistik_pengawasan_jenis.php"
                ),

                    
        ),

    ), //END ARRAY MENU SUB

 )
),
	
    "pengaduan" => array(
        "title" => "B. Pengaduan",
        "icon" => "fa fa-group",
        "sub" => array(
            "pengaduan_1" => array(
                "title" => "B.1 Daftar",
                "icon" => "fa-desktop",
                "sub" => array(
                    "pengaduan_input" => array(
                    "title" => "B.1.1 Input Pengaduan",
                    "url" => "pengaduan/tblpengaduan/inputpengaduan"
                ),
	                "pengaduan_cetak" => array(
	                    "title" => "B.1.2 Cetak Pengaduan",
	                    "url" => "pengaduan/tblpengaduan/cetakpengaduan"
	                )
                    
            )
        ), //end of sub menu
           	"pengaduan_2" => array(
                "title" => "B.2 Tindak Lanjut",
                "icon" => "fa-desktop",
                "sub" => array(
                    "pengaduan_tindak_lanjut" => array(
                    "title" => "B.2.1 Pengaduan Tindak Lanjut",
                    "url" => "pengaduan/tblpengaduantindaklanjut"
                ),
					"pengaduan_tindak_lanjut_cetak" => array(
                    "title" => "B.2.2 Cetak Pengaduan Tindak Lanjut",
                    "url" => "ajax/yk_pengaduan_tindak_lanjut_ctk.php"
                ),
	                
	                
                    
            )
        ), //end of submenu

           		"pengaduan_3" => array(
                "title" => "B.3 Statistik",
                "icon" => "fa-desktop",
                "sub" => array(
                    "pengaduan_ber_jenis" => array(
                    "title" => "B.3.1 Berdasarkan Jenis Izin",
                    "url" => "pengaduan/statistik/grf_izin"
                ),
	                "pengaduan_ber_media" => array(
	                    "title" => "B.3.2 Berdasarkan Media",
	                    "url" => "pengaduan/statistik/grf_media"
	                ),
	                "pengaduan_ber_per" => array(
	                    "title" => "B.3.3 Berdasarkan Permasalahan",
	                    "url" => "pengaduan/statistik/grf_permasalahan"
	                ),
	                
                    
            )
        ), //end of submenu

	)
   ),

    "admin" => array(
        "title" => "C. Managemen User",
        "icon" => "fa-user-md",
        "sub" => array(
            "settinglevel" => array(
                "title" => "C.2 Setting Group",
                "icon" => "fa-group",
                "url" => "app/tblrole/grup"
            ),
            "settingpengguna" => array(
                "title" => "C.1 Setting Pengguna",
                "icon" => "fa-user",
                "url" => "app/tblpengguna/pengguna"
            ),
            "settinggrup" => array(
                "title" => "C.3 Setting Level",
                "icon" => "fa-list",
                "url" => "app/tblpengguna/hakakses2"
            ),
        )
    ),


    "referensi" => array(
        "title" => "D. Referensi",
        "icon" => "fa fa-group",
        "sub" => array(
            "ref_jizin" => array(
                "title" => "D.1 Jenis Izin",
                "icon" => "fa-desktop",
                "url" => "app/tblizin/index"
            ), //end of sub menu
            "ref_statadu" => array(
                "title" => "D.2 Status Pengaduan",
                "icon" => "fa-desktop",
                "url" => "app/refstatuspengaduan"
            ), //end of sub menu
             "ref_stattindaklanjut" => array(
                "title" => "D.3 Status Tindak Lanjut",
                "icon" => "fa-desktop",
                "url" => "app/refstatustindaklanjut"
            ), //end of sub menu
              "ref_kodepermasalahan" => array(
                "title" => "D.4 Kode Permasalahan",
                "icon" => "fa-desktop",
                "url" => "app/refkodepermasalahan"
            ), //end of sub menu

        )
    ),

    "menuset" => array(
        "title" => "E. Setting Menu",
        "icon" => "fa-list",
        "sub" => array(
            "settingmenu" => array(
                "title" => "D.1 Setting Menu",
                "icon" => "fa-list",
                "url" => "app/tblmenu/menu"
            )
        )
    ),



);*/
$page_nav = $this->menu;