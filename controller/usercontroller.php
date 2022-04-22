    <?php 
class usercontroller extends controller
{
    function __construct()
    {
        parent::__construct();
    }
    function login()
    {  
        $msg= msg(getmsg('msg'),getmsg('type'));      
        $this->render('view/user/login.php',['msg'=>$msg],'empty');
    }
    function loginpost()
    {
        //echo 123;exit;
        if(post('us')&&post('ps'))
        {
            $model = new quantri();
            $user  = $model->_login(post('us'),post('ps'));
            if($user)
            {
                $_SESSION['login_status'] = true;
                $_SESSION['name'] = $user->ten;
                $_SESSION['avt'] = $user->avt;
                $_SESSION['uid'] = $user->ma;
                setmsgs(['msg'=>'Đăng nhập thành công','type'=>'success']);  
                chuyentrang(url());
            }else{
                setmsgs(['msg'=>'Thông tin đăng nhập không đúng','type'=>'danger']);                
            }
        }else{
            setmsgs(['msg'=>'Thông tin không đc để trống','type'=>'danger']);                
        }
        chuyentrang(url('user','login'));
    }
    function logout()
    {    
        session_destroy();   
        chuyentrang(url('user','login'));           
    }
}