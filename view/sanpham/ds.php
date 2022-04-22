danh sach
<a href="index.php?view=themsp" class="btn btn-sm btn-primary">Thêm</a>
<h3>Danh sách sản phâm (<?=$count?>)</h3>
<table class="table">
    <thead>
        <tr>
            <th>Mã</th>
            <th>Hình</th>
            <th>Tên</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Tác vụ</th>
        </tr>
    </thead>
    <tbody>
    <?php 
    foreach($list as $item)
    {
    ?>
        <tr>
            <td scope="row"><?=$item->ma?></td>
            <td><img src="<?=img($item->hinhdaidien)?>" width="50"/></td>
            <td><?=$item->ten?></td>
            <td><?=number_format($item->gia)?></td>
            <td><?=$item->soluong?></td>
            <td>
                <a href="<?=url('product','edit',['ma'=>$item->ma])?>" class="btn btn-sm btn-success">Sửa</a>
                <a onclick="return confirm('Bạn có muốn xóa không?')" href="<?=url('product','delete',['ma'=>$item->ma])?>" class="btn btn-sm btn-danger">Xóa</a>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>