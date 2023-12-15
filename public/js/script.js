document.addEventListener("DOMContentLoaded", function () {
  document.querySelector(".exportExcel").addEventListener("click", function () {
    exportToExcel();
  });

  document.querySelector(".exportPDF").addEventListener("click", function () {
    exportToPDF();
  });

  document.querySelector(".importExcel").addEventListener("click", function () {
    importFromExcel();
  });

  function exportToExcel() {
    const data = getDataArray(); // Ganti ini dengan fungsi yang mengembalikan data dalam bentuk array

    const ws = XLSX.utils.aoa_to_sheet(data);
    const wb = XLSX.utils.book_new();
    XLSX.utils.book_append_sheet(wb, ws, "Sheet1");
    XLSX.writeFile(wb, "exported_data.xlsx");
  }

  function exportToPDF() {
    const data = getDataArray(); // Ganti ini dengan fungsi yang mengembalikan data dalam bentuk array

    const columns = ["Id", "Username", "Name", "Role", "Address", "Gender"];
    const rows = [columns, ...data];

    const doc = new jsPDF();
    doc.autoTable({
      head: [columns],
      body: rows,
    });
    doc.save("exported_data.pdf");
  }

  function importFromExcel() {
    // Logika untuk membuka jendela impor Excel
    console.log("Importing from Excel...");
  }

  function getDataArray() {
    const dataArray = [];
    const rows = document.querySelectorAll("tbody tr");

    rows.forEach((row) => {
      const rowData = [];
      const columns = row.querySelectorAll("td");

      columns.forEach((column) => {
        rowData.push(column.innerText);
      });

      dataArray.push(rowData);
    });

    return dataArray;
  }
});

function toggleMenu() {
  var menu = document.querySelector(".apexcharts-menu");
  menu.classList.toggle("apexcharts-menu-open");
}

$(function () {
  $(".showModalAdd").on("click", function () {
  
    $("#modalLabel").html("Add User");
    $(".modal-footer button[type=submit]").html("Save");
    $(".modal-footer button[type=submit]").attr(
      "onclick",
      "showSuccessAlert()"
    );

    $("#nama").val("");
    $("#username").val("");
    $("#jenis_kelamin").val("Pilih...");
    $("#role").val("Pilih...");
    $("#email").val("");
    $("#password").val("");
    $("#alamat").val("");
    $("#domisili").val("");
    $("#id").val("");
  });

  $(".showModalEdit").on("click", function () {
    
    $("#modalLabel").html("Edit User");
    $(".modal-footer button[type=submit]").html("Update");
    $(".modal-body form").attr(
      "action",
      "http://localhost/phpmvc/public/user/update"
    );
    $(".modal-footer button[type=button]").on("click", function () {
      window.location.href = "http://localhost/phpmvc/public/user";
    });
    $(".modal-footer button[type=submit]").attr(
      "onclick",
      "showUpdateSuccessAlert()"
    );

    const id = $(this).data("id");

    $.ajax({
      url: "http://localhost/phpmvc/public/user/getEdit",
      data: { id: id },
      method: "post",
      dataType: "json",
      success: function (data) {
        $("#nama").val(data.nama);
        $("#username").val(data.username);
        $("#jenis_kelamin").val(data.jenis_kelamin);
        $("#role").val(data.role);
        $("#email").val(data.email);
        $("#password").val(data.password);
        $("#alamat").val(data.alamat);
        $("#domisili").val(data.domisili);
        $("#id").val(data.id);
      },
    });
  });


  
  
});

function showSuccessAlert() {
  Swal.fire("Saved!", "User has been saved.", "success").then(
    (ok) => {
      if (ok.isConfirmed) {
        window.location.href = "http://localhost/phpmvc/public/user";
      }
    }

    // Lanjutkan dengan mengarahkan pengguna ke tautan penghapusan jika dikonfirmasi
  );
}

function showUpdateSuccessAlert() {
  // You can customize the alert message as needed
  Swal.fire("Updated!", "User has been updated.", "success").then((ok) => {
    if (ok.isConfirmed) {
      window.location.href = "http://localhost/phpmvc/public/user";
    }
  });
}

