$(function () {
	const base = "https://riset.its.ac.id/praktikum-fisdas/";
	$(".tampilModalUbah").on("click", function () {
		const id = $(this).data("id");

		$.ajax({
			url: base + "modul/getubah",
			data: {
				id: id,
			},
			method: "post",
			dataType: "json",
			success: function (data) {
				$("#name").val(data.name);
				$("#nrp").val(data.nrp);
				$("#email").val(data.email);
				$("#role_id").val(data.role_id);
				$("#is_active").val(data.is_active);
				$("#id").val(data.id);
			},
		});
	});

	$(".tampilModalAbsen").on("click", function() {
		const nrp = $(this).data("nrp");
		const modul = $(this).data("modul");
		const kelompok = $(this).data("kelompok");
		const status = $(this).data("status");

		$.ajax({
			url: base + "asisten/getabsen",
			data: {
				nrp: nrp,
				modul: modul
			},
			method: "post",
			dataType: "json",
			success: function(data){
				if(data == null){
					$("#nrp").val(nrp);
					$("#modul").val(modul);
					$("#kelompok").val(kelompok);
					$("#keterangan").val("");
					$("#tidak_hadir").prop("checked",true);
					$("#hadir").prop("checked",false);	
					console.log();				
				}
				else{
					if(data.status == 0)
					{
						$("#nrp").val(data.nrp);
						$("#modul").val(data.modul);
						$("#kelompok").val(kelompok);
						$("#tidak_hadir").prop("checked",false);
						$("#hadir").prop("checked",true);
						$("#keterangan").val(data.keterangan);
						console.log();	
					} else if(data.status == 1)
					{
						$("#nrp").val(data.nrp);
						$("#modul").val(data.modul);
						$("#kelompok").val(kelompok);
						$("#tidak_hadir").prop("checked",true);
						$("#hadir").prop("checked",false);
						$("#keterangan").val(data.keterangan);
						console.log();	
					}
				}
			}
		});
	});

	$(".TampilEditMenu").on("click", function () {
		$("#NewMenuModalLabel").html("Edit Menu");
		$(".modal-footer button[type=submit]").html("Edit");
		$(".modal-body form").attr("action", base + "menu/edit");

		const id = $(this).data("id");

		$.ajax({
			url: base + "menu/getubah",
			data: {
				id: id,
			},
			method: "post",
			dataType: "json",
			success: function (data) {
				$("#menu").val(data.menu);
				$("#id").val(data.id);
			},
		});
	});

	$(".tombolTambahMenu").on("click", function () {
		$("#NewMenuModalLabel").html("Add New Menu");
		$(".modal-footer button[type=submit]").html("Add");
		$(".modal-body form").attr("action", base + "menu");
	});

	$(".TampilEditSubmenu").on("click", function () {
		$("#NewSubmenuModalLabel").html("Edit Submenu");
		$(".modal-footer button[type=submit]").html("Edit");
		$(".modal-body form").attr("action", base + "menu/editsub");

		const id = $(this).data("id");

		$.ajax({
			url: base + "menu/getubahsub",
			data: {
				id: id,
			},
			method: "post",
			dataType: "json",
			success: function (data) {
				$("#title").val(data.title);
				$("#menu_id").val(data.menu_id);
				$("#url").val(data.url);
				$("#icon").val(data.icon);
				$("#is_active").val(data.is_active);
				$("#id").val(data.id);
			},
		});
	});

	$(".tombolTambahSubmenu").on("click", function () {
		$("#NewSubmenuModalLabel").html("Add New Submenu");
		$(".modal-footer button[type=submit]").html("Add");
		$(".modal-body form").attr("action", base + "menu/submenu");
	});

	$(".TampilEditRole").on("click", function () {
		$("#NewRoleModalLabel").html("Edit Role");
		$(".modal-footer button[type=submit]").html("Edit");
		$(".modal-body form").attr("action", base + "modul/editrole");

		const id = $(this).data("id");

		$.ajax({
			url: base + "modul/getubahrole",
			data: {
				id: id,
			},
			method: "post",
			dataType: "json",
			success: function (data) {
				$("#role").val(data.role);
				$("#id").val(data.id);
			},
		});
	});

	$(".tombolTambahRole").on("click", function () {
		$("#NewRoleModalLabel").html("Add New Role");
		$(".modal-footer button[type=submit]").html("Add");
		$(".modal-body form").attr("action", base + "modul/role");
	});

	$(".tombolTambahKelompok").on("click", function () {
		$("#TambahKelompokLabel").html("Tambah Kelompok");
		$(".modal-footer button[type=submit]").html("Add");
		$(".modal-body form").attr("action", base + "asisten/tambahkelompok");

		$("#id").val(null);
		$("#no_kelompok").val(null);
	});

	$(".tombolTambahAnggota").on("click", function () {
		$("#TambahAnggotaLabel").html("Tambah Anggota");
		$(".modal-footer button[type=submit]").html("Add");
		$(".modal-body form").attr("action", base + "asisten/tambahanggota");
		$("#name").val(null);
		const id = $(this).data("id");

		$.ajax({
			url: base + "asisten/gettambahanggota",
			data: {
				id: id,
			},
			method: "post",
			dataType: "json",
			success: function (data) {
				console.log(data);
				$("#id").val(data.id);
				$("#no_kelompok").val(data.no_kelompok);
			},
		});
	});

	$(".tombolTambahAsisten").on("click", function () {
		$("#TambahAnggotaLabel").html("Tambah Asisten");
		$(".modal-footer button[type=submit]").html("Add");
		$(".modal-body form").attr("action", base + "modul/tambahasisten");
		$("#name").val(null);
		const id = $(this).data("id");

		$.ajax({
			url: base + "modul/gettambahasisten",
			data: {
				id: id,
			},
			method: "post",
			dataType: "json",
			success: function (data) {
				console.log(data);
				$("#id").val(data.id);
				$("#no_kelompok").val(data.no_kelompok);
			},
		});
	});

	$("#nrp_praktikan").on("keyup", function () {
		const nrp = $("#nrp_praktikan").val();
		$("#name").val(null);

		$.ajax({
			url: base + "asisten/getuser",
			data: {
				nrp: nrp,
			},
			method: "post",
			dataType: "json",
			success: function (data) {
				$("#name").val(data.name);
			},
		});
	});

	$("#nrp_asisten").on("keyup", function () {
		const nrp = $("#nrp_asisten").val();
		$("#name").val(null);

		$.ajax({
			url: base + "modul/getuser",
			data: {
				nrp: nrp,
			},
			method: "post",
			dataType: "json",
			success: function (data) {
				$("#name").val(data.name);
			},
		});
	});

	$(".tombolEditKelompok").on("click", function () {
		$("#TambahKelompokLabel").html("Edit Kelompok");
		$(".modal-footer button[type=submit]").html("Edit");
		$(".modal-body form").attr("action", base + "asisten/editkelompok");
		const id = $(this).data("id");

		$.ajax({
			url: base + "asisten/getubahkelompok",
			data: {
				id: id,
			},
			method: "post",
			dataType: "json",
			success: function (data) {
				$("#id").val(data.id);
				$("#no_kelompok").val(data.no_kelompok);
			},
		});
	});

	$(".tampilTambahJadwal").on("click", function () {
		$("#JadwalEditLabel").html("Tambahkan Jadwal Baru");
		$(".modal-footer button[type=submit]").html("Tambah");
		$(".modal-body form").attr("action", base + "modul/tambahjadwal");
		$(".modal-body input[type=text]").attr("readonly", false);
		$(".modal-body select").attr("disabled", false);

		$("#name").val(null);
		$("#nrp").val(null);
		$("#jadwal").val(null);
		$("#id").val(null);
	});

	$(".tampilEditJadwal").on("click", function () {
		$("#JadwalEditLabel").html("Edit Jadwal Praktikan");
		$(".modal-footer button[type=submit]").html("Edit");
		$(".modal-body form").attr("action", base + "modul/editjadwal");
		$(".modal-body input[type=text]").attr("readonly", true);
		$(".modal-body select").attr("disabled", true);
		const id = $(this).data("id");

		$.ajax({
			url: base + "modul/getubahjadwal",
			data: {
				id: id,
			},
			method: "post",
			dataType: "json",
			success: function (data) {
				$("#name").val(data.name);
				$("#nrp").val(data.nrp);
				$("#modul_id").val(data.modul_id);
				$("#modul").val(data.modul_id);
				$("#no_kelompok").val(data.no_kelompok);
				$("#jadwal").val(data.jadwal);
				$("#id").val(data.id);
				if (data.status == 1) {
					$("#selesai").prop("checked",true);
					$("#belum_selesai").prop("checked",false);
				} else 	{
					$("#selesai").prop("checked",false);
					$("#belum_selesai").prop("checked",true);
				}
				console.log(data);
			},
		});
	});

	$(".reqJadwalPraktikan").on("click", function () {
		const id = $(this).data("id");
		$.ajax({
			url: base + "praktikan/getubahjadwal",
			data: {
				id: id,
			},
			method: "post",
			dataType: "json",
			success: function (data) {
				console.log(data);
				jadwal = data.jadwal;
				$("#name").val(data.name);
				$("#nrp").val(data.nrp);
				$("#modul_id").val(data.modul_id);
				$("#modul").val(data.modul_id);
				$("#jadwal_old").val(jadwal.replace(" ", "T"));
				$("#id").val(data.id);
			},
		});
	});

	$(".kirim1a").on("click", function () {
		const tampil = $(this).data("tampil");
		const kirim = $(this).data("kirim");
		const id = $(this).data("id");
		$.ajax({
			url: base + "praktikan/getpercobaan",
			data: {
				kirim: kirim,
				id: id,
			},
			method: "post",
			dataType: "json",
			success: function (data) {
				console.log(data);
				if(typeof data.tabel !== "undefined"){	
					var html="";
					for(let i=0; i<data.nomor.length; i++){
							html+='<tr>';
							html+='<td>'+ data.nomor[i]+'</td>';
							html+='<td>'+ data.kecepatan[i]+'</td>';
							html+='<td>'+ data.waktu[i]+'</td>';
							html+='</tr>';
						}
						$("#dataM8").html(html);
				}else{
					$(tampil).val(data);
				}
			},
			error: function (jqXHR, textStatus, errorThrown) {
				console.log((jqXHR));
				console.log("AJAX error: " + textStatus + " : " + errorThrown);
			},
		});
	});

	$(".video").on("click", function () {
		const id = $(this).attr("id");
		console.log(id);
		$("#" + id).attr("active", true);
		$("#" + id).css("background-color", "white");
		$("#" + id).html("click");
	});

	$(".tampilEditPengumuman").on("click", function () {
		$("#BuatPengumumanLabel").html("Edit Pengumuman");
		$(".modal-footer button[type=submit]").html("Edit");
		$(".modal-body form").attr("action", base + "modul/editpengumuman");

		const id = $(this).data("id");

		$.ajax({
			url: base + "modul/getubahpengumuman",
			data: {
				id: id,
			},
			method: "post",
			dataType: "json",
			success: function (data) {
				tinymce.init({
					selector: "textarea",
				});

				$("#id").val(data.id);
				$("#name").val(data.name);
				$("#nrp").val(data.nrp);
				$("#judul").val(data.judul);
				tinymce.get("isi").setContent(data.isi);
				$("#tanggal").val(data.tanggal);
			},
		});
	});

	$(".tampilTambahPengumuman").on("click", function () {
		$("#BuatPengumumanLabel").html("Tambahkan Pengumuman Baru");
		$(".modal-footer button[type=submit]").html("Tambah");
		$(".modal-body form").attr("action", base + "modul/tambahpengumuman");
	});

	$(".tampilModalNilai").on("click", function () {
		const id = $(this).data("id");
		$(".form-control").attr("readonly", false);
		$(".hapus").show();
		$.ajax({
			url: base + "asisten/getubahnilai",
			data: {
				id: id,
			},
			method: "post",
			dataType: "json",
			success: function (data) {
				console.log(data);
				$("#id").val(data.id);
				$("#modul_id").val(data.modul_id);
				$("#name").val(data.name);
				$("#nrp").val(data.nrp);
				$("#modul").val(data.modul);
				$("#resume").val(data.resume);
				$("#pretest").val(data.pretest);
				$("#uji_lisan").val(data.uji_lisan);
				$("#praktikum").val(data.praktikum);
				$("#postest").val(data.postest);
				$("#format").val(data.format);
				$("#bab").val(data.bab);
				$("#kesimpulan").val(data.kesimpulan);
				$("#nilai_akhir").val(data.nilai_akhir);
				$("#nilai_akhir_abjad").val(data.nilai_akhir_abjad);
			},
		});
	});

	$(".tampilDetailNilai").on("click", function () {
		const id = $(this).data("id");
		const role = $(this).data("role");
		const id_kelompok = $(this).data("id_kelompok");

		$("#NilaiEditLabel").html("Detail Nilai");
		$(".form-control").attr("readonly", true);
		$(".hapus").hide();
		$(".modal-body").attr("action", base + "asisten/editnilai/" + id + "/" + id_kelompok);
	
		$.ajax({
			url: base + role + "/getubahnilai",
			data: {
				id: id,
			},
			method: "post",
			dataType: "json",
			success: function (data) {
				console.log(data.id_kelompok);
				$("#id").val(data.id);
				$("#modul_id").val(data.modul_id);
				$("#name").val(data.name);
				$("#nrp").val(data.nrp);
				$("#modul").val(data.modul);
				$("#resume").val(data.resume);
				$("#pretest").val(data.pretest);
				$("#uji_lisan").val(data.uji_lisan);
				$("#praktikum").val(data.praktikum);
				$("#postest").val(data.postest);
				$("#format").val(data.format);
				$("#bab").val(data.bab);
				$("#kesimpulan").val(data.kesimpulan);
				$("#nilai_akhir").val(data.nilai_akhir);
				$("#nilai_akhir_abjad").val(data.nilai_akhir_abjad);
			},
		});
	});

	$(".tampilModalNilaiDosen").on("click", function () {
		const id = $(this).data("id");
		console.log(id);
		$.ajax({
			url: base + "dosen/getubahnilai",
			data: {
				id: id,
			},
			method: "post",
			dataType: "json",
			success: function (data) {
				console.log(data);
				$("#id").val(data.id);
				$("#modul_id").val(data.modul_id);
				$("#name").val(data.name);
				$("#nrp").val(data.nrp);
				$("#modul").val(data.modul);
			},
		});
	});

	$(".tampilEditModul").on("click", function () {
		$("#BuatModulLabel").html("Edit Modul");
		$(".modal-footer button[type=submit]").html("Edit");
		$(".modal-body form").attr("action", base + "modul/editmodul");

		const id = $(this).data("id");

		$.ajax({
			url: base + "modul/getubahmodul",
			data: {
				id: id,
			},
			method: "post",
			dataType: "json",
			success: function (data) {
				console.log(data);
				$("#id").val(data.id);
				$("#modul").val(data.modul);
				$("#name").val(data.name);
				tinymce.get("peralatan").setContent(data.peralatan);
				tinymce.get("teori").setContent(data.teori);
				tinymce.get("cara").setContent(data.cara);
				tinymce.get("tugas_lapres").setContent(data.tugas_lapres);
				tinymce.get("tugas_pendahuluan").setContent(data.tugas_pendahuluan);
				$("#video").val(data.video);
				$("#pdf").val(data.pdf);
				$("#time").val(data.time);
				tinymce.get("tujuan").setContent(data.tujuan);
			},
		});
	});

	$(".tombolEditArah").on("click", function () {
		const id = $(this).data("id");

		$.ajax({
			url: base + "modul/getubahtombolarah",
			data: {
				id: id,
			},
			method: "post",
			dataType: "json",
			success: function (data) {
				console.log(data);
				$("#tombolEditArahLabel").html(data.tombol_keterangan);
				$("#id_modul").val(data.id_modul);
				$("#id").val(data.id);
				$("#tombol_keterangan").val(data.tombol_keterangan);
				$("#tombol_kirim").val(data.tombol_kirim);
				if (data.tombol_status == 0) {
					$("#tombol_status").attr("checked", false);
				} else $("#tombol_status").attr("checked", true);
				$("#data_tampil_output").val(data.data_tampil_output);
				$("#data_satuan").val(data.data_satuan);
			},
		});
	});

	$(".tombolTambahTulisan").on("click", function () {
		const id = $(this).data("id");
		$("#modul_id").val(id);
	});

	$(".tombolEditTulisan").on("click", function () {
		const id = $(this).data("id");

		$.ajax({
			url: base + "modul/getubahtomboltulisan",
			data: {
				id: id,
			},
			method: "post",
			dataType: "json",
			success: function (data) {
				console.log(data);
				$("#idd_modul").val(data.id_modul);
				$("#idd").val(data.id);
				$("#tombol_keterangann").val(data.tombol_keterangan);
				$("#tombol_kirimm").val(data.tombol_kirim);
				if (data.tombol_status == 0) {
					$("#tombol_statuss").attr("checked", false);
				} else $("#tombol_statuss").attr("checked", true);
				$("#data_tampil_outputt").val(data.data_tampil_output);
				$("#data_satuann").val(data.data_satuan);
			},
		});
	});

	$(".tambahOutput").on("click", function () {
		const id = $(this).data("id");
		$("#modul_idddd").val(id);
	});

	$(".outputEdit").on("click", function () {
		const id = $(this).data("id");

		$.ajax({
			url: base + "modul/getubahoutput",
			data: {
				id: id,
			},
			method: "post",
			dataType: "json",
			success: function (data) {
				console.log(data);
				$("#iddd_modul").val(data.id_modul);
				$("#iddd").val(data.id);
				$("#tulisan").val(data.tulisan);
				$("#data_tampil_outputtt").val(data.data_tampil_output);
			},
		});
	});

	$(".editVideo").on("click", function () {
		const id = $(this).data("idi");

		$.ajax({
			url: base + "modul/getubahvideo",
			data: {
				id: id,
			},
			method: "post",
			dataType: "json",
			success: function (data) {
				$("#idi").val(data.id);
			},
		});
	});
});
