<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Inventory</title>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/paginationjs@2.1.8/dist/pagination.min.js"></script>

    <link
      href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="css/main.css" />

    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <div class="wrapper d-flex align-items-stretch">
      <nav id="sidebar">
        <div class="custom-menu">
          <button type="button" id="sidebarCollapse" class="btn btn-primary">
            <i class="fa fa-bars"></i>
            <span class="sr-only">Toggle Menu</span>
          </button>
        </div>
        <h1><a href="index.php" class="logo">Inventory</a></h1>
        <ul class="list-unstyled components mb-5">
          <li class="active">
            <a href="index.php"> Bahan Mentah</a>
          </li>
          <li>
            <a href="bahan_setengah_jadi.html"> Bahan Setengah Jadi</a>
          </li>
          <li>
            <a href="bahan_jadi.html"> Bahan Jadi</a>
          </li>
        </ul>
      </nav>

      <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
        <h2 class="mb-4">Bahan Jadi</h2>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Number</th>
              <th scope="col">Code</th>
              <th scope="col">Item</th>
              <th scope="col">Category</th>
              <th scope="col">Ingredient</th>
              <th scope="col">Cost</th>
            </tr>
          </thead>
          <tbody>
            <tr onclick="cetak()" style="cursor: pointer">
              <th scope="row">1</th>
              <td id="id_item">BSJ001</td>
              <td>Nasi Putih</td>
              <td>Nasi</td>
              <td>2</td>
              <td>Rp.2.500</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div id="pagination-container"></div>
      <div class="button bg-danger">
        <button
          class="btn btn-primary fixed-bottom ml-auto mb-5"
          id="btn-tambah"
          style="width: 60px; height: 60px; border-radius: 50%"
        ></button>
      </div>
    </div>

    <!-- Modal -->
    <div
      class="modal fade"
      id="exampleModal"
      tabindex="-1"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">New message</h1>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <form>
              <div class="mb-3">
                <label for="recipient-name" class="col-form-label"
                  >Recipient:</label
                >
                <input
                  type="text"
                  class="form-control"
                  id="recipient-name"
                  style="border: 0.05px solid black"
                />
              </div>
              <div class="mb-3">
                <label for="message-text" class="col-form-label"
                  >Message:</label
                >
                <textarea
                  class="form-control"
                  id="message-text"
                  style="border: 0.05px solid black"
                ></textarea>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-bs-dismiss="modal"
            >
              Close
            </button>
            <button type="button" class="btn btn-primary">Send message</button>
          </div>
        </div>
      </div>
    </div>
    <!-- End Modal -->

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
      integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
      integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD"
      crossorigin="anonymous"
    ></script>
    <script src="js/main.js"></script>
  </body>
</html>
