$(function () {
	$(".tampilModalUbah").on("click", function () {
		const id = $(this).data("id");

		$.ajax({
			url: "http://localhost/fisdas/admin/getubah",
			data: {
				id: id,
			},
			method: "post",
			dataType: "json",
			success: function (data) {
				console.log(data);
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
		$(".modal-body form").attr("action", "http://localhost/fisdas/menu/edit");

		const id = $(this).data("id");

		$.ajax({
			url: "http://localhost/fisdas/menu/getubah",
			data: {
				id: id,
			},
			method: "post",
			dataType: "json",
			success: function (data) {
				console.log(data);
				$("#menu").val(data.menu);
				$("#id").val(data.id);
			},
		});
	});

	$(".tombolTambahMenu").on("click", function () {
		$("#NewMenuModalLabel").html("Add New Menu");
		$(".modal-footer button[type=submit]").html("Add");
		$(".modal-body form").attr("action", "http://localhost/fisdas/menu");
	});

	$(".TampilEditSubmenu").on("click", function () {
		$("#NewSubmenuModalLabel").html("Edit Submenu");
		$(".modal-footer button[type=submit]").html("Edit");
		$(".modal-body form").attr(
			"action",
			"http://localhost/fisdas/menu/editsub"
		);

		const id = $(this).data("id");

		$.ajax({
			url: "http://localhost/fisdas/menu/getubahsub",
			data: {
				id: id,
			},
			method: "post",
			dataType: "json",
			success: function (data) {
				console.log(data);
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
			"http://localhost/fisdas/menu/submenu"
		);
	});

	$(".TampilEditRole").on("click", function () {
		$("#NewRoleModalLabel").html("Edit Role");
		$(".modal-footer button[type=submit]").html("Edit");
		$(".modal-body form").attr(
			"action",
			"http://localhost/fisdas/admin/editrole"
		);

		const id = $(this).data("id");

		$.ajax({
			url: "http://localhost/fisdas/admin/getubahrole",
			data: {
				id: id,
			},
			method: "post",
			dataType: "json",
			success: function (data) {
				console.log(data);
				$("#role").val(data.role);
				$("#id").val(data.id);
			},
		});
	});

	$(".tombolTambahRole").on("click", function () {
		$("#NewRoleModalLabel").html("Add New Role");
		$(".modal-footer button[type=submit]").html("Add");
		$(".modal-body form").attr("action", "http://localhost/fisdas/admin/role");
	});

	$(".tampilTambahJadwal").on("click", function () {
		$("#JadwalEditLabel").html("Tambahkan Jadwal Baru");
		$(".modal-footer button[type=submit]").html("Tambah");
		$(".modal-body form").attr(
			"action",
			"http://localhost/fisdas/admin/tambahjadwal"
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
			"http://localhost/fisdas/admin/editjadwal"
		);
		$(".modal-body input[type=text]").attr("readonly", true);
		$(".modal-body select").attr("disabled", true);
		const id = $(this).data("id");

		$.ajax({
			url: "http://localhost/fisdas/admin/getubahjadwal",
			data: {
				id: id,
			},
			method: "post",
			dataType: "json",
			success: function (data) {
				console.log(data);
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
		console.log(id);
		$.ajax({
			url: "http://localhost/fisdas/praktikan/getubahjadwal",
			data: {
				id: id,
			},
			method: "post",
			dataType: "json",
			success: function (data) {
				console.log(data);
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
		console.log(kirim);
		const id = $(this).data("id");
		$.ajax({
			url: "http://localhost/fisdas/praktikan/getpercobaan",
			data: {
				kirim: kirim,
				id: id,
			},
			method: "post",
			dataType: "json",
			success: function (data) {
				console.log(data);
				$("#data1").val(data);
			},
		});
	});

	$(".kirim2").on("click", function () {
		const kirim = "[d,1]";
		console.log(kirim);
		const id = $(this).data("id");
		$.ajax({
			url: "http://localhost/fisdas/praktikan/getpercobaan",
			data: {
				kirim: kirim,
				id: id,
			},
			method: "post",
			dataType: "json",
			success: function (data) {
				console.log(data);
				$("#data2").val(data);
			},
		});
	});

	$(".tampilEditPengumuman").on("click", function () {
		$("#BuatPengumumanLabel").html("Edit Pengumuman");
		$(".modal-footer button[type=submit]").html("Edit");
		$(".modal-body form").attr(
			"action",
			"http://localhost/fisdas/admin/editpengumuman"
		);

		const id = $(this).data("id");
		console.log(id);

		$.ajax({
			url: "http://localhost/fisdas/admin/getubahpengumuman",
			data: {
				id: id,
			},
			method: "post",
			dataType: "json",
			success: function (data) {
				console.log(data);
				$("#id").val(data.id);
				$("#name").val(data.name);
				$("#nrp").val(data.nrp);
				$("#judul").val(data.judul);
				$("#isi").val(data.judul);
				$("#tanggal").val(data.tanggal);
			},
		});
	});

	$(".tampilTambahPengumuman").on("click", function () {
		$("#BuatPengumumanLabel").html("Tambahkan Pengumuman Baru");
		$(".modal-footer button[type=submit]").html("Tambah");
		$(".modal-body form").attr(
			"action",
			"http://localhost/fisdas/admin/tambahpengumuman"
		);
	});
});
