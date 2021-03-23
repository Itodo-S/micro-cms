<?php include('../includes/admin_header.php') ?>    
<?php include('../includes/admin_sidemenu.php') ?>    
<!-- <div class="row"> -->
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
            <h4 class="card-title">POSTS</h4>
            <!-- <code>.table</code> -->
            <p class="card-description">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modelId">
                    <i class="icon-plus"></i>
                    ADD NEW
                </button>
            </p>
            <table class="table">
                <thead>
                <tr>
                    <th>Profile</th>
                    <th>VatNo.</th>
                    <th>Created</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Jacob</td>
                    <td>53275531</td>
                    <td>12 May 2017</td>
                    <td><label class="badge badge-danger">Pending</label></td>
                </tr>
                <tr>
                    <td>Messsy</td>
                    <td>53275532</td>
                    <td>15 May 2017</td>
                    <td><label class="badge badge-warning">In progress</label></td>
                </tr>
                <tr>
                    <td>John</td>
                    <td>53275533</td>
                    <td>14 May 2017</td>
                    <td><label class="badge badge-info">Fixed</label></td>
                </tr>
                <tr>
                    <td>Peter</td>
                    <td>53275534</td>
                    <td>16 May 2017</td>
                    <td><label class="badge badge-success">Completed</label></td>
                </tr>
                <tr>
                    <td>Dave</td>
                    <td>53275535</td>
                    <td>20 May 2017</td>
                    <td><label class="badge badge-warning">In progress</label></td>
                </tr>
                </tbody>
            </table>
            </div>
        </div>
    </div>
<!-- </div> -->




<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                Body
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

<?php include('../includes/admin_footer.php') ?>    
              


