<style media="screen">
  img {
    max-width: 100%;
    max-height: 150px;
  }
  #rentalTable td {
    vertical-align: middle;
  }

  button {
    width: 100%;
  }
</style>

<div class="row">
  <div class="col-lg-12">
      <h1 class="page-header">렌탈 관리</h1>
  </div>
  <table id="rentalTable" class="table" width="100%">
    <thead>
      <tr>
        <th style="width:5%;">번호</th>
        <th style="width:15%;">사용자</th>
        <th style="width:20%;">물품사진</th>
        <th style="width:15%;">물품명</th>
        <th style="width:15%;">렌탈일시</th>
        <th style="width:15%;">반납일시</th>
        <th style="width:10%;">렌탈상태</th>
        <th style="width:5%;">&nbsp;</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($rental_list as $k => $row) : ?>
      <tr>
        <td><?=$k+1?></td>
        <td><?=$row['user_name']?>(<?=$row['rental_user']?>)</td>
        <td><img class="img-thumbnail" src="<?=base_url('assets/img/product/'.$row['product_img'])?>" alt=""></td>
        <td><?=$row['rental_product']?></td>
        <td><?=$row['rental_dttm']?></td>
        <td><?=$row['rental_return_dttm']?></td>
        <td>
          <?php if($row['rental_status'] == 0) : ?>
          <form class="" action="<?=base_url('admin/Rental/update_status')?>" method="post" onsubmit="return confirm('반납처리 하시겠습니까? 되돌릴 수 없습니다.');">
            <input type="hidden" name="rental_id" value="<?=$row['rental_id']?>">
            <button type="submit" class="btn btn-primary">반납처리</button>
          </form>
          <?php else : ?>
          <button type="button" class="btn btn-success" disabled>반납완료</button>
          <?php endif; ?>
        </td>
        <td>
          <form action="<?=base_url('admin/Rental/delete_rental')?>" method="post" onsubmit="return confirm('삭제하시겠습니까?');">
            <input type="hidden" name="rental_id" value="<?=$row['rental_id']?>">
            <button class="btn btn-danger" type="submit" <?=$row['rental_status'] == 1 ? 'disabled' : ''?>>삭제</button>
          </form>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<!-- DataTables JavaScript -->
<script src="<?=base_url('assets/admin/vendor/datatables/js/jquery.dataTables.js')?>"></script>
<script src="<?=base_url('assets/admin/vendor/datatables-plugins/dataTables.bootstrap.min.js')?>"></script>
<script src="<?=base_url('assets/admin/vendor/datatables-responsive/dataTables.responsive.js')?>"></script>

<script type="text/javascript">
$(document).ready(function() {
    $('#rentalTable').DataTable({
        responsive: true
    });

});
</script>
