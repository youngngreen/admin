<h3>Cấp quyền cho <?=$user->tendangnhap?></h3>
<h4>Chọn chức năng</h4>
<form method="post" action="<?=url('role','editpost')?>">
    <ul>
    <?php 
    foreach($list as $item)
    {
        $subs = $mcn->_listforparent($item->ma);
    ?>
        <li><label><input type="checkbox" <?=$pq->_checked($user->ma,$item->ma)?'checked':''?> name="chucnang[]" value="<?=$item->ma?>"/> <?=$item->ten?></label>
            <?php if($subs){ ?>
            <ul>
                <?php foreach($subs as $sub){ ?>
                <li><label><input type="checkbox" <?=$pq->_checked($user->ma,$sub->ma)?'checked':''?> name="chucnang[]" value="<?=$sub->ma?>"/> <?=$sub->ten?></label></li>
                <?php } ?>
            </ul>
            <?php } ?>
        </li>
    <?php }
    ?>
    </ul>
    <input type="hidden" name="uid" value="<?=$user->ma?>" />
    <button class="btn btn-sm btn-success">Ghi</button> <a  class="btn btn-sm btn-dark" href="<?=url('role','index')?>">Bỏ qua</a>
</form>