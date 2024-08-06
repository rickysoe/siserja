const flashData = $(".flash-data").data("flashdata");

if (flashData) {
    Swal.fire({
        position: "top",
        icon: "success",
        title: "" + flashData,
        showConfirmButton: false,
        timer: 1500,
    });
}

$(".tombol-hapus").on("click", function(e) {
    e.preventDefault();
    const href = $(this).attr("href");

    Swal.fire({
        title: "Apakah Anda Yakin?",
        text: "Data akan dihapus",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yakin",
    }).then((result) => {
        if (result.value == true) {
            document.location.href = href;
        }
    });
});

$(".tombol-batal").on("click", function(e) {
    e.preventDefault();
    const href = $(this).attr("href");

    Swal.fire({
        title: "Apakah Anda yakin?",
        text: "Transaksi akan dibatalkan",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yakin",
    }).then((result) => {
        if (result.value == true) {
            document.location.href = href;
        }
    });
});


$("#myAlert").on("closed.bs.alert", function() {
    // do something…
});