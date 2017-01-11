<style media="screen">
  .badge {
    border:none;
    font-size: 0.9em;
  }

  .divider {
    height: 1px;
    width: 100%;
    border: 1px solid #ddd;
    margin-top: 1em;
    margin-bottom: 1em;
  }

  img {
    max-width: 100%;
    
  }
</style>

<div class="container">
  <div class="col-md-12">
    <h2><?=$detail->product_name?></h2>
  </div>
  <div class="col-md-5">
    <img src="<?=base_url('assets/img/product/'.$detail->product_img)?>" alt=""/>
  </div>
  <div class="col-md-7">
    <p>종류 : <?=$detail->product_type?></p>
    <p>쟝르 : <?=$detail->product_genre?></p>
    <p>스타일: <?=$detail->product_style?></p>
    <p>색상 : <?=$detail->product_color?></p>
    <div class="divider"></div>
    <h5>물품 현황</h5>
    <ul class="list-group">
      <?php foreach($status as $k => $row) : ?>
      <li class="list-group-item justify-content-between">
        <?=$row['product_name'].'-'.$row['product_seq']?>
        <?php if($row['product_status'] == 0) : ?>
        <span class="badge badge-danger">대여중</span>
        <?php else : ?>
        <a href="#"><span class="badge badge-success">대여 가능</span></a>
        <?php endif; ?>
      </li>
      <?php endforeach; ?>
    </ul>
  </div>
</div>
