<div class="container justify-content-center">
  <div class="kotak">
    <div class="row">
      <div class="col-lg-auto mr-auto">
        <h5>Nilai Mahasiswa</h5>
      </div>
      <div class="col-lg-auto ml-auto">
        <form class="form-inline">
          <input class="form-control mr-sm-2" type="search" placeholder="Cari..." aria-label="Search">
          <button class="btn btn-outline-secondary px-4 my-2 my-sm-0" type="submit">Cari</button>
        </form>
      </div>
    </div>
    <div class="container mt-4">
      <table class="table table-striped table-dark">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Mahasiswa</th>
            <th scope="col">NRP</th>
            <th scope="col">Nilai Akhir</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>100</td>
            <td><a href="#" data-toggle="modal" data-target="#UserEdit" data-id="#" class="badge badge-pill badge-info tampilModalDetail">
                <i class="fas fa-fw fa-info-circle"></i>
                Detail
              </a></td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>100</td>
            <td><a href="#" data-toggle="modal" data-target="#UserEdit" data-id="#" class="badge badge-pill badge-info tampilModalDetail">
                <i class="fas fa-fw fa-info-circle"></i>
                Detail
              </a></td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>Larry</td>
            <td>the Bird</td>
            <td>100</td>
            <td><a href="#" data-toggle="modal" data-target="#UserEdit" data-id="#" class="badge badge-pill badge-info tampilModalDetail">
                <i class="fas fa-fw fa-info-circle"></i>
                Detail
              </a></td>
          </tr>
        </tbody>
      </table>
    </div>

  </div>
</div>




<div class="modal fade" id="UserEdit" tabindex="-1" role="dialog" aria-labelledby="UserEditLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="UserEditLabel">Nama Mahasiswa <br> 07211640000015</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="container">
        <table class="table table-striped table-dark">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Modul</th>
              <th scope="col">Nilai</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Mark</td>
              <td>100</td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Jacob</td>
              <td>100</td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td>Larry</td>
              <td>100</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>