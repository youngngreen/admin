    <?php 
class rolecontroller extends controller
{
    function __construct()
    {
        parent::__construct();
    }
    function index()
    {         
        $muser = new quantri();
        $data = [
            'list'=> $muser->_list(),
            'count'=> $muser->_count()
        ];
        $this->render('view/role/list.php',$data);
    }
    function edit()
    {
        $muser = new quantri();
        $user = $muser->_item(get('ma'));
        if(!$user || $user->trangthai !=1)
            chuyentrang(url('role','index'));
        $pq = new phanquyen();       
        //lay chuc nang
        $mcn = new chucnang();        
        $data = [
            'user'=> $user,
            'list'=>$mcn->_listforparent(),
            'mcn'=>$mcn,
            'pq'=>$pq
        ];
        $this->render('view/role/edit.php',$data);
    }
    function editpost()
    {
        $muser = new quantri();
        $user = $muser->_item(get('ma'));
        if(!$user || $user->trangthai !=1)
            chuyentrang(url('role','index'));
        $pq = new phanquyen();
        if(post('uid'))
        {
            //ghi vao bang phan quyen
            //xemmang($_POST);           
            $uid = post('uid');
            //truoc khi cap quyen thi thu hoi toan bo
            $pq->_deny($uid);
            if(post('chucnang') )
            {
                foreach(post('chucnang') as $cn)
                {
                    //echo $cn;
                    $pq->_insert('phanquyen',['machucnang'=>$cn,'maquantri'=>$uid]);
                }
            }
        }      
    }
}