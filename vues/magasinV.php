<div class="container">
    <div class="row">
        <div class="col-5">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Magasin</h5>
                    <hr>
                    <form action="index.php?page=magasin&act=add" method="post">
                        <label for="frm_code_mag" class="form-label">Code</label>
                        <input type="text" class="form-control" id="frm_code_mag" name="frm_code_mag" readonly>
                        <label for="frm_code_mag" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="frm_nom_mag" name="frm_nom_mag" required>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-7">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>aaa</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>bbb</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>