<?php
require_once ("theme/default/heads/head1.php");
$ToolbarOtherActive=ToolbarOtherAct("注册");
if ($_POST['issubmited'] != null) {
    $username = $email = $phonenumber = $password = $password2 = "";
    $username = AntiUnWord($_POST['username']);
    $email = AntiUnWord($_POST['email']);
    $phonenumber = AntiUnWord($_POST['phonenumber']);
    $password = AntiUnWord($_POST['password']);
    $password2 = AntiUnWord($_POST['password2']);
    $passwordmd5 = md5($password);
    if ($username == null) {
        $userwarning = "请输入账号";
    } elseif ($email == null) {
        $emailwarning = "请输入您的邮箱";
    } elseif ($phonenumber == null) {
        $phonenumberwarning = "请输入您的手机号";
    } elseif ($password == null) {
        $passwarning = "请输入密码";
    } elseif ($password2 == null) {
        $passwarning2 = "请输入确认密码";
    }elseif ($password2 != $password) {
        $passwarning = "密码不一致！";
    } else {
        $result = queryMySQL("SELECT username,email FROM user
        WHERE username='$username' OR email='$email'");
        if ($result->num_rows == 0) {
            if (isset($_REQUEST['authcode'])) {
                //strtolower()小写函数
                if (strtolower(md5($_REQUEST['authcode'])) == $_SESSION["verification"]) {
					$rs=GetRS(6);
                    $statua = sendemail($email, "Souper账号激活", "<h1>您好，您在Souper的激活链接是:<a href='http://society.46c46.com/email.php?user=$username&token=$rs'>http://society.46c46.com/email.php?user=$username&token=$rs</a></h1>");
                    if ($statua) {
						
                        queryMysql("INSERT INTO user (username,password,email,phonenumber,code)VALUES('$username','$passwordmd5','$email','$phonenumber','$rs')");
                        die("<script>layer.msg('注册成功，一封激活邮件已发往您的邮箱，请查收', {icon: 1},function(){url='panel.php';window.location.href=url;});</script>");
                    } else {
                        echo "<script>layer.msg('注册失败，请重试！', {icon: 0});</script>";
                    }
                }else{
					$authcodewarning = "验证码不正确";
				}
            } else {
                $authcodewarning = "请输入验证码";
            }
        } else {
            $userwarning = "账号或邮箱已被使用";
        }
    }
    $ArrayData = InputWarning($userwarning, $emailwarning, $phonenumberwarning, $passwarning, $passwarning2, $authcodewarning);
}
require_once ("theme/default/headers/header1.php");
require_once ("theme/default/bodys/signup.php");
require_once("theme/default/footer/foot.php");

?>