function confirmDelete(event) {
    event.preventDefault();

    let deleteUrl = event.currentTarget.getAttribute("href");

    const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: "btn btn-success",
        cancelButton: "btn btn-danger",
        action: "my-costum-class",
      },
      buttonsStyling: true,
    });

    swalWithBootstrapButtons
      .fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel!",
        confirmButtonColor: "#28a745", // Green color
        cancelButtonColor: "#dc3545", // Red color
        reverseButtons: true,
      })
      .then((result) => {
        if (result.isConfirmed) {
          swalWithBootstrapButtons
            .fire({
              confirmButtonColor: "#28a745", // Green color
              title: "Deleted!",
              text: "Your file has been deleted.",
              icon: "success",
            })
            .then((ok) => {
              if (ok.isConfirmed) {
                window.location.href = deleteUrl;
              }
            });
        } else if (
          /* Read more about handling dismissals below */
          result.dismiss === Swal.DismissReason.cancel
        ) {
          swalWithBootstrapButtons
            .fire({
              confirmButtonColor: "#28a745", // Green color
              title: "Cancelled",
              text: "User is safe :)",
              icon: "error",
            })
            .then((ok) => {
              if (ok.isConfirmed) {
                window.location.href = "http://localhost/phpmvc/public/user";
              }
            });
        }
      });
  };

$(function () {
  $(".showAddObat").on("click", function () {

    $("#modalLabel").html("Add Obat");
    $(".modal-footer button[type=submit]").html("Save");
    $(".modal-footer button[type=submit]").attr(
      "onclick",
      "showObatSuccessAlert()"
    );
    
    $("#merk").val("");
    $("#nama").val("");
    $("#beli").val("");
    $("#jual").val("");
    $("#stok").val("");
    $("#status").val("Pillih...");
    $("#id_obat").val("");
  });

  

  $(".showEditObat").on("click", function () {
  
    $("#modalLabel").html("Edit Obat");
    $(".modal-footer button[type=submit]").html("Update");
    $(".modal-body form").attr(
      "action",
      "http://localhost/phpmvc/public/obat/update"
    );
    $(".modal-footer button[type=button]").on("click", function () {
      window.location.href = "http://localhost/phpmvc/public/obat";
    });
    $(".modal-footer button[type=submit]").attr(
      "onclick",
      "showObatUpdateSuccessAlert()"
    );

    const id_obat = $(this).data("id_obat");

    $.ajax({
      url: "http://localhost/phpmvc/public/obat/getEdit",
      data: { id_obat: id_obat },
      method: "post",
      dataType: "json",
      success: function (data) {
        $("#merk").val(data.merk);
        $("#nama").val(data.nama);
        $("#beli").val(data.beli);
        $("#jual").val(data.jual);
        $("#stok").val(data.stok);
        $("#status").val(data.status);
        $("#id_obat").val(data.id_obat);
      },
    });
  });


  

  
});

function showObatSuccessAlert() {
  Swal.fire("Saved!", "Obat has been saved.", "success").then((ok) => {
    if (ok.isConfirmed) {
      window.location.href = "http://localhost/phpmvc/public/obat";
    }
  });
}

function showObatUpdateSuccessAlert() {
  // You can customize the alert message as needed
  Swal.fire("Updated!", "Obat has been updated.", "success").then((ok) => {
    if (ok.isConfirmed) {
      window.location.href = "http://localhost/phpmvc/public/obat";
    }
  });
}

function deleteConfrim(event) {
  event.preventDefault();

  let deleteUrl = event.currentTarget.getAttribute("href");

  const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
      confirmButton: "btn btn-success",
      cancelButton: "btn btn-danger",
      action: "my-costum-class",
    },
    buttonsStyling: true,
  });

  swalWithBootstrapButtons
    .fire({
      title: "Are you sure?",
      text: "You won't be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonText: "Yes, delete it!",
      cancelButtonText: "No, cancel!",
      confirmButtonColor: "#28a745", // Green color
      cancelButtonColor: "#dc3545", // Red color
      reverseButtons: true,
    })
    .then((result) => {
      if (result.isConfirmed) {
        swalWithBootstrapButtons
          .fire({
            confirmButtonColor: "#28a745", // Green color
            title: "Deleted!",
            text: "Your file has been deleted.",
            icon: "success",
          })
          .then((ok) => {
            if (ok.isConfirmed) {
              window.location.href = deleteUrl;
            }
          });
      } else if (
        /* Read more about handling dismissals below */
        result.dismiss === Swal.DismissReason.cancel
      ) {
        swalWithBootstrapButtons
          .fire({
            confirmButtonColor: "#28a745", // Green color
            title: "Cancelled",
            text: "User is safe :)",
            icon: "error",
          })
          .then((ok) => {
            if (ok.isConfirmed) {
              window.location.href = "http://localhost/phpmvc/public/obat";
            }
          });
      }
    });
};