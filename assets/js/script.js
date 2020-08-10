$(function () {
	const base = "https://virtulab-its.com/"
	$(".tampilModalUbah").on("click", function () {
		const id = $(this).data("id");

		$.ajax({
			url: base + "admin/getubah",
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
		$(".modal-body form").attr(
			"action",
			base + "menu/editsub"
		);

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
		$(".modal-body form").attr(
			"action",
			base + "menu/submenu"
		);
	});

	$(".TampilEditRole").on("click", function () {
		$("#NewRoleModalLabel").html("Edit Role");
		$(".modal-footer button[type=submit]").html("Edit");
		$(".modal-body form").attr(
			"action",
			base + "admin/editrole"
		);

		const id = $(this).data("id");

		$.ajax({
			url: base + "admin/getubahrole",
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
		$(".modal-body form").attr("action", base + "admin/role");
	});

	$(".tampilTambahJadwal").on("click", function () {
		$("#JadwalEditLabel").html("Tambahkan Jadwal Baru");
		$(".modal-footer button[type=submit]").html("Tambah");
		$(".modal-body form").attr(
			"action",
			base + "admin/tambahjadwal"
		);
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
		$(".modal-body form").attr(
			"action",
			base + "admin/editjadwal"
		);
		$(".modal-body input[type=text]").attr("readonly", true);
		$(".modal-body select").attr("disabled", true);
		const id = $(this).data("id");

		$.ajax({
			url: base + "admin/getubahjadwal",
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
				$("#jadwal").val(data.jadwal);
				$("#id").val(data.id);
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

				$("#name").val(data.name);
				$("#nrp").val(data.nrp);
				$("#modul_id").val(data.modul_id);
				$("#modul").val(data.modul_id);
				$("#jadwal_old").val(data.jadwal);
				$("#id").val(data.id);
			},
		});
	});

	$(".kirim1").on("click", function () {
		const kirim = $("#var").find(":selected").data("send");
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

				$("#data1").val(data);
			},
		});
	});

	$(".kirim2").on("click", function () {
		const kirim = "[d,1]";
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

				$("#data2").val(data);
			},
		});
	});

	$(".tampilEditPengumuman").on("click", function () {
		$("#BuatPengumumanLabel").html("Edit Pengumuman");
		$(".modal-footer button[type=submit]").html("Edit");
		$(".modal-body form").attr(
			"action",
			base + "admin/editpengumuman"
		);

		const id = $(this).data("id");

		$.ajax({
			url: base + "admin/getubahpengumuman",
			data: {
				id: id,
			},
			method: "post",
			dataType: "json",
			success: function (data) {
				tinymce.init({
					selector: 'textarea'
				});

				$("#id").val(data.id);
				$("#name").val(data.name);
				$("#nrp").val(data.nrp);
				$("#judul").val(data.judul);
				tinymce.get('isi').setContent(data.isi);
				$("#tanggal").val(data.tanggal);

			},
		});
	});

	$(".tampilTambahPengumuman").on("click", function () {
		$("#BuatPengumumanLabel").html("Tambahkan Pengumuman Baru");
		$(".modal-footer button[type=submit]").html("Tambah");
		$(".modal-body form").attr(
			"action",
			base + "admin/tambahpengumuman"
		);
	});

	$(".tampilModalNilai").on("click", function () {

		const id = $(this).data("id");

		$.ajax({
			url: base + "asisten/getubahnilai",
			data: {
				id: id,
			},
			method: "post",
			dataType: "json",
			success: function (data) {
				tinymce.init({
					selector: 'textarea'
				});
				console.log(data);
				$("#id").val(data.id);
				$("#modul_id").val(data.modul_id);
				$("#name").val(data.name);
				$("#nrp").val(data.nrp);
				$("#modul").val(data.modul);
			},
		});
	});
});
