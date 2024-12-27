<?php

include_once('../Admin/admin/model.php');   // step 1 load model 


class control extends model  // step 2 extends model class
{
    
        function __construct(){ // magic function call automatic when we declare class object
        session_start();
        model::__construct();  // step 3 call model __construct
        
        $url=$_SERVER['PATH_INFO'];
        
        switch($url)
        {
            case '/index':
                include_once('index.php');
            break;
            
            case '/services':
                include_once('services.php');
            break;
            
            
            case '/courses':
                $cate_arr = $this->select('manage_it_categories'); // Use the model object
                include_once('courses.php');
                break;

                case '/course_view':
                if(isset($_REQUEST['btn_course']))
                {
                    $id=$_REQUEST['btn_course'];
                    $where=array("cate_id"=>$id);
                    $res=$this->select_where('manage_course',$where);
                    while($fetch=$res->fetch_object()) // fetch all data
                    {
                        $arr_course[]=$fetch;
                    }
                }
                include_once('course_view.php');
            break;
            
            case '/team':
                include_once('team.php');
                break;
            
            
            
           
            
            case '/login':
                if(isset($_REQUEST['login']))
                {
                    $email=$_REQUEST['email'];
                    $password=md5($_REQUEST['password']);
                    
                    $where=array("email"=>$email,"password"=>$password);
                    
                    //login
                    $res=$this->select_where('manage_customer',$where);
                    $chk=$res->num_rows; //check row wise condition
                    
                    if($chk==1) // 1 true 0 false
                    {
                        
                        $fetch=$res->fetch_object();
                        
                        if($fetch->status=="Unblock")
                        {
                            $_SESSION['username']=$fetch->name;
                            $_SESSION['userid']=$fetch->id;
                            
                            echo "<script>
                                alert('Login suuccessfully');
                                window.location='index';
                            </script>";
                        }
                        else
                        {
                            echo "<script>
                            alert('Login failed due to Account Blocked');
                            window.location='login';
                            </script>";
                        }
                    }
                    else
                    {
                        echo "<script>
                            alert('Login failed due to wrong crendential');
                            window.location='login';
                        </script>";
                    }
                }
                include_once('login.php');
            break;
            
            
            
            
            
            
            case '/signup':
                
                if(isset($_REQUEST['submit']))
                {
                    $name=$_REQUEST['name'];
                    $email=$_REQUEST['email'];
                    $password=$_REQUEST['password'];
                    $pass_enc=md5($password);
                    $gender=$_REQUEST['gender'];
                    
                    $lag_arr=$_REQUEST['lag'];
                    $lag=implode(",",$lag_arr);
                    
                    
                    
                    
                    echo $img=$_FILES['img']['name'];
    
                    // upload img in folder
                    $path='img/customer/'.$img;     // path
                    $dupimg=$_FILES['img']['tmp_name'];  // duplicate imag get
                    move_uploaded_file($dupimg,$path);  // move duplicate img in path
                    
                    
                    $arr=array("name"=>$name,"email"=>$email,"password"=>$pass_enc,"gender"=>$gender,"lag"=>$lag ,"img"=>$img);
                    
                    $res=$this->insert('manage_customer',$arr);
                    if($res)
                    {
                        echo "<script>
                            alert('Signup suuccessfully');
                            window.location='signup';
                        </script>";
                    }
                    else
                    {
                        echo "Not success";
                    }
                }
                include_once('signup.php');
            break;

            case '/contact-us':
                
                if(isset($_REQUEST['submit']))
                {
                    $name=$_REQUEST['name'];
                    $email=$_REQUEST['email'];
                    $mobile=$_REQUEST['mobile'];
                    $comment=$_REQUEST['comment'];
                    
                    $arr=array("name"=>$name,"email"=>$email,"mobile"=>$mobile,"comment"=>$comment);
                    
                    $res=$this->insert('manage_contact_us',$arr);
                    if($res)
                    {
                        echo "<script>
                            alert('Contact submited suuccessfully');
                            window.location='contact';
                        </script>";
                    }
                    else
                    {
                        echo "Not success";
                    }
                }
                include_once('contact-us.php');
            break;

            case '/event':
                include_once('event.php');
                break;

            
            
            default:
                include_once('pnf.php');
            break;
        }
        
    }
    
}
$obj=new control;




?>